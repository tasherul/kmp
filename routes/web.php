<?php

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

Route::get('/admin/forgot-password', 'AdminAuth\AuthController@forgotPassword')->name('forgotPassword');

Route::post('reset_password_without_token', 'AdminAuth\AccountsController@validatePasswordRequest')->name('validatePasswordRequest');

Route::get('/admin/auth/password/reset_password/{token}', 'AdminAuth\AccountsController@updatePassword')->name('updatePassword');


Route::post('reset_password_with_token', 'AdminAuth\AccountsController@resetPassword')->name('resetPassword');




// Admin login

Route::get('/admin/login', 'AdminAuth\AuthController@adminLogin')->name('adminLogin');
Route::post('/admin/post-login', 'AdminAuth\AuthController@adminPostLogin')->name('adminPostLogin');

Route::post('/admin/logout', 'AdminAuth\AuthController@adminLogout')->name('adminLogout');


Route::group( [ 'prefix' => 'admin','namespace' => 'admin', 'middleware'=>'AdminAuth' ], function()
{
    //Dashboard
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/author', 'DashboardController@author')->name('author');
    Route::post('/author-update', 'DashboardController@authorUpdate')->name('authorUpdate');
    Route::post('/change-password', 'DashboardController@changePassword')->name('changePassword');

    //Homepage
    Route::get('/homepage', 'HomePageController@homepage')->name('homepage');
    Route::post('/homepage-save', 'HomePageController@homepageUpdate')->name('homepageUpdate');
    //Route::get('/edit/{id}', 'HomePageController@homepage')->name('homepageEdit');
    //Route::get('/delete/{id}', 'HomePageController@homepageDelete')->name('homepageDelete');


    //Slider
    Route::get('/slider', 'SliderController@slider')->name('slider');
    Route::post('/slider-save', 'SliderController@sliderInsertUpdate')->name('sliderInsertUpdate');
    Route::get('/slider/edit/{id}', 'SliderController@slider')->name('sliderEdit');
    Route::get('/slider/delete/{id}', 'SliderController@sliderDelete')->name('sliderDelete');

    //News
    Route::get('/news', 'NewsController@news')->name('newsadmin');
    Route::post('/news-save', 'NewsController@newsInsertUpdate')->name('newsInsertUpdate');
    Route::get('/news/edit/{id}', 'NewsController@news')->name('newsEdit');
    Route::get('/news/delete/{id}', 'NewsController@newsDelete')->name('newsDelete');

    //Notice
    Route::get('/notice', 'NoticeController@notice')->name('noticeadmin');
    Route::post('/notice-save', 'NoticeController@noticeInsertUpdate')->name('noticeInsertUpdate');
    Route::get('/notice/edit/{id}', 'NoticeController@notice')->name('noticeEdit');
    Route::get('/notice/delete/{id}', 'NoticeController@noticeDelete')->name('noticeDelete');
   

    //Photo Gallery
    Route::get('/photo', 'PhotoController@photo')->name('photo');
    Route::post('/photo-save', 'PhotoController@photoInsertUpdate')->name('photoInsertUpdate');
    Route::get('/photo/edit/{id}', 'PhotoController@photo')->name('photoEdit');
    Route::get('/photo/delete/{id}', 'PhotoController@photoDelete')->name('photoDelete');
   
    
    //Video
    Route::get('/video', 'VideoController@video')->name('video');
    Route::post('/video-save', 'VideoController@videoInsertUpdate')->name('videoInsertUpdate');
    Route::get('/video/edit/{id}', 'VideoController@video')->name('videoEdit');
    Route::get('/video/delete/{id}', 'VideoController@videoDelete')->name('videoDelete');
   

    //Wanted Missing
    Route::get('/wanted-missing', 'WantedMissingController@wantedmissing')->name('wantedmissing');
    Route::post('/wanted-missing-save', 'WantedMissingController@wantedMissingInsertUpdate')->name('wantedMissingInsertUpdate');
    Route::get('/wanted-missing/edit/{id}', 'WantedMissingController@wantedmissing')->name('wantedMissingEdit');
    Route::get('/wanted-missing/delete/{id}', 'WantedMissingController@wantedMissingDelete')->name('wantedMissingDelete');

    
    //Staff
    Route::get('/staff', 'StaffController@staff')->name('staff');
    Route::post('/Staff-save', 'StaffController@staffInsertUpdate')->name('staffInsertUpdate');
    Route::get('/Staff/edit/{id}', 'StaffController@staff')->name('staffEdit');
    Route::get('/Staff/delete/{id}', 'StaffController@staffDelete')->name('staffDelete');
 
    //Range Unit
    Route::get('/range-unit', 'RangeUnitController@rangeUnit')->name('rangeUnit');
    Route::post('/range-unit-save', 'RangeUnitController@rangeUnitInsertUpdate')->name('rangeUnitInsertUpdate');
    Route::get('/range-unit/edit/{id}', 'RangeUnitController@rangeUnit')->name('rangeUnitEdit');
    Route::get('/range-unit/delete/{id}', 'RangeUnitController@rangeUnitDelete')->name('rangeUnitDelete');
        
    //Settings
    Route::get('/settings', 'SettingsController@settings1')->name('settings1');
    Route::post('/settings-save', 'SettingsController@settings1InsertUpdate')->name('settings1InsertUpdate');
    Route::get('/settings/edit/{id}', 'SettingsController@settings1')->name('settings1Edit');
    Route::get('/settings/delete/{id}', 'SettingsController@settingsDelete')->name('settings1Delete');

    Route::get('/settings2', 'SettingsController@settings2')->name('settings2');
    Route::post('/settings2-save', 'SettingsController@settings2InsertUpdate')->name('settings2InsertUpdate');
    Route::get('/settings2/edit/{id}', 'SettingsController@settings2')->name('settings2Edit');
    Route::get('/settings2/delete/{id}', 'SettingsController@settingsDelete')->name('settings2Delete');


    //Services
    Route::get('/service1', 'ServiceController@service1')->name('service1');
    Route::post('/service1-save', 'ServiceController@serviceInsertUpdate1')->name('serviceInsertUpdate1');
    Route::get('/service1/edit/{id}', 'ServiceController@service1')->name('service1Edit');
    Route::get('/service1/delete/{id}', 'ServiceController@serviceDelete')->name('service1Delete');
 
    Route::get('/service2', 'ServiceController@service2')->name('service2');
    Route::post('/service2-save', 'ServiceController@serviceInsertUpdate2')->name('serviceInsertUpdate2');
    Route::get('/service2/edit/{id}', 'ServiceController@service2')->name('service2Edit');
    Route::get('/service2/delete/{id}', 'ServiceController@serviceDelete')->name('service2Delete');
 

    //Remember
    Route::get('/remember', 'RememberController@remember')->name('remember');
    Route::post('/remember-save', 'RememberController@rememberInsertUpdate')->name('rememberInsertUpdate');
    Route::get('/remember/edit/{id}', 'RememberController@remember')->name('rememberEdit');
    Route::get('/remember/delete/{id}', 'RememberController@rememberDelete')->name('rememberDelete');

    //Crime Management
    Route::get('/crime-management', 'CrimeManagementController@crimeManagement')->name('crimeManagementadmin');
    Route::post('/crime-management-save', 'CrimeManagementController@crimeManagementInsertUpdate')->name('crimeManagementInsertUpdate');
    Route::get('/crime-management/edit/{id}', 'CrimeManagementController@crimeManagement')->name('crimeManagementEdit');
    Route::get('/crime-management/delete/{id}', 'CrimeManagementController@crimeManagementDelete')->name('crimeManagementDelete');


    //Contact
  Route::get('/contact', 'ContactController@contact')->name('contact');
    Route::get('/contact_us', 'ContactController@contact_us')->name('contact_us');
    Route::post('/contact-save', 'ContactController@contactInsertUpdate')->name('contactInsertUpdate');
    Route::get('/contact/edit/{id}', 'ContactController@contact')->name('contactEdit');
    //Route::get('/contact/delete/{id}', 'ContactController@delete')->name('contactDelete');
    Route::post('/contract_us_mobile', 'ContactController@contract_us_mobile')->name('contract_us_mobile');
    Route::get('/Number_delete/{id}', 'ContactController@Number_delete')->name('Number_delete');
    Route::get('/Number_Edit/{id}', 'ContactController@Number_Edit')->name('Number_Edit');
    Route::post('/contract_us_Update', 'ContactController@contract_us_Update')->name('contract_us_Update');


    //Carrer
    Route::get('/carrer', 'CarrerController@carrer')->name('carreradmin');
    Route::post('/carrer-save', 'CarrerController@carrerInsertUpdate')->name('carrerInsertUpdate');
    Route::get('/carrer/edit/{id}', 'CarrerController@carrer')->name('carrerEdit');
    Route::get('/carrer/delete/{id}', 'CarrerController@carrerDelete')->name('carrerDelete');

    //Ranks-acknowledge
    Route::get('/ranks-acknowledge', 'RanksAcknowledgeController@ranksAcknowledge')->name('ranksAcknowledge');
    Route::post('/ranks-acknowledge-save', 'RanksAcknowledgeController@ranksAcknowledgeInsertUpdate')->name('ranksAcknowledgeInsertUpdate');
    Route::get('/ranks-acknowledge/edit/{id}', 'RanksAcknowledgeController@ranksAcknowledge')->name('ranks_acknowledgeEdit');
    Route::get('/ranks-acknowledge/delete/{id}', 'RanksAcknowledgeController@ranksAcknowledgeDelete')->name('ranks_acknowledgesDelete');
   
    //noc
    Route::get('/admin_noc', 'RanksAcknowledgeController@admin_noc')->name('admin_noc');
     Route::get('/Noc_Delete/{id}', 'RanksAcknowledgeController@noc_delete')->name('Noc_Delete');
    Route::post('/nocinsert', 'RanksAcknowledgeController@nocinsert')->name('nocinsert');

    // kmp units

    Route::get('/Admin_Kmp_Units', 'RanksAcknowledgeController@Admin_Kmp_Units')->name('Admin_Kmp_Units');
    Route::post('/kmp_units_insert', 'RanksAcknowledgeController@kmp_units_insert')->name('kmp_units_insert');
    Route::get('/kmp_unit_delete/{id}', 'RanksAcknowledgeController@kmp_unit_delete');
    Route::get('/link_delete/{id}', 'RanksAcknowledgeController@link_delete');
    Route::get('/link_edit/{id}', 'RanksAcknowledgeController@link_edit')->name('link_edit');
    Route::post('/link_Update', 'RanksAcknowledgeController@link_Update')->name('link_Update');
    Route::get('important-link', 'RanksAcknowledgeController@important_link')->name('important_link');
    Route::POST('/link_insret', 'RanksAcknowledgeController@link_insret')->name('link_insret');
    
    Route::get('/right_side_menu', 'RanksAcknowledgeController@right_side_menu')->name('right_side_menu');

    Route::post('/menu_right_insert', 'RanksAcknowledgeController@menu_right_insert')->name('menu_right_insert');
    Route::get('/right_menu_edit/{id}', 'RanksAcknowledgeController@right_menu_edit')->name('right_menu_edit');
    Route::post('/menu_right_update}', 'RanksAcknowledgeController@menu_right_update')->name('menu_right_update');
    Route::get('/right_menu_delete/{id}', 'RanksAcknowledgeController@right_menu_delete')->name('right_menu_delete');

    Route::get('/admin_right_to_information', 'RanksAcknowledgeController@admin_right_to_information')->name('admin_right_to_information');
    Route::post('/right_to_information_insert', 'RanksAcknowledgeController@right_to_information_insert')->name('right_to_information_insert');
    Route::get('/right_information_edit/{id}', 'RanksAcknowledgeController@right_information_edit')->name('right_information_edit');
    Route::get('/right_information_delete/{id}', 'RanksAcknowledgeController@right_information_delete')->name('right_information_delete');
    Route::post('/right_to_information_update', 'RanksAcknowledgeController@right_to_information_update')->name('right_to_information_update');


    Route::get('/right_information_add_staff/{id}', 'RanksAcknowledgeController@right_information_add_staff')->name('right_information_add_staff');
    Route::post('/staff_information_insert', 'RanksAcknowledgeController@staff_information_insert')->name('staff_information_insert');
    Route::get('/right_information_View_staff/{id}', 'RanksAcknowledgeController@right_information_View_staff')->name('right_information_View_staff');
    Route::get('/right_staff_edit/{id}', 'RanksAcknowledgeController@right_staff_edit')->name('right_staff_edit');
    Route::post('/staff_information_edit_process', 'RanksAcknowledgeController@staff_information_edit_process')->name('staff_information_edit_process');
    Route::get('/right_staff_delete/{id}', 'RanksAcknowledgeController@right_staff_delete')->name('right_staff_delete');
});

