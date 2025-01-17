<?php

use App\Http\Controllers\BookConsultationController;
use App\Http\Controllers\GHLController;
use App\Services\GoHighLevelServiceV1;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/contact', '/usa-contact', 301);

Route::get('/','App\Http\Controllers\HomeController@index')->name('home.index');

//News Frontend
Route::get('/news','App\Http\Controllers\NewsFrontenedController@index')->name('news.frontened.index');
Route::get('/load-more-news/{slug?}','App\Http\Controllers\NewsFrontenedController@loadMoreNews')->name('news.frontened.load');
Route::get('/news/{slug?}','App\Http\Controllers\NewsFrontenedController@details')->name('news.frontened.details');

Route::get('/createSlug','App\Http\Controllers\NewsFrontenedController@createSlug');

//Blogs Frontend
Route::get('/blogs','App\Http\Controllers\BlogFrontenedController@index')->name('blogs.frontened.index');
Route::get('/load-more-blogs/{slug?}','App\Http\Controllers\BlogFrontenedController@loadMoreBlogs')->name('blogs.frontened.load');
Route::get('/blogs/{slug?}','App\Http\Controllers\BlogFrontenedController@details')->name('blogs.frontened.details');

//Events Frontend
Route::get('/events/','App\Http\Controllers\EventFrontenedController@index')->name('events.frontened.index');
Route::get('/events/{slug?}','App\Http\Controllers\EventFrontenedController@details')->name('events.frontened.details');
Route::get('/load-more-events/','App\Http\Controllers\EventFrontenedController@loadMoreEvents')->name('events.frontened.load');

//Success Stories
Route::get('/case/','App\Http\Controllers\SuccessStoriesFrontenedController@index')->name('success_story.frontened.index');
Route::get('/case/{id}','App\Http\Controllers\SuccessStoriesFrontenedController@details')->name('success_story.frontened.details');
Route::post('succes-stories/case','App\Http\Controllers\SuccessStoriesFrontenedController@storiesData')->name('stories.frontened');

//About us
Route::get('/about/','App\Http\Controllers\SocialFrontenedController@aboutUs')->name('frontened.about.us');

//Contact us
Route::get('/usa-contact/','App\Http\Controllers\SocialFrontenedController@contactUs')->name('frontened.contact.us');
Route::post('/usa-contact/save','App\Http\Controllers\SocialFrontenedController@saveContactUs')->name('frontened.contact.us.save');
Route::get('/get-countries','App\Http\Controllers\SocialFrontenedController@getCountries')->name('countries.get');
Route::post('/verify-otp','App\Http\Controllers\SocialFrontenedController@verifyOtp')->name('verify-otp');

//Find a distributor
Route::get('/where-to-buy/','App\Http\Controllers\SocialFrontenedController@whereToBuy')->name('frontened.where.to.buy');

//Installer
Route::get('/installer/','App\Http\Controllers\SocialFrontenedController@installerPage')->name('frontened.installer');
Route::post('/installer/case','App\Http\Controllers\SocialFrontenedController@caseInstaller')->name('frontened.installer.case');

//Download
Route::get('/downloads/','App\Http\Controllers\SocialFrontenedController@downloadPage')->name('frontened.download');
Route::get('/search','App\Http\Controllers\SocialFrontenedController@downloadSearchPage')->name('frontened.search');
Route::post('/downloads/company-info/{language}','App\Http\Controllers\SocialFrontenedController@companyInfoDownloads')->name('frontened.company.info.downloads');
Route::post('/downloads/marketing-info/{language}','App\Http\Controllers\SocialFrontenedController@marketingInfoDownloads')->name('frontened.marketing.info.downloads');
Route::post('/downloads/product-info/{language}','App\Http\Controllers\SocialFrontenedController@productInfoDownloads')->name('frontened.product.info.downloads');
Route::get('/downloads/download-all/{language}/{slug}','App\Http\Controllers\SocialFrontenedController@downloadAll')->name('frontened.download.all');

//Global Contacts
Route::get('/contacts/','App\Http\Controllers\SocialFrontenedController@globalContacts')->name('frontened.global.contacts');

//Waranty Policy
Route::get('/warranty/','App\Http\Controllers\SocialFrontenedController@warrantyPolicy')->name('frontened.warranty.policy');

//Sustainability
Route::get('/sustainability/','App\Http\Controllers\SocialFrontenedController@sustainabilityPage')->name('frontened.sustainability');

//Energy Storage System
Route::get('/solar-products-used-energy-storage-system/','App\Http\Controllers\SocialFrontenedController@energyStorageSystem')->name('frontened.energy.storage.system');

//Products
// Route::get('/products/{slug?}/','App\Http\Controllers\SocialFrontenedController@productsCategory')->name('frontened.products.category');

//Product
Route::get('/products/','App\Http\Controllers\SocialFrontenedController@productPage')->name('frontened.products');
Route::get('/products/{slug?}','App\Http\Controllers\SocialFrontenedController@productCat')->name('stories.productCat');
Route::get('/products/{category?}/{slug?}/','App\Http\Controllers\SocialFrontenedController@productItem')->name('frontened.products.category.item');
// Route::get('/products/{slug?}/{slug?}','App\Http\Controllers\SocialFrontenedController@productItem')->name('frontened.product.item');

//The Cloud App-solar-products-in-smart-energy-management-system
Route::get('/solar-products-in-smart-energy-management-system/','App\Http\Controllers\SocialFrontenedController@theCloudApp')->name('frontened.the.cloud.app');

//Pocket Dongles - monitoring-dongles
// Route::get('/monitoring-dongles/','App\Http\Controllers\SocialFrontenedController@pocketDongles')->name('frontened.pocket-dongles');

//Term of use
Route::get('/terms-of-use/','App\Http\Controllers\SocialFrontenedController@termsOfUse')->name('frontened.terms-of-use');

//Privacy Policy
Route::get('/privacy-policy/','App\Http\Controllers\SocialFrontenedController@privacyPolicy')->name('frontened.privacy-policy');

//Sitemap
Route::get('/sitemap/','App\Http\Controllers\SocialFrontenedController@sitemap')->name('frontened.sitemap');

Route::get('/book-appointment','App\Http\Controllers\SocialFrontenedController@bookAppointment')->name('frontened.book.appointment');
//Homeowners
Route::get('/homeowners','App\Http\Controllers\SocialFrontenedController@homeowners')->name('frontened.homeowners');

//News Letter
Route::post('/news-letter/save','App\Http\Controllers\NewsLetterController@saveNewsLetter')->name('frontened.news.letter.save');

Route::match(['get', 'post'], '/book-consultation', [BookConsultationController::class, 'bookConsultation'])->name('frontened.book.consultation');
Route::match(['get'], '/booking-success', [BookConsultationController::class, 'bookingSuccess'])->name('frontened.book.success');

