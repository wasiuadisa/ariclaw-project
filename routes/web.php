<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

#########################################
#### Public area routes' controllers ####
#########################################
use App\Http\Controllers\PublicPages\IndexPageController;
use App\Http\Controllers\PublicPages\AboutPageController;
use App\Http\Controllers\PublicPages\ContactPageController;
use App\Http\Controllers\PublicPages\FaqPageController;
use App\Http\Controllers\PublicPages\ServicesPageController;
use App\Http\Controllers\PublicPages\TeamPageController;

#########################################
##### Admin area routes' controllers ####
#########################################
use App\Http\Controllers\AdminPages\AdminIndexPageController;
use App\Http\Controllers\AdminPages\AdminAboutPageController;
use App\Http\Controllers\AdminPages\AdminTeamPageController;
use App\Http\Controllers\AdminPages\AdminTeamMemberController;
use App\Http\Controllers\AdminPages\AdminTestimonyController;
use App\Http\Controllers\AdminPages\AdminFaqPageController;
use App\Http\Controllers\AdminPages\AdminFaqController;
use App\Http\Controllers\AdminPages\AdminServiceController;
use App\Http\Controllers\AdminPages\AdminServicePageController;
use App\Http\Controllers\AdminPages\AdminMarketingPitchController;
use App\Http\Controllers\AdminPages\ImageController;
use App\Http\Controllers\AdminPages\AdminVariousImageController;
use App\Http\Controllers\AdminPages\AdminSiteSettingsController;

