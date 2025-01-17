<?php

namespace App\Http\Controllers;

use App\Jobs\RunCommandJob;
use App\Mail\ContactSuccessEmail;
use App\Mail\ErrorNotification;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\GlobalContact;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\SuccessStory;
use App\Models\CompanyDownload;
use App\Models\Country;
use App\Models\GhlContact;
use App\Models\MarketingDownload;
use App\Models\News;
use App\Models\ProductDownload;
use App\Models\ProductSlider;
use App\Models\ProductFeature;
use App\Models\ProductSpecification;
use App\Models\ProductAsset;
use App\Models\TempAsset;
use App\Models\Asset;
use App\Models\Award;
use App\Models\Journey;
use App\Models\FAQ;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;
use File;

class SocialFrontenedController extends Controller
{
    public function aboutUs()
    {   
        try {
        $aboutpagecontent = TempAsset::where("type", "about")
            ->get()
            ->keyBy("key")
            ->toArray();
        
        $awards = Award::all();
        $journeys = Journey::all();
        if (empty($aboutpagecontent)) {
            $aboutpagecontent = Asset::where("type", "about")
                ->get()
                ->keyBy("key")
                ->toArray();
        }
        return view(
            "home.about-us",
            compact("aboutpagecontent", "awards", "journeys")
        );
    } catch (\Exception $e) {
        return redirect("admin/about")->withErrors([
            "error" =>
                "An error occurred while loading the about page content.",
        ]);
    }
        
    }


    public function contactUs()
    {
        $countries = Country::pluck('name');
        return view('home.contact-us', compact('countries'));
    }

