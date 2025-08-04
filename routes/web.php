<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\AwardsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;
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
Route::get('/clear', function() {
   Artisan::call('optimize');
   Artisan::call('route:clear');
   Artisan::call('cache:clear');
   Artisan::call('view:clear'); 
     echo "all Clear";
});

Route::get('/', [FrontendController::class, 'index'])->name('home'); 

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [AdminController::class, 'login_page'])->name('admin.login.form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'register_form'])->name('admin.register.form');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::any('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware'=>'isAdmin'], function(){
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home'); 

    #Awards route
    Route::get('/awards',[AwardsController::class, 'index'])->name('awards');
    Route::get('/add-award/{id?}', [AwardsController::class, 'add_award'])->name('add.award');
    Route::post('/add-update-awards', [AwardsController::class, 'update_awards'])->name('add.update.award');
    Route::post('award-delete',[AwardsController::class, 'delete'])->name('award.delete');

    #banner routs
    Route::get('/banners',[BannersController::class, 'index'])->name('banners'); 
    Route::get('add-banner/{id?}',[BannersController::class, 'form'])->name('add.banner');
    Route::post('banner-post', [BannersController::class, 'add_update'])->name('add.update.banner');
    Route::post('delete-banner', [BannersController::class, 'delete'] )->name('delete.banner');

    #projects category
    Route::get('/projects-category',[CategoryController::class, 'index'])->name('project.category');
    Route::get('add-project-category/{id?}',[CategoryController::class, 'form_category'])->name('add.category');
    Route::post('category-post', [CategoryController::class, 'add_update_category'])->name('add.update.category');
    Route::post('delete-categpry', [CategoryController::class, 'delete_category'] )->name('delete.category');
    Route::any('/change-cat-status/{$id?}/{$flag?}', [CategoryController::class, 'change_status'])->name('category.change.status');

    #projects
    Route::get('/projects',[ProjectController::class, 'index'])->name('project');
    Route::get('add-project/{id?}',[ProjectController::class, 'form'])->name('add.project');
    Route::post('project-post', [ProjectController::class, 'add_update'])->name('add.update.project');
    Route::post('delete-project', [ProjectController::class, 'delete'] )->name('delete.project'); 

    #jobs routes
    Route::get('/jobs',[JobsController::class, 'index'])->name('jobs');
    Route::get('/jobs/form/{id?}',[JobsController::class, 'form'])->name('add.jobs');
    Route::post('/jobs/update',[JobsController::class, 'save'])->name('add.update.jobs');
    Route::post('/jobs/delete',[JobsController::class, 'delete'])->name('delete.jobs'); 
    Route::get('/job-applications',[ApplicationController::class, 'index'])->name('job.application');  
    Route::post('/delete-application',[ApplicationController::class, 'delete'])->name('delete.application'); 
    
    #event routs
    Route::get('/events',[EventsController::class, 'index'])->name('events');  
    Route::get('add-event/{id?}',[EventsController::class, 'form'])->name('add.event');
    Route::post('event-post', [EventsController::class, 'add_update'])->name('add.update.event');
    Route::post('delete-event', [EventsController::class, 'delete'] )->name('delete.event');

    #NEWS
    Route::get('/news',[AboutController::class, 'index'])->name('news');  
    Route::get('add-news/{id?}',[AboutController::class, 'form'])->name('add.news');
    Route::post('news-post', [AboutController::class, 'add_update'])->name('add.update.news');
    Route::post('delete-news', [AboutController::class, 'delete'] )->name('delete.news');

    #MISSION
    Route::get('/mission',[AboutController::class, 'mission'])->name('mission');  
    Route::get('add-mission/{id?}',[AboutController::class, 'form_mission'])->name('add.mission');
    Route::post('mission-post', [AboutController::class, 'add_update_mission'])->name('add.update.mission');
    Route::post('delete-mission', [AboutController::class, 'delete_mission'] )->name('delete.mission');

    #VISION
    Route::get('/vision',[AboutController::class, 'vision'])->name('vision');  
    Route::get('add-vision/{id?}',[AboutController::class, 'form_vision'])->name('add.vision');
    Route::post('vision-post', [AboutController::class, 'add_update_vision'])->name('add.update.vision');
    Route::post('delete-vision', [AboutController::class, 'delete_vision'] )->name('delete.vision');

    #STORY
    Route::get('/story',[AboutController::class, 'story'])->name('story');  
    Route::get('add-story/{id?}',[AboutController::class, 'form_story'])->name('add.story');
    Route::post('story-post', [AboutController::class, 'add_update_story'])->name('add.update.story');
    Route::post('delete-story', [AboutController::class, 'delete_story'] )->name('delete.story');

    #DIRECTOR
    Route::get('/director',[AboutController::class, 'director'])->name('director');  
    Route::get('add-director/{id?}',[AboutController::class, 'form_director'])->name('add.director');
    Route::post('director-post', [AboutController::class, 'add_update_director'])->name('add.update.director');
    Route::post('delete-director', [AboutController::class, 'delete_director'] )->name('delete.director');

    #icon uploads
    Route::post('upload-logo', [HomeController::class, 'upload_header_logo'])->name('upload.header.logo');
    Route::post('upload-footer-logo', [HomeController::class, 'upload_footer_logo'])->name('upload.footer.logo');
    Route::post('upload-favicon', [HomeController::class, 'upload_favicon'])->name('upload.favicon');

    #CONTACT US ROUTES
    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact.us'); 
    Route::get('delete-contact-us/{id}',[HomeController::class, 'delete_contact_us'])->name('delete.contact.us');

    #GALLERY
    Route::get('gallery', [NewsController::class, 'gallery'])->name('gallery');
    Route::get('gallery-form/{id?}', [NewsController::class, 'gallery_form'])->name('add.gallery');
    Route::post('gallery', [NewsController::class, 'add_photo'])->name('update.gallery');
    Route::post('delete-gallery', [NewsController::class, 'delete_gallery'])->name('delete.gallery');

    #SEO
    Route::get('/seo', [HomeController::class, 'seo'])->name('seo');
    Route::post('/seo-add', [HomeController::class, 'add_seo'])->name('add.seo');

    #news Letter
    Route::get('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter');
    Route::post('/delete/newsletter', [HomeController::class, 'delete_newsletter'])->name('delete.newsletter');

    #ABOUT PAGE ROUTES
    Route::get('aboutus', [HomeController::class, 'aboutus'])->name('about.us');
    Route::get('update/about/us/{id?}', [HomeController::class, 'edit_about_us'])->name('add.about.us');
    Route::post('update/about/us',[HomeController::class, 'update_about_us'])->name('update.about.us');
    Route::post('delete/about/us', [HomeController::class, 'delete_about_us'])->name('delete.about.us');
    Route::post('bulk/delete/{table?}',[HomeController::class, 'bulk_delete'])->name('delete.bulk');

});