Route::group( ['namespace' => 'front' ], function()
{

Route::get('/', 'HomepageController@index')->name('index');
Route::get('/home', 'HomepageController@home')->name('home');
Route::get('/noc', 'HomepageController@noc')->name('noc');
Route::get('/find_ajax_id/{id}', 'HomepageController@find_ajax_id')->name('find_ajax_id');
Route::get('/find_right_id/{id}', 'HomepageController@find_right_id')->name('find_right_id');



Route::get('/emergency-contact', 'HomepageController@emergencyContact')->name('emergencyContact');
Route::get('/police-station', 'HomepageController@policeStation')->name('policeStation');

Route::get('/biography', 'HomepageController@biography')->name('biography');
Route::get('/mesaage-comissoner', 'HomepageController@mesaageComissoner')->name('mesaageComissoner');

Route::get('/staff-list', 'AboutUsController@staff')->name('staffList');
Route::get('/range-units/{thana}', 'AboutUsController@rangeUnits')->name('rangeUnits');
Route::get('/ornogram', 'AboutUsController@ornogram')->name('ornogram');
Route::get('/ranks', 'AboutUsController@ranks')->name('ranks');
Route::get('/acknowledgement', 'AboutUsController@acknowledgement')->name('acknowledgement');
Route::get('/citizen-charter', 'AboutUsController@citizenCharter')->name('citizenCharter');
Route::get('/apa', 'AboutUsController@apa')->name('apa');

Route::get('/history', 'HistoryController@history')->name('history');

Route::get('/comunity-policing', 'ServiceController@comunityPolicing')->name('comunityPolicing');
Route::get('/police-activities', 'ServiceController@policeActivities')->name('policeActivities');
Route::get('/money-escort', 'ServiceController@moneyEscort')->name('moneyEscort');
Route::get('/beat-polising', 'ServiceController@beat_polising')->name('beat_polising');
Route::get('/kmp-units', 'ServiceController@kmp_units')->name('kmp_units');
Route::get('/police-verification', 'ServiceController@policeVerification')->name('policeVerification');
Route::get('/protection', 'ServiceController@protection')->name('protection');
Route::get('/victim-support', 'ServiceController@victimSupport')->name('victimSupport');
Route::get('/traffic', 'ServiceController@traffic')->name('traffic');
Route::get('/info-desk', 'ServiceController@infoDesk')->name('infoDesk');

Route::get('/crime-management', 'CrimeManagementController@crimeManagement')->name('crimeManagement');

Route::get('/news', 'NewsController@news')->name('news');
Route::get('/news-single/{id}', 'NewsController@newsSingle')->name('newsSingle');

Route::get('/photo-gallery', 'GalleryController@photoGallery')->name('photoGallery');
Route::get('/video-gallery', 'GalleryController@videoGallery')->name('videoGallery');

Route::get('/contact-us', 'ContactUsController@contactUs')->name('contactUs');
Route::post('/contact-form', 'ContactUsController@contactform')->name('contactform');

Route::get('/list-pc', 'OtherController@listPc')->name('listPc');
Route::get('/document', 'OtherController@document')->name('document');
Route::get('/carrer', 'OtherController@carrer')->name('carrer');
Route::get('/notice', 'OtherController@notice')->name('notice');
Route::get('/we-remember', 'OtherController@weRemember')->name('weRemember');
Route::get('/wanted', 'OtherController@wanted')->name('wanted');
Route::get('/missing', 'OtherController@missing')->name('missing');

Route::get('/right_to_information', 'OtherController@right_to_information')->name('right_to_information');
Route::get('/right_information_View/{id}', 'OtherController@right_information_View')->name('right_information_View');


Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

});