    public function saveContactUs(Request $request)
    {
        try {
            $input =  $request->all();
            if($input['enquiry_type'] == 'Contacts') {
                $backUrl = '/usa-contact';
            }
            if($input['enquiry_type'] == 'Distributor') {
                $backUrl = '/where-to-buy';
            }
            if($input['enquiry_type'] == 'Global Contacts') {
                $backUrl = '/contacts';
            }
            $validator = Validator::make($request->all(), [
                'fullName' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|digits_between:10,15',
                'country' => 'required|regex:/^[a-zA-Z\s]+$/|max:255|exists:countries,name',
                'message' => 'required|regex:/^[a-zA-Z\s.,-?!]+$/|max:500',
                'files' => 'file|mimes:gif,jpeg,jpg,png,pdf,zip|max:2048',
                'g-recaptcha-response' => 'required|recaptcha'
            ], [
                'fullName.required' => "Please enter name",
                'fullName.regex' => 'Special Characters are not allowed',
                'email.required' => "Please enter email",
                'email.email' => "Please enter a valid email address",
                'phone.required' => "Please enter phone",
                'phone.digits_between' => "Please enter atleast 10 digit",
                'country.required' => "Please enter country",
                'country.regex' => "Special Characters are not allowed",
                'message.required' => "Please enter message",
                'files.mimes' => "Only JPG, GIF, PNG, JPEG and PDF of max 2MB",
                'files.max' => "Only JPG, GIF, PNG, JPEG and PDF of max 2MB",
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.'
            ]);
            if ($validator->fails()) {
                return redirect($backUrl)->withErrors($validator)->withInput()->withFragment('contact-form');;
            }
            // Validate reCAPTCHA
            // $recaptchaResponse = $request->input('g-recaptcha-response');
            // $secretKey = env('RECAPTCHA_SECRET_KEY');
            // $response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            //     'secret' => $secretKey,
            //     'response' => $recaptchaResponse,
            // ]);
            // $responseBody = json_decode($response->getBody());
            // if (!$responseBody->success) {
            //     return redirect()->back()->with('error', 'Captcha validation failed. Retry Again!')->withFragment('contact-form');
            // }
            // END

            $filename = null;
            if ($request->hasFile('files')) {
                $file = $request->file('files');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/contact_enquiry_attachments/'), $filename);
            }

            $contactUs = ContactUs::create([
                'type' => $input['type'],
                'enquiry_type' => $input['enquiry_type'],
                'country' => $input['country'],
                'name' => $input['fullName'],
                'email' => $input['email'],
                'phone_number' => $input['phone'],
                'message' => $input['message'],
                'files' => $filename
            ]);
            if ($contactUs) {
                if (app()->environment('production')) {
                    // Mail::to($input['email'])->send(new ContactSuccessEmail($input));
                }
                // Dispatch Job to enquiry on Go High Level
                RunCommandJob::dispatch('ghl:contact-enquiries')->onQueue('default');

                return redirect($backUrl)->with('success', 'Thank you for your enquiry! Our representive will contact with you soon.')->withFragment('contact-form');
            } else {
                return redirect($backUrl)->with('error', 'Some error has occured! Please allow us some time to fix it.')->withFragment('contact-form');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            if (app()->environment('production')) {
                // Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
            return redirect($backUrl)->with('error', 'Some error has occured! Please allow us some time to fix it.')->withFragment('contact-form');
        }
    }

    public function whereToBuy()
    {
        $countries = Country::pluck('name');
        return view('home.distributor', ['countries' => $countries]);
    }

    public function installerPage()
    {
        try {
            $installerPageContent = TempAsset::where("type", "installer")
                ->get()
                ->keyBy("key")
                ->toArray();
        
            
            if (empty($installerPageContent)) {
                $installerPageContent = Asset::where("type", "installer")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
            return view("home.installer", compact("installerPageContent"));
        } catch (\Exception $e) {
            \Log::error("Error loading homeownerpage content: " . $e->getMessage());
            return view('home.installer');
        }
    }

    public function caseInstaller(Request $request)
    {
        $input = $request->all();
        $type = $input['type'];
        if (!empty($type)) {
            $success_stories = SuccessStory::where('type', $type)->orderBy('id', 'DESC')->take(4)->get();
            return view('success-stories.installer_case', ['success_stories' => $success_stories]);
        } else {
            return response()->json(['status' => false, 'msg' => 'something went wrong']);
        }
    }

    public function downloadPage()
    {
        return view('home.download');
    }

    public function downloadSearchPage(Request $request)
    {
        $query = $request->input('query');
        $results = CompanyDownload::select('name', 'file_name', 'language', 'format', 'size', 'last_updated')->where('name', 'like', '%' . $query . '%')->orWhere('file_name', 'like', '%' . $query . '%')
            ->unionAll(
                MarketingDownload::select('name', 'file_name', 'language', 'format', 'size', 'last_updated')->where('name', 'like', '%' . $query . '%')->orWhere('file_name', 'like', '%' . $query . '%')
            )
            ->unionAll(
                ProductDownload::select('file_name as name', 'language', 'date as last_updated', 'file as file_name', 'format', 'size')->where('file', 'like', '%' . $query . '%')->orWhere('file_name', 'like', '%' . $query . '%')
            )->paginate(10)->appends(['query' => $query]);
        return view('home.search-download', compact('results', 'query'));
    }

    public function companyInfoDownloads($language)
    {
        $companyInfoDownloads = CompanyDownload::where('language', $language)->get();
        return response()->json($companyInfoDownloads);
    }

    public function marketingInfoDownloads($language)
    {
        $marketInfoDownloads = MarketingDownload::with(['productType', 'product'])->where('language', $language)->get()->groupBy('type');
        $data = [];
        foreach ($marketInfoDownloads->toArray() as $x => $value) {
            foreach ($value as $y => $download) {
                $productType = $download['product_type']['name'];
                $product = $download['product']['name'];
                $data[$productType][$product][] = $download;
            }
        }
        return view('home.marketing-info', ['data' => $data]);
    }

    public function productInfoDownloads($language)
    {
        //Company Info Download
        $companyInfoDownloads = CompanyDownload::where('language', $language)->get();

        //Product Info Download
        $productInfoDownloads = ProductDownload::with(['productType', 'product', 'certificate'])->where('language', $language)->get()->groupBy('product_type_id');

        $file_types = config('constant.file_types');
        $productInfoData = [];
        foreach ($productInfoDownloads->toArray() as $x => $value) {
            foreach ($value as $y => $download) {
                $productType = $download['product_type']['name'];
                $product = $download['product']['name'];
                if (!empty($download['certification_id'])) {
                    $productInfoData[$productType][$product][$file_types[$download['file_type']]][$download['certification_id']][] = $download;
                } else {
                    $productInfoData[$productType][$product][$file_types[$download['file_type']]][] = $download;
                }
            }
        }
        //Marketing Info Download
        $marketInfoDownloads = MarketingDownload::with(['productType', 'product'])->where('language', $language)->get()->groupBy('type');
        $marketingInfodata = [];
        foreach ($marketInfoDownloads->toArray() as $x => $value) {
            foreach ($value as $y => $download) {
                $productType = $download['product_type']['name'];
                $product = $download['product']['name'];
                $marketingInfodata[$productType][$product][] = $download;
            }
        }

        return view('home.product-info', ['companyDownload' => $companyInfoDownloads, 'productInfo' => $productInfoData, 'marketingInfo' => $marketingInfodata]);
    }


    public function productPage()
    {   
        try {
            $productpagecontent = TempAsset::where("type", "product")
                ->get()
                ->keyBy("key")
                ->toArray();
            if (empty($productpagecontent)) {
                $productpagecontent = Asset::where("type", "product")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
            return view(
                "home.product",
                compact("productpagecontent")
            );
        } catch (\Exception $e) {
            return redirect("admin/products")->withErrors([
                "error" =>
                    "An error occurred while loading the product page content.",
            ]);
        }
    }

    public function globalContacts()
    {
        $countries = Country::pluck('name');
        $globalContact = GlobalContact::with('country')->orderBy('id', 'ASC')->get();
        return view('home.global-contact', ['globalContact' => $globalContact, 'countries' => $countries]);
    }

    public function warrantyPolicy()
    {
        return view('home.warranty-policy');
    }

    public function sustainabilityPage()
    {
        return view('home.sustainability');
    }

    public function energyStorageSystem()
    {
        return view('home.energy-storage-system');
    }

    public function theCloudApp()
    {
        $products = Product::where('slug', 'monitoring-dongles')->where('is_active', 1)->where('is_deleted', 0)->get();
        return view('home.the-cloud-app', ['otherProducts' => $products]);
    }

    public function pocketDongles()
    {
        return view('home.pocket-dongles');
    }

    public function termsOfUse()
    {
        return view('home.terms-of-use');
    }

    public function privacyPolicy()
    {
        return view('home.privacy-policy');
    }

    public function sitemap()
    {
        $news = News::all();
        $blogs = Blog::all();

        $products = ProductType::with('productCat.productItem')->get();
        // echo "<pre>";;
        // print_r($products);
        // exit;
        return view('home.sitemap', ['news' => $news, 'blogs' => $blogs, 'products' => $products]);
    }

    public function bookAppointment()
    {
        return view('home.book-appointment');
    }

    public function productCat($slug = '')
    {
        $productCat = ProductType::with('productCat.productItem')->where('is_active', 1)->where('is_deleted', 0)->get();
        $curent_cat_type = ProductType::where('slug', $slug)->where('is_active', 1)->where('is_deleted', 0)->get();
        $curent_cat_type_id = $curent_cat_type[0]->id;
        $faq = FAQ::where('product_type_id', $curent_cat_type_id)->where('is_active', 1)->where('is_deleted', 0)->get();
        
        return view('home.product-category', ['productCat' => $productCat, 'faq' => $faq, 'category' => $slug]);
    }

    public function productItem($category = '', $slug = '')
    {
        $countProduct = Product::join('product_types', 'product_types.id', '=', 'products.product_types_id')->where('products.is_active', 1)->where('products.is_deleted', 0)->where('product_types.slug', $category)->where('products.slug', $slug)->count();

        if(empty($countProduct)) {
            return abort(404);
        }

        $products = Product::where('is_active', 1)->where('is_deleted', 0)->get();

        $filterProd = $products->first(function ($prod, $index) use ($slug, $products) {
            if($prod->slug == $slug) {
                // $selected = $prod;
                unset($products[$index]);
            }
            return $prod->slug == $slug;
        });

        if(empty($filterProd)) {
            abort(404);
        }

        //Product Info Download
        $productInfoDownloads = ProductDownload::with(['productType', 'product', 'certificate'])->where('language', 'English')->where('product_id', $filterProd->id)->get()->groupBy('product_type_id');

        $file_types = config('constant.file_types');
        $productInfoData = [];
        foreach ($productInfoDownloads->toArray() as $x => $value) {
            foreach ($value as $y => $download) {
                if (!empty($download['certification_id'])) {
                    $productInfoData[$file_types[$download['file_type']]][$download['certification_id']][] = $download;
                } else {
                    $productInfoData[$file_types[$download['file_type']]][] = $download;
                }
            }
        }

        //Marketing Info Download
        $marketInfoDownloads = MarketingDownload::with(['productType', 'product'])->where('language', 'English')->where('product_type', $filterProd->id)->get()->groupBy('type');
        $marketingInfodata = [];
        foreach ($marketInfoDownloads->toArray() as $x => $value) {
            foreach ($value as $y => $download) {
                $marketingInfodata[] = $download;
            }
        }
        
        $productCategory = ProductCategory::where('id', $filterProd->product_category_id)
        ->where('is_deleted', 0)
        ->where('is_active', 1)
        ->first();
        $productSlider = ProductSlider::where('product_id',$filterProd->id)->where('is_deleted', 0)->get();
        $productFeatures = ProductFeature::where('product_id', $filterProd->id)
        ->where('is_deleted', 0)
        ->get()
        ->groupBy('feature_category');
        $productAssets = ProductAsset::where("product_id", $filterProd->id)
        ->get()
        ->keyBy("product_asset_key")
        ->toArray();
        $productSpecification = ProductSpecification::where('product_id', $filterProd->id)
        ->where('is_deleted', 0)
        ->get()
        ->groupBy('specification_label');



        return view('home.' . $slug, ['otherProducts' => $products, 'productInfo' => $productInfoData, 'marketingInfo' => $marketingInfodata, 'slug' => $slug, 'filterProd' => $filterProd, 'productSlider' => $productSlider, 'productCategory' => $productCategory, 'productFeatures' => $productFeatures, 'productAssets' => $productAssets, 'productSpecification' => $productSpecification]);
    }

    public function homeowners()
    {
        
        try {
            $homeOwnerPageContent = TempAsset::where("type", "homeowner")
                ->get()
                ->keyBy("key")
                ->toArray();
        
            
            if (empty($homeOwnerPageContent)) {
                $homeOwnerPageContent = Asset::where("type", "homeowner")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
        
            return view("home.homeowners", compact("homeOwnerPageContent"));
        } catch (\Exception $e) {
            \Log::error("Error loading homeownerpage content: " . $e->getMessage());
            return view('home.homeowners');
        }
    }

    public function downloadAll($language = '', $slug = '')
    {
        try{
            Log::info('Product '.$slug.' Started');
            $file_types = config('constant.file_types');
            $product = Product::where('slug', $slug)->where('is_active', 1)->where('is_deleted', 0)->first();

            if(empty($product)) {
                abort(404);
            }

            //Product Info Download
            $productInfoDownloads = ProductDownload::with(['certificate'])->where('language', $language)->where('product_id', $product->id)->get();

            $file_types = config('constant.file_types');
            $productInfoData = [];
            foreach ($productInfoDownloads->toArray() as $x => $download) {
                    if (!empty($download['certification_id'])) {
                        $productInfoData[$file_types[$download['file_type']]][$download['certification_id']][] = $download;
                    } else {
                        $productInfoData[$file_types[$download['file_type']]][] = $download;
                    }
            }

            $baseMasterDir = 'uploads/downloads-'.time();

            // Base directory where files should be saved
            $baseDir = $baseMasterDir.'/'.$product->name.'/product-info';

            // Create base directory if it doesn't exist
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            // Loop through each category (Datasheet, User Manual, etc.)
            foreach ($productInfoData as $category => $files) {
                // Create a folder for each category inside the base directory
                $folderPath = $baseDir . '/' . $category;
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0755, true);
                }

                // Loop through each file in the category
                foreach ($files as $fileInfo) {
                    if($category == 'Certification') {
                        foreach ($fileInfo as $certificateInfo) {
                            $fileUrl = public_path('/uploads/file/' . $certificateInfo['file']);  // Adjust this URL based on your file structure

                            $folderPath = $baseDir . '/' . $category . '/' . $certificateInfo['certificate']['name'];
                            if (!is_dir($folderPath)) {
                                mkdir($folderPath, 0755, true);
                            }

                            // Full path where the file will be saved
                            $savePath = public_path($folderPath).'/'.$certificateInfo['file'];

                            // Download and save the file
                            $fileContent = file_get_contents($fileUrl);
                            if ($fileContent !== false) {
                                file_put_contents($savePath, $fileContent);
                                // echo "File saved to: $savePath\n";
                            } else {
                                Log::error($slug.' - Download All Error Product Info: File '.$savePath.' doesn\'t inlcuded into zip');
                            }
                        }
                    } else {
                        $fileUrl = public_path('/uploads/file/' . $fileInfo['file']);  // Adjust this URL based on your file structure

                        // Full path where the file will be saved
                        $savePath = public_path($folderPath).'/'.$fileInfo['file'];

                        // Download and save the file
                        $fileContent = file_get_contents($fileUrl);
                        if ($fileContent !== false) {
                            file_put_contents($savePath, $fileContent);
                        } else {
                            Log::error($slug.' - Download All Error Product Info: File '.$savePath.' doesn\'t inlcuded into zip');
                        }
                    }
                }
            }

            //Marketing Info Download
            $marketInfoDownloads = MarketingDownload::where('language', $language)->where('product_type', $product->id)->get()->groupBy('type');
            $marketingInfodata = [];
            foreach ($marketInfoDownloads->toArray() as $x => $value) {
                foreach ($value as $y => $download) {
                    $marketingInfodata[] = $download;
                }
            }

            // Base directory where files should be saved
            $baseDir = $baseMasterDir.'/'.$product->name.'/marketing-info';

            // Create base directory if it doesn't exist
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0755, true);
            }

            // Loop through each category (Datasheet, User Manual, etc.)
            foreach ($marketingInfodata as $category => $files) {
                // Create a folder for each category inside the base directory
                $folderPath = $baseDir;
                if (!is_dir($folderPath)) {
                    mkdir($folderPath, 0755, true);
                }

                $fileUrl = public_path('/uploads/file/' . $files['file_name']);  // Adjust this URL based on your file structure

                // Full path where the file will be saved
                $savePath = public_path($folderPath).'/'.$files['file_name'];

                // Download and save the file
                $fileContent = file_get_contents($fileUrl);
                if ($fileContent !== false) {
                    file_put_contents($savePath, $fileContent);
                } else {
                    Log::error($slug.' - Download All Error Marketing Info: File '.$savePath.' doesn\'t inlcuded into zip');
                }
            }

            // Zip the download folder and prompt user for download
            $source = public_path($baseMasterDir); // Source directory to zip
            $destination = public_path($baseMasterDir.'.zip'); // Output zip file path
            if ($this->zipDownload($source, $destination)) {

                if (file_exists($destination)) {
                    // Register a shutdown function to delete the file after the script finishes
                    register_shutdown_function(function() use ($destination, $baseMasterDir) {
                        // Ensure the file exists before attempting to delete
                        if (file_exists($destination)) {
                            unlink($destination); // Delete the file
                        }
                        if (is_dir(public_path($baseMasterDir))) {
                            File::deleteDirectory(public_path($baseMasterDir));
                            // $this->deleteDirectory($baseMasterDir); // Recursively delete subdirectory
                        }
                    });

                    //Download zip file
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="'.basename($baseMasterDir.'.zip').'"');
                    header('Content-Length: ' . filesize($baseMasterDir.'.zip'));

                    flush(); // Flush system output buffer
                    readfile($baseMasterDir.'.zip');

                } else {;
                    Log::info($slug.' - Download All Error Info: The file does not exist');
                }
            } else {
                Log::info($slug.' - Download All Error Info: Problem with zip creation');
            }

        } catch(\Exception $e) {
            Log::error($slug.' - Download All Error:'. $e->getMessage());
        }
        Log::info('Product '.$slug.' Ended');
    }

    public function deleteDirectory($dir) {
        if (!is_dir($dir)) {
            return false; // If not a directory, return false
        }

        $items = array_diff(scandir($dir), ['.', '..']); // Get directory contents excluding '.' and '..'

        foreach ($items as $item) {
            $itemPath = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($itemPath)) {
                $this->deleteDirectory($itemPath); // Recursively delete subdirectory
            } else {
                unlink($itemPath); // Delete file
            }
        }

        return rmdir($dir); // Finally, remove the directory itself
    }


    public function zipDownload($source, $destination) {
        try{
            if (!extension_loaded('zip') || !file_exists($source)) {
                return false;
            }

            $zip = new ZipArchive();
            if (!$zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                return false;
            }

            $source = realpath($source);

            if (is_dir($source)) {
                $iterator = new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS);
                $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);

                foreach ($files as $file) {
                    $file = realpath($file);

                    // Ignore '.' and '..' directories
                    if (is_dir($file)) {
                        $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                    } else if (is_file($file)) {
                        $zip->addFile($file, str_replace($source . '/', '', $file));
                    }
                }
            } else if (is_file($source)) {
                $zip->addFile($source, basename($source));
            }

            return $zip->close();
        } catch(\Exception $e) {
            Log::error('Download All Zip Error:'. $e->getMessage());
        }
    }
}
