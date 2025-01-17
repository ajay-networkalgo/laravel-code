<?php

namespace App\Http\Middleware;

use App\Models\ImageAltTag;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


class SetImageAltTags
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $currentRoute = Route::currentRouteName();
        // Set alt tags for news & blogs dynamically
        if($currentRoute == 'news.frontened.index' || $currentRoute == 'news.frontened.load' || $currentRoute == 'news.frontened.details' || $currentRoute == 'blogs.frontened.index' || $currentRoute == 'blogs.frontened.load' || $currentRoute == 'blogs.frontened.details') {
            // Only manipulate if the response is a Response object with HTML content
            if ($response instanceof Response && str_contains($response->headers->get('Content-Type'), 'text/html')) {
                // Get the original content of the response
                $content = $response->getContent();

                // Use a DOM parser to find images and set alt tags
                $content = $this->setAltTagsForImages($content);

                // Set the modified content back to the response
                $response->setContent($content);
            }
        }

        return $response;
    }

    protected function setAltTagsForImages($content)
    {
        if (empty(trim($content))) {
            // If content is empty, return it as-is
            return $content;
        }
        $imgAltTags = ImageAltTag::pluck('text', 'path')->toArray();

        // Use DOMDocument to parse and manipulate HTML
        $dom = new \DOMDocument();
        // Suppress warnings for invalid HTML
        @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Use XPath to find all <img> elements
        $xpath = new \DOMXPath($dom);
        $images = $xpath->query('//img');

        foreach ($images as $index => $img) {
            // Ensure $img is an instance of DOMElement
            if ($img instanceof \DOMElement) {
                // Set or update the alt attribute if it's empty or missing
                $imgDataSrc = $img->getAttribute('data-src');
                $imgSrc = $img->getAttribute('src');
                // if (!$img->hasAttribute('alt') || empty($img->getAttribute('alt'))) {
                if(!empty($imgDataSrc)) {
                    $path = parse_url($imgDataSrc, PHP_URL_PATH);
                    if(array_key_exists($path, $imgAltTags)) {
                        $img->setAttribute('alt', $imgAltTags[$path]);
                    }
                }
                if(!empty($imgSrc)) {
                    $path = parse_url($imgSrc, PHP_URL_PATH);
                    if(array_key_exists($path, $imgAltTags)) {
                        $img->setAttribute('alt', $imgAltTags[$path]);
                    }
                }
            }
        }

        // Return the modified HTML content
        return $dom->saveHTML();
    }
}