/*
|---------------------------------------------------------
| Web Routes
|---------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Middleware\PublicTemplateSettingsMiddleware;
use App\Http\Middleware\PublicTemplateServicesMiddleware;

#########################################
######### Public area routes ############
#########################################
//Route::get('/', IndexPageController::class)->middleware('PublicTemplateSettingsMiddleware::class')->name('index');

// All public routes
Route::middleware([PublicTemplateSettingsMiddleware::class, PublicTemplateServicesMiddleware::class])->group(function () {
    //Test page
    Route::get('/test', function () {
        return view('errors.503');
    })->name('test');

    // Index or Landing page
    Route::get('/', IndexPageController::class)->name('index');

    // About page
    Route::get('/about', AboutPageController::class)->name('public_about');

    // Team page
    Route::get('/team', TeamPageController::class)->name('public_team');

    // FAQ page
    Route::get('/frequently-asked-questions', FaqPageController::class)->name('public_faqs');

    // Services page
    Route::get('/services', ServicesPageController::class)->name('public_services');

    // Contact Us page
    Route::get('/contact-us', [ContactPageController::class, 'create'])->name('public_contactus');
    Route::post('/contact-us', [ContactPageController::class, 'store'])->name('public_contactus_post');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->prefix('admin')->group(function () {
Route::middleware(['auth'])->prefix('admin')->group(function () {
    #########################################
    ##### Default user profile editing ######
    ######### updating & deleting ###########
    #########################################
    // User profile edit form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // User profile edit form processing
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // User profile deletion
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    #########################################
    ###### Image(s) processing routes #######
    ############## & controllers ############
    #########################################
    // Images edit form
    Route::get('/images/{imageResource?}/{imageSpecific?}', [ImageController::class, 'imagesForm'])->name('admin.image_form');
    // Images edit form processing
    Route::post('/images/{imageResource?}/{imageSpecific?}', [ImageController::class, 'imagesStore'])->name('admin.image_store');

    #########################################
    #### About Page routes & controllers ####
    #########################################
    // About page edit form
    Route::get('/about-page', [AdminAboutPageController::class, 'editForm'])->name('admin.about');
    // About page edit form processing
    Route::post('/about-page', [AdminAboutPageController::class, 'store'])->name('admin.about_post');

    #########################################
    #### Team Page routes & controllers #####
    #########################################
    // Team page edit form
    Route::get('/team-page', [AdminTeamPageController::class, 'editTeamPageForm'])->name('admin.team-page');
    // Team page edit form processing
    Route::post('/team-page', [AdminTeamPageController::class, 'storeTeamPageForm'])->name('admin.team_page_post');

    #########################################
    ### Team Members routes & controllers ###
    #########################################
    // Create New Team member data form
    Route::get('/new-team-member', [AdminTeamMemberController::class, 'newTeamMember'])->name('admin.new-team-member');
    // Process New Team member data form
    Route::post('/new-team-member', [AdminTeamMemberController::class, 'newTeamMemberFormProcessing'])->name('admin.new-team-member-processing');
    
    // Create New Team member photo data form
    Route::get('/new-team-member-photo/{memberID}', [AdminTeamMemberController::class, 'newTeamMemberImage'])->name('admin.new-team-member-photo');
    // Process New Team member photo data form
    Route::post('/new-team-member-photo', [AdminTeamMemberController::class, 'newTeamMemberImageFormProcessing'])->name('admin.new-team-member-photo-processing');
    
    // Team members list
    Route::get('/team-members', [AdminTeamMemberController::class, 'listTeams'])->name('admin.teams');
    
    // Team member edit form
    Route::get('/team-members/{id}', [AdminTeamMemberController::class, 'editTeamForm'])->name('admin.team_edit');
    // Team member edit form processing
    Route::post('/team-members/{id}', [AdminTeamMemberController::class, 'storeTeamMember'])->name('admin.team_post');
    
    // Team Member Image edit form (for multiple images)
    Route::get('/image-team/{imageResource?}/{imageResourceID?}', [AdminTeamMemberController::class, 'imagesFormForMultipleTeams'])->name('admin.image_form_for_team');
    // Team Member Image edit form (for multiple images)
    Route::post('/image-team/{imageResource?}/{imageResourceID?}', [AdminTeamMemberController::class, 'storeImagesFormForMultipleTeams'])->name('admin.store_image_form_for_team');
    
    // Team member deleting
    Route::delete('/team-members/{id}', [AdminTeamMemberController::class, 'deleteTeamMember'])->name('admin.team_delete');

    #########################################
    #### Testimony routes & controllers #####
    #########################################
    // Create New Testimony data form
    Route::get('/new-testimony', [AdminTestimonyController::class, 'newTestimony'])->name('admin.new-testimony');
    // Process New Testimony data form
    Route::post('/new-testimony', [AdminTestimonyController::class, 'newTestimonyFormProcessing'])->name('admin.new-testimony-processing');
    
    // Create New Testimony photo data form
    Route::get('/new-testimony-photo/{testimonialID}', [AdminTestimonyController::class, 'newTestimonialImage'])->name('admin.new-testimony-photo');
    // Process New Testimony photo data form
    Route::post('/new-testimony-photo', [AdminTestimonyController::class, 'newTestimonialImageFormProcessing'])->name('admin.new-testimony-photo-processing');
    
    // Testimonies list
    Route::get('/testimonies', [AdminTestimonyController::class, 'listTestimonials'])->name('admin.testimonials');
    
    // Testimony edit form
    Route::get('/testimonies/{id}', [AdminTestimonyController::class, 'editTestimonialForm'])->name('admin.testimony_edit');
    // Testimony edit form processing
    Route::post('/testimonies/{id}', [AdminTestimonyController::class, 'storeTestimonial'])->name('admin.testimony_post');
    
    // Testimony Image edit form (for multiple images)
    Route::get('/image-testimony/{imageResource?}/{imageResourceID?}', [AdminTestimonyController::class, 'imagesFormForMultipleTestimonials'])->name('admin.image_edit_form_for_testimony');
    // Testimony Image edit form (for multiple images)
    Route::post('/image-testimony/{imageResourceID?}', [AdminTestimonyController::class, 'storeImagesFormForMultipleTestimonials'])->name('admin.store_image_edit_form_for_testimony');
    
    // Testimony deleting
    Route::delete('/testimonies/{id}', [AdminTestimonyController::class, 'deleteTestimonial'])->name('admin.testimony_delete');

    ##############################################
    ### Marketing pitches routes & controllers ###
    ##############################################
    // Create New Marketing pitch data form
    Route::get('/new-marketing-pitch', [AdminMarketingPitchController::class, 'newMarketingPitch'])->name('admin.new-marketing-pitch');
    // Process New Marketing pitch data form
    Route::post('/new-marketing-pitch', [AdminMarketingPitchController::class, 'newMarketingPitchFormProcessing'])->name('admin.new-marketing-pitch-processing');
    
    // Marketing pitch list
    Route::get('/marketing-pitches', [AdminMarketingPitchController::class, 'listMarketingPitches'])->name('admin.marketing-pitches');
    
    // Marketing pitch edit form
    Route::get('/marketing-pitch/{id}', [AdminMarketingPitchController::class, 'editMarketingPitchForm'])->name('admin.marketing-pitch_edit');
    // Marketing pitch edit form processing
    Route::post('/marketing-pitch/{id}', [AdminMarketingPitchController::class, 'storeMarketingPitch'])->name('admin.marketing-pitch_post');
    
    // Marketing pitch deleting
    Route::delete('/marketing-pitch/{id}', [AdminMarketingPitchController::class, 'deleteMarketingPitch'])->name('admin.marketing-pitch_delete');

    #########################################
    ## Services Page routes & controllers ###
    #########################################
    // Service page edit form
    Route::get('/service-page', [AdminServicePageController::class, 'servicePageEditForm'])->name('admin.service-page');
    // Service page edit form processing
    Route::post('/service-page', [AdminServicePageController::class, 'storeServicePageFormEdits'])->name('admin.service-page_post');

    #########################################
    ##### Services routes & controllers #####
    #########################################
    // Create New Service data form
    Route::get('/new-service', [AdminServiceController::class, 'newServiceForm'])->name('admin.new-service');
    // Process New Service data form
    Route::post('/new-service', [AdminServiceController::class, 'newServiceFormProcessing'])->name('admin.new-service-processing');
    
    // Services list
    Route::get('/services', [AdminServiceController::class, 'listServices'])->name('admin.services');
    
    // Service edit form
    Route::get('/service/{id}', [AdminServiceController::class, 'editServiceForm'])->name('admin.service_edit');
    // Service edit form processing
    Route::post('/service/{id}', [AdminServiceController::class, 'storeServiceForm'])->name('admin.service_edit_post');
    
    // Service icon edit form
    Route::get('/service-icon/{id}', [AdminServiceController::class, 'editServiceIconForm'])->name('admin.service-icon_edit');
    // Service edit form processing
    Route::post('/service-icon/{id}', [AdminServiceController::class, 'storeServiceIconForm'])->name('admin.service-icon_edit_post');
    
    // Service deleting
    Route::delete('/service/{id}', [AdminServiceController::class, 'deleteService'])->name('admin.service_delete');

    #########################################
    ##### FAQ Page routes & controllers #####
    #########################################
    // FAQ page edit form
    Route::get('/faq-page', [AdminFaqPageController::class, 'faqPageEditForm'])->name('admin.faq-page');
    // FAQ page edit form processing
    Route::post('/faq-page', [AdminFaqPageController::class, 'storeFaqPageFormEdits'])->name('admin.faq-page_post');

    #########################################
    ####### FAQ routes & controllers ########
    #########################################
    // Create New FAQ data form
    Route::get('/new-faq', [AdminFaqController::class, 'newFaqForm'])->name('admin.new-faq');
    // Process New FAQ data form
    Route::post('/new-faq', [AdminFaqController::class, 'newFaqFormProcessing'])->name('admin.new-faq-processing');
    
    // FAQs list
    Route::get('/frequently-asked-questions', [AdminFaqController::class, 'listFaqs'])->name('admin.faqs');
    
    // FAQ edit form
    Route::get('/frequently-asked-questions/{id}', [AdminFaqController::class, 'editFaqForm'])->name('admin.faq_edit');
    // FAQ edit form processing
    Route::post('/frequently-asked-questions/{id}', [AdminFaqController::class, 'storeFaqForm'])->name('admin.faq_edit_post');
    
    // FAQ deleting
    Route::delete('/faq/{id}', [AdminFaqController::class, 'deleteFaq'])->name('admin.faq_delete');

    ####################################
    ## Home page routes & controllers ##
    ####################################
    // Home page text edit form
    Route::get('/home-page', [AdminIndexPageController::class, 'indexEditForm'])->name('admin.index');
    // Home page text edit form processing
    Route::post('/home-page', [AdminIndexPageController::class, 'storeIndexPage'])->name('admin.index_post');

    // Home page banner image edit form
    Route::get('/home-page-banner-image/{postID}', [AdminIndexPageController::class, 'imageFormForHomeBannerImage'])->name('admin.banner_home_image_form');
    // Home page banner image edit form processing
    Route::post('/home-page-banner-image', [AdminIndexPageController::class, 'storeImageFormForHomeBannerImage'])->name('admin.store_banner_home_image_form');

    // Home page feature1 image edit form
    Route::get('/home-page-feature1-image/{postID}', [AdminIndexPageController::class, 'imageFormForHomeFeature1Image'])->name('admin.feature1_home_image_form');
    // Home page feature1 image edit form
    Route::post('/home-page-feature1-image', [AdminIndexPageController::class, 'storeImageFormForHomeFeature1Image'])->name('admin.store_feature1_home_image_form');

    // Home page feature2 image edit form
    Route::get('/home-page-feature2-image/{postID}', [AdminIndexPageController::class, 'imageFormForHomeFeature2Image'])->name('admin.feature2_home_image_form');
    // Home page feature2 image edit form
    Route::post('/home-page-feature2-image', [AdminIndexPageController::class, 'storeImageFormForHomeFeature2Image'])->name('admin.store_feature2_home_image_form');

    // Home page feature3 image edit form
    Route::get('/home-page-feature3-image/{postID}', [AdminIndexPageController::class, 'imageFormForHomeFeature3Image'])->name('admin.feature3_home_image_form');
    // Home page feature3 image edit form
    Route::post('/home-page-feature3-image', [AdminIndexPageController::class, 'storeImageFormForHomeFeature3Image'])->name('admin.store_feature3_home_image_form');

    #########################################
    ## Settings Page routes & controllers ###
    #########################################
    // Site settings edit page
    Route::get('/site-settings', [AdminSiteSettingsController::class, 'siteSettingsEditForm'])->name('admin.settings');
    // Site settings edit page edit form processing
    Route::post('/site-settings', [AdminSiteSettingsController::class, 'storeSiteSettingsEditForm'])->name('admin.settings_post');

    // Site settings logo image edit form
    Route::get('/site-logo-image/{postID}', [AdminSiteSettingsController::class, 'imageFormForSiteLogoImage'])->name('admin.site_logo_image_form');
    // Site settings logo image edit form processing
    Route::post('/site-logo-image', [AdminSiteSettingsController::class, 'storeImageFormForSiteLogo'])->name('admin.store_site_logo_image_form');

    // Site settings favicon image edit form
    Route::get('/site-favicon-image/{postID}', [AdminSiteSettingsController::class, 'imageFormForSiteFavicon'])->name('admin.site_favicon_image_form');
    // Site settings favicon image edit form processing
    Route::post('/site-favicon-image', [AdminSiteSettingsController::class, 'storeImageFormForSiteFavicon'])->name('admin.store_site_favicon_image_form');

    ##########################################
    ## Contact Us Page routes & controllers ##
    ##########################################
    // Contact Us page edit form
    Route::get('/site-settings#settings_section', [AdminSiteSettingsController::class, 'siteSettingsEditForm'])->name('admin.contactus');

/*Site settings (single row):
  Recaptcha keys: Private key, Public key
*/
});

require __DIR__.'/auth.php';
/*
NOTIFICATIONS:
set_log_notice(, )

    general_logs (multiple rows):
        id [auto increment], 
        deleted [boolean], 
        blocked [boolean], 
        reviewer_id (user_id) [big integer], 
        review_date [datetime], 
        table_name (if known) [string/varchar], 
        activity (taken action) [string/varchar], 
        named_table_id [varchar], 
        action_taken_by (user_id) [big integer], 
        date_created [datetime], 
        date_updated [datetime],

BLOG:
blog_category (multiple rows):
    id, active, category name, category slug, date created, date updated,

blog (multiple rows):
    id, blog_category_id, title_slug, title, body, created_on, updated_on, tags, excerpt1, excerpt2, likes, date created, date updated,

blog_excerpts
    id, blog_id, excerpt_position, excerpt, created_on, updated_on

blog_images
    id, blog_id, image_filename, created_on, updated_on

blog_comments (multiple rows):
    id, blog_id, comment, created_on, updated_on
*/