#frontend  
Route::get('/home/{id?}', [FrontendController::class, 'index'])->name('front.home');
Route::get('/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/career', [FrontendController::class, 'career'])->name('front.career');
Route::get('/event', [FrontendController::class, 'event'])->name('front.event');
Route::get('/contactus', [FrontendController::class, 'contact_us'])->name('front.contactus');
Route::get('/project/{id?}', [FrontendController::class, 'projects'])->name('project.list');
Route::get('/apply/{id?}', [FrontendController::class, 'apply_for_job'])->name('apply.for.job');
Route::post('feedback', [FrontendController::class, 'feedback'])->name('feedback');
Route::any('/projects/list', [FrontendController::class, 'category_list'])->name('category.list');
Route::post('/apply', [FrontendController::class, 'apply'])->name('apply');
Route::any('/photo/gallery', [FrontendController::class, 'photo_gallery'])->name('photo.gallery');
Route::post('save/newsletter', [FrontendController::class, 'save_newsletter'])->name('save.newsletter');
Route::any('project/details/{id?}',[FrontendController::class, 'project_details'])->name('project.details');
Route::any('event/details/{id?}', [FrontendController::class, 'event_details'])->name('event.details');
Route::any('award/details/{id?}', [FrontendController::class, 'award_details'])->name('award.details');
Route::any('destroy', [FrontendController::class, 'destroy'])->name('destroy');
Route::get('/blank', function(){
    return view('admin.forms');
})->name('forms');

Route::get('components', function(){
    return view('admin.components');
})->name('components');

#Client Routes

 
