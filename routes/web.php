<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manage_Doc_Controller;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::post('/dologin', [AuthController::class, 'dologin'])->name('dologin');
Route::get('/forget_password', [AuthController::class, 'forget_password']);
Route::post('/send_password', [AuthController::class, 'send_password']);
Route::post('/update_password', [AuthController::class, 'update_password']);

// Route::get('/google/login', [AuthController::class, 'provider'])->name('google.login');
// Route::get('/google/callback', [AuthController::class, 'callbackHandle'])->name('google.login.callback');

Route::get('/sms', [SMSController::class, 'index']);

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin', function () {
    return view('admin.admin_login');
})->name('admin');
Route::post('/adminlogin', [AuthController::class, 'admin_login']);

Route::get('/api', [ApiController::class, 'ApiDataInsert']);


Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/admin_logout', [AuthController::class, 'admin_logout']);



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/our-mission', 'our_mission');
    Route::get('/message', 'message');
    Route::get('/highlights', 'highlights');
    Route::get('/all-articles', 'all_articles');
    Route::get('/gallery', 'gallery');
    Route::get('/services-treatments', 'services_treatments');
    Route::get('/contact-us', 'contact_us');
    Route::get('/make-an-appointment', 'make_an_appointment');
    Route::get('/find-doctors',  'find_doctors');
    Route::get('/callback', 'callback');
    Route::get('/branch-directions', 'branch_directions');
    Route::get('/our-team', 'our_team');
    Route::get('/adviser', 'adviser');
    Route::get('/services',  'services');
    Route::get('/all-services',  'all_services');
    Route::get('/services_details/{services_id}', 'services_details');
    Route::get('/doctors', 'doctors');
    Route::get('/doctor_profile/{doctor_id}',  'doctor_profile');
    Route::get('/ask_doctor/{doctor_id}', 'ask_doctor');
    Route::post('/submit_question', 'submit_question');
    Route::get('/view_article/{article_id}', 'view_article');
    Route::get('/view_video/{video_id}', 'view_video');
    Route::get('/category/{category_id}', 'category');
    Route::get('/get_appointment/{doctor_id}', 'get_appointment');
    Route::get('/show_slots/{doctor_id}', 'show_slots');
    Route::post('/booked_appointment_withoutlogin', 'booked_appointment_withoutlogin');
    Route::get('/appointment_instructions/{booking_id}', 'appointment_instructions');
    Route::get('/appointment_mail/{booking_id}', 'appointment_mail');
    Route::get('/thankyou', 'thankyou');
    Route::get('/find_doctors_search', 'find_doctors_search');
    Route::get('/phone_email_search', 'phone_email_search');
    Route::get('/male_filter', 'male_filter');
    Route::get('/female_filter', 'female_filter');
    Route::post('/docontactus', 'docontactus');
    Route::post('/post_callback', 'post_callback');
    // add yasir site_map route call 
    Route::get('/site_map', 'Site_map');
});

Route::middleware(['auth.admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/home', 'admin_home');
        Route::get('/admin/add_doctor', 'admin_add_doctor');
        Route::post('/admin/doadd_doctor', 'admin_doadd_doctor');
        Route::get('/admin/view_doctor', 'admin_view_doctor');
        Route::get('/admin/add_staff', 'admin_add_staff');
        Route::post('/admin/doadd_staff', 'admin_doadd_staff');
        Route::get('/admin/view_staff', 'admin_view_staff');
        Route::get('/admin/add_service', 'admin_add_service');
        Route::post('/admin/doadd_service', 'admin_doadd_service');
        Route::get('/admin/view_service', 'admin_view_service');
        Route::get('/admin/assign_speciality/{doctor_id}', 'assign_speciality_todoctor');
        Route::post('/admin/doassign_speciality', 'doassign_speciality_todoctor');
        Route::get('/admin/assign_doctor_to_nurse/{user_id}', 'admin_assign_doctor_to_nurse');
        Route::post('/admin/doassign_doctor_to_nurse', 'admin_doassign_doctor_to_nurse');

        //   ---------------------------------------add-----------------------------------

        Route::get('/admin/patients-view-information/{id}', 'admin_view_patients_info');
        Route::get('/admin/add-health-record/{id}', 'admin_add_health_record');


        Route::get('/admin/laborder-search', 'laborder_search');

        Route::get('/admin/treatment-record', 'admin_treatment_record');
        Route::get('/admin/treatment-record-alldeleted', 'admin_treatment_deleted');
        Route::get('/admin/treatment-record-delelted', 'admin_treatment_single_deleted');
        Route::get('/admin/final-search', 'final_search');
        // Route::post('/admin/invoice_post', 'invoice_post')->name('invoice_post');
        Route::get('/admin/rate_amount', 'rate_amount');
        Route::get('/admin/total_amount', 'total_amount');
        Route::get('/admin/quantity', 'quantity');
        Route::get('/admin/amount_discount', 'amount_discount');

        Route::get('/admin/treatment', 'treatment');
        Route::get('/admin/add-treatment', 'add_treatment');
        Route::post('/admin/add-treatment-post', 'add_treatment_post');
        Route::get('/admin/edit-treatment/{id}', 'edit_treatment');
        Route::get('/admin/deleted-treatment/{id}', 'deleted_treatment');

        Route::get('/admin/procedure', 'procedure');
        Route::get('/admin/add-procedure', 'add_procedure');
        Route::post('/admin/add-procedure-post', 'add_procedure_post');
        Route::get('/admin/edit-procedure/{id}', 'edit_procedure');
        Route::get('/admin/deleted-procedure/{id}', 'deleted_procedure');

        Route::get('/admin/medication', 'medication');
        Route::get('/admin/add-medication', 'add_medication');
        Route::post('/admin/add-medication-post', 'add_medication_post');
        Route::get('/admin/edit-medication/{id}', 'edit_medication');
        Route::get('/admin/deleted-medication/{id}', 'deleted_medication');

        Route::get('/admin/radiology', 'radiology');
        Route::get('/admin/add-radiology', 'add_radiology');
        Route::post('/admin/add-radiology-post', 'add_radiology_post');
        Route::get('/admin/edit-radiology/{id}', 'edit_radiology');
        Route::get('/admin/deleted-radiology/{id}', 'deleted_radiology');

        // Investigation
        Route::get('/admin/invoice', 'invoice');
        Route::get('admin/search_patient', 'admin_search_patient')->name('admin.search.patient');
        Route::get('admin/patient_details', 'admin_patient_details')->name('admin.get.patient.details');
        Route::post('/admin/invoice_post', 'invoice_post')->name('invoice_post');

        Route::get('/admin/add-invoice', 'add_invoice');
        Route::post('/admin/add-invoice-post', 'add_invoice_post');
        Route::get('/admin/edit-invoice/{id}', 'edit_invoice');
        Route::get('/admin/deleted-invoice/{id}', 'deleted_invoice');

        Route::get('/admin/investigation', 'investigation');
        Route::get('/admin/add-investigation', 'add_investigation');
        Route::post('/admin/add-investigation-post', 'add_investigation_post');
        Route::get('/admin/edit-investigation/{id}', 'edit_investigation');
        Route::get('/admin/deleted-investigation/{id}', 'deleted_investigation');

        Route::get('/admin/lab-order', 'lab_order');
        Route::get('/admin/add-lab-order', 'add_lab_order');
        Route::post('/admin/add-lab-order-post', 'add_lab_order_post');
        Route::get('/admin/edit-lab-order/{id}', 'edit_lab_order');
        Route::get('/admin/deleted-lab-order/{id}', 'deleted_lab_order');

        Route::get('/admin/lab-sub-order', 'lab_sub_order');
        Route::get('/admin/add-sub-lab-order', 'add_lab_sub_order');
        Route::post('/admin/add-sub-lab-order-post', 'add_lab_sub_order_post');
        Route::get('/admin/edit-sub-lab-order/{id}', 'edit_lab_sub_order');
        Route::get('/admin/deleted-lab-sub-order/{id}', 'deleted_lab_sub_order');

        Route::get('/admin/item-list', 'item_list');
        Route::get('/admin/add-item', 'add_item');
        Route::post('/admin/add-item-post', 'add_list_post');
        Route::get('/admin/edit-item/{id}', 'edit_list');
        Route::get('/admin/deleted-item/{id}', 'deleted_list');

        Route::get('/admin/manufacturer-list', 'manufacturer_list');
        Route::get('/admin/add-manufacturer', 'add_manufacturer');
        Route::post('/admin/add-manufacturer-post', 'add_manufacturer_post');
        Route::get('/admin/edit-manufacturer/{id}', 'edit_manufacturer');
        Route::get('/admin/deleted-manufacturer/{id}', 'deleted_manufacturer');

        Route::get('/admin/suppliers-list', 'suppliers_list');
        Route::get('/admin/add-suppliers', 'add_suppliers');
        Route::post('/admin/add-suppliers-post', 'add_suppliers_post');
        Route::get('/admin/edit-suppliers/{id}', 'edit_suppliers');
        Route::get('/admin/deleted-suppliers/{id}', 'deleted_suppliers');

        Route::get('/admin/category-list', 'category_list');
        Route::get('/admin/add-category', 'add_category');
        Route::post('/admin/add-category-post', 'add_category_post');
        Route::get('/admin/edit-category/{id}', 'edit_category');
        Route::get('/admin/deleted-category/{id}', 'deleted_category');

        Route::get('/admin/stock-adjustment', 'stock_adjustment_list');
        Route::get('/admin/search-item-stock_adjustment', 'search_item_stock_adjustment');
        Route::get('/admin/search-item-date', 'search_item_date');

        Route::get('/admin/add-stock-adjustment', 'add_stock_adjustment');
        Route::post('/admin/add_stock_adjustment_post', 'add_stock_adjustment_post');
        Route::post('/admin/add-stock-adjustment-post', 'add_stock_adjustment_post');
        Route::get('/admin/edit-stock-adjustment/{id}', 'edit_stock_adjustment');
        Route::get('/admin/deleted-stock-adjustment/{id}', 'deleted_stock_adjustment');

        Route::get('/admin/manage-stock-list', 'manage_stock_list');
        Route::get('/admin/add-manage-stock', 'add_manage_stock');
        Route::get('/admin/edit-manage-stock/{id}', 'edit_manage_stock');
        Route::get('/admin/deleted-manage-stock/{id}', 'deleted_manage_stock');

        Route::get('/admin/asset-request-list', 'asset_request_list');
        Route::get('/admin/add-asset-request', 'add_asset_request');
        Route::post('/admin/add_asset_request_post', 'add_asset_request_post');
        Route::get('/admin/asset-request-list-search', 'asset_request_list_search');


        // Route::get('/admin/add_category', function () {
        //     return view('admin.admin_add_category');
        // });

        // Route::post('/admin/doadd_category','admin_doadd_category');
        // Route::get('/admin/view_category','admin_view_category');
        Route::get('/admin/edit_doctor/{doctor_id}', 'admin_edit_doctor');
        Route::get('/admin/add_visiting_card/{doctor_id}', 'admin_add_visiting_card');
        Route::post('/admin/doadd_visiting_card', 'admin_doadd_visiting_card');
        Route::get('/admin/view_visiting_card/{doctor_id}', 'admin_view_visiting_card');
        Route::get('/admin/add_social_links/{doctor_id}', 'admin_add_social_links');
        Route::post('/admin/doadd_social_links', 'admin_doadd_social_links');
        Route::get('/admin/view_social_links/{doctor_id}', 'admin_view_social_links');
        Route::get('/admin/set_timing/{doctor_id}', 'admin_set_timing');
        Route::post('/admin/add_set_timing', 'admin_add_set_timing');
        Route::get('/admin/ask_doctor/{doctor_id}', 'admin_ask_doctor');
        Route::post('/admin/submit_question', 'admin_submit_question');
        Route::get('/admin/view_all_question', 'admin_view_all_question');
        Route::get('/admin/reply_question/{question_id}', 'admin_reply_question');
        Route::post('/admin/answer_question/{question_id}', 'admin_answer_question');
        Route::get('/admin/add_language', function () {
            return view('admin.admin_add_language');
        });
        Route::post('/admin/do_add_language', 'admin_doadd_language');
        Route::get('/admin/view_languages', 'admin_view_languages');
        Route::get('/admin/view_all_users', 'view_all_users');
        Route::get('/admin/assign_roles/{user_id}', 'admin_assign_roles');
        Route::post('/admin/doassign_roles', 'admin_doassign_roles');
        Route::get('/admin/add_branch', 'admin_add_branch');
        Route::post('/admin/doadd_branch', 'admin_doadd_branch');
        Route::get('/admin/view_branches', 'admin_view_branches');
        Route::get('/admin/delete_branch/{branch_id}', 'admin_delete_branch');
        Route::get('/admin/edit_branch/{branch_id}/edit', 'admin_edit_branch')->name('branch.edit');
        Route::post('/admin/update_branch/{branch_id}', 'admin_update_branch')->name('branch.update');
        Route::get('/admin/add_session', 'admin_add_session');
        Route::post('/admin/doadd_session', 'admin_doadd_session');
        Route::get('/admin/view_sessions', 'admin_view_sessions');
        Route::get('/admin/delete_session/{session_id}', 'admin_delete_session');
        Route::get('/admin/view_appointment_queries', 'admin_view_appointment_queries');
        Route::get('/admin/reply_appointment_query/{doctor_id}/{booking_id}', 'admin_reply_appointment_query');
        Route::post('/admin/doreply_appointment_query/{booking_id}', 'admin_doreply_appointment_query');
        Route::get('/admin/add_rights', 'admin_add_rights');
        Route::post('/admin/doadd_rights', 'admin_doadd_rights');
        Route::get('/admin/view_rights', 'admin_view_rights');
        Route::get('/admin/delete_rights/{right_id}', 'admin_delete_rights');
        Route::get('/admin/assign_rights/{user_id}/{role_id}', 'admin_assign_rights');
        Route::post('/admin/doassign_rights', 'admin_doassign_rights');
        Route::get('/admin/set_doctor_schedule', 'admin_set_doctor_schedule');
        Route::get('/admin/add_schedule_slots', 'admin_add_schedule_slots');
        Route::post('/admin/doadd_schedule_slots', 'admin_doadd_schedule_slots');
        Route::get('/admin/select_doctor', 'admin_select_doctor');
        Route::get('/admin/view_schedule/{month}/{year}/{doctor_id}', 'admin_view_schedule');
        Route::get('/admin/view_slots/{schedule_id}/{month}/{year}/{doctor_id}', 'admin_view_slots');
        Route::get('/admin/book_appointment/{slot_id}/{doctor_id}', 'admin_book_appointment');
        Route::post('/admin/booked_appintment/', 'admin_booked_appintment');
        Route::get('/admin/change_schedule_date/{schedule_id}/{month}/{year}/{doctor_id}', 'admin_change_schedule_date');
        Route::post('/admin/transfer_appointment_to_another_date/{doctor_id}', 'admin_transfer_appointment_to_another_date');
        Route::get('/admin/check_date_availability', 'admin_check_date_availability');
        Route::get('/admin/enable_slot/{doctor_id}', 'admin_enable_slot');
        Route::get('/admin/disable_slot/{doctor_id}', 'admin_disable_slot');
        Route::get('/admin/patient_report', 'admin_patient_report');
        Route::get('/admin/view_patient_detail/{patient_id}', 'admin_view_patient_details');
        Route::get('/admin/appointment_report', 'admin_appointment_report');
        Route::get('/admin/doctor_appointment_search', 'admin_doctor_appointment_search');
        Route::get('/admin/doctor_procedure_search', 'admin_doctor_procedure_search');
        Route::get('/admin/doctor_appointment_procedure_search', 'admin_doctor_appointment_procedure_search');
    });


    // -----------------------------------add-----------------------------------
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/admin/add_articles', 'admin_add_articles');
        Route::post('/admin/doadd_articles', 'admin_doadd_articles');
        Route::get('/admin/view_articles', 'admin_view_articles');
        Route::get('/admin/view_full_article/{article_id}', 'admin_view_full_article');
        Route::get('/admin/edit_article/{article_id}', 'admin_edit_article');
        Route::post('/admin/update_article', 'admin_update_article');
        Route::get('/admin/delete_article/{article_id}', 'admin_delete_article');
    });

    Route::controller(VideoController::class)->group(function () {
        Route::get('/admin/add_videos', 'admin_add_videos');
        Route::post('/admin/doadd_videos', 'admin_doadd_videos');
        Route::get('/admin/view_videos', 'admin_view_videos');
        Route::get('/admin/edit_video/{video_id}', 'admin_edit_video');
        Route::post('/admin/update_video', 'admin_update_video');
        Route::get('/admin/delete_video/{video_id}', 'admin_delete_video');
    });
});

Route::middleware(['auth.doctor'])->group(function () {
    Route::get('/doctor/home', [DoctorController::class, 'doctor_home']);
    Route::get('/doctor/set_doctor_schedule', [DoctorController::class, 'set_doctor_schedule']);
    Route::post('/doctor/add_schedule_slots', [DoctorController::class, 'add_schedule_slots']);
    Route::get('/doctor/view_schedule/{month}/{year}/{doctor_id}', [DoctorController::class, 'view_schedule']);
    Route::get('/doctor/view_slots/{schedule_id}/{month}/{year}/{doctor_id}', [DoctorController::class, 'doctor_view_slots']);

    // Route::get('/doctor/add_videos/{doctor_id}', [VideoController::class, 'doctor_add_videos']);
    // Route::post('/doctor/doadd_videos', [VideoController::class, 'doctor_doadd_videos']);
    // Route::get('/doctor/view_videos/{doctor_id}', [VideoController::class, 'doctor_view_videos']);
    // Route::get('/doctor/edit_video/{video_id}', [VideoController::class, 'doctor_edit_video']);
    // Route::post('/doctor/update_video', [VideoController::class, 'doctor_update_video']);
    // Route::get('/doctor/delete_video/{video_id}', [VideoController::class, 'doctor_delete_video']);

    // Route::get('/doctor/add_articles/{doctor_id}', [ArticleController::class, 'doctor_add_articles']);
    // Route::post('/doctor/doadd_articles', [ArticleController::class, 'doctor_doadd_articles']);
    // Route::get('/doctor/view_articles/{doctor_id}', [ArticleController::class, 'doctor_view_articles']);
    // Route::get('/doctor/view_full_article/{article_id}', [ArticleController::class, 'doctor_view_full_article']);
    // Route::get('/doctor/edit_article/{article_id}', [ArticleController::class, 'doctor_edit_article']);
    // Route::post('/doctor/update_article', [ArticleController::class, 'doctor_update_article']);
    // Route::get('/doctor/delete_article/{article_id}', [ArticleController::class, 'doctor_delete_article']);

    Route::get('/doctor/view_appointment_queries', [DoctorController::class, 'doctor_view_appointment_queries']);
    Route::get('/doctor/reply_appointment_query/{booking_id}', [DoctorController::class, 'doctor_reply_appointment_query']);
    Route::post('/doctor/doreply_appointment_query/{booking_id}', [DoctorController::class, 'doctor_doreply_appointment_query']);
    Route::get('/doctor/view_profile/{doctor_id}', [DoctorController::class, 'doctor_view_profile']);
    Route::get('/doctor/visiting_card/{doctor_id}', [DoctorController::class, 'doctor_visiting_card']);
    Route::post('/doctor/doadd_visiting_card', [DoctorController::class, 'doctor_doadd_visiting_card']);
    Route::get('/doctor/view_visiting_card/{doctor_id}', [DoctorController::class, 'doctor_view_visiting_card']);
    Route::get('/doctor/view_questions/{doctor_id}', [DoctorController::class, 'doctor_view_questions']);
    Route::get('/doctor/reply_question/{question_id}', [DoctorController::class, 'doctor_reply_question']);
    Route::post('/doctor/doreply_question/{question_id}', [DoctorController::class, 'doctor_doreply_question']);
    // Route::get('/doctor/send_reply_mail/{question_id}', [DoctorController::class, 'doctor_send_reply_mail']);
    Route::get('/doctor/view_booked_appointment', [DoctorController::class, 'doctor_view_booked_appointment']);
    Route::get('/doctor/view_current_month_booking/{start_date}/{end_date}', [DoctorController::class, 'doctor_view_current_month_booking']);
    Route::get('/doctor/view_current_week_booking/{start_date}/{end_date}', [DoctorController::class, 'doctor_view_current_week_booking']);
    Route::get('/doctor/view_current_day_booking/{date}', [DoctorController::class, 'doctor_view_current_day_booking']);
    Route::get('/doctor/book_appointment/{slot_id}', [DoctorController::class, 'doctor_book_appointment']);
    Route::post('/doctor/booked_appintment', [DoctorController::class, 'doctor_booked_appintment']);
    Route::get('/doctor/view_change_appointment_request', [DoctorController::class, 'doctor_view_change_appointment_request']);
    Route::get('/doctor/change_appointment_details/{change_request_id}', [DoctorController::class, 'doctor_change_appointment_details']);
    Route::get('/doctor/change_appointment_date/{booking_id}', [DoctorController::class, 'doctor_change_appointment_date']);
    Route::get('/doctor_avaliable_dates/{doctor_id}', [DoctorController::class, 'doctor_avaliable_dates']);
    Route::post('/doctor/change_date/{booking_id}', [DoctorController::class, 'doctor_change_date']);
    Route::get('/doctor/change_appointment_mail/{booking_id}', [DoctorController::class, 'change_appointment_mail']);
    Route::get('/doctor/view_appointment_cancellation_request', [DoctorController::class, 'view_appointment_cancellation_request']);
    Route::post('/doctor/appointment_cancellation/{booking_id}', [DoctorController::class, 'doctor_appointment_cancellation_mail']);
    Route::get('/doctor/add_social_links/{doctor_id}', [DoctorController::class, 'doctor_add_social_links']);
    Route::post('/doctor/doadd_social_links', [DoctorController::class, 'doctor_doadd_social_links']);
    Route::get('/doctor/view_social_links/{doctor_id}', [DoctorController::class, 'doctor_view_social_links']);
    Route::get('/doctor/set_timing/{doctor_id}', [DoctorController::class, 'doctor_set_timing']);
    Route::post('/doctor/add_set_timing', [DoctorController::class, 'doctor_add_set_timing']);
    Route::get('/doctor/edit_profile/{doctor_id}', [DoctorController::class, 'doctor_edit_profile']);
    Route::post('/doctor/doedit_profile/{doctor_id}', [DoctorController::class, 'doctor_doedit_profile']);
    Route::get('/doctor/enable_slot/{doctor_id}', [DoctorController::class, 'doctor_enable_slot']);
    Route::get('/doctor/disable_slot/{doctor_id}', [DoctorController::class, 'doctor_disable_slot']);

    Route::controller(DiscussionController::class)->group(function () {
        Route::get('/doctor/view_chats', 'doctor_view_chats');
        Route::get('/doctor/start_chat/{patient_id}', 'doctor_start_chat');
        Route::get('/doctor/chat_with_patient/{chat_id}', 'doctor_chat_with_patient');
        Route::get('/doctor_send_message', 'doctor_send_message');
        Route::get('doctor_msg_loader/{chat_id}', 'doctor_msg_loader');
    });
});

Route::get('/unavaliable_dates', [PatientController::class, 'unavaliable_dates']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PatientController::class, 'home']);
    Route::get('/change_password/{id}', [PatientController::class, 'change_password']);
    Route::post('/update_password_login', [PatientController::class, 'update_password_login']);
    Route::get('/edit_profile/{patient_id}', [PatientController::class, 'patient_edit_profile']);
    Route::post('/doedit_profile', [PatientController::class, 'doedit_profile']);
    Route::get('/find_doctor_appointment', [PatientController::class, 'find_doctor_appointment']);
    Route::get('/book_appointment/{day}/{doctor_id}/{date}', [PatientController::class, 'book_appointment']);
    Route::post('/booked_appointment', [PatientController::class, 'booked_appointment']);
    Route::get('/appointment-instructions/{booking_id}', [PatientController::class,  'appointment_instructions_login']);
    Route::get('/appointment-mail/{booking_id}', [PatientController::class, 'appointment_mail_login']);
    Route::get('/view_booked_appointment/{patient_id}', [PatientController::class, 'view_booked_appointment']);
    Route::get('/doctorfilter', [PatientController::class, 'doctorfilter']);
    Route::get('/doctorsearch', [PatientController::class, 'doctorsearch']);
    Route::get('/patient_ask_doctor/{doctor_id}', [PatientController::class, 'patient_ask_doctor']);
    Route::post('/patient_submit_question', [PatientController::class, 'patient_submit_question']);
    Route::get('/appointment_details/{booking_id}', [PatientController::class, 'appointment_details']);
    Route::get('/appointment_cancellation_request/{booking_id}', [PatientController::class, 'appointment_cancellation_request']);
    Route::post('/submit_cancellation_request', [PatientController::class, 'submit_cancellation_request']);
    Route::get('/change_appointment_request/{booking_id}', [PatientController::class, 'change_appointment_request']);
    Route::post('/submit_change_request', [PatientController::class, 'submit_change_request']);
    Route::post('/submit_chat', [PatientController::class, 'submit_chat']);
    Route::controller(DiscussionController::class)->group(function () {
        Route::get('/create_chat_with_doctor/{doctor_id}', 'create_chat_with_doctor');
        Route::get('/chat_with_doctor/{chat_id}', 'chat_with_doctor');
        Route::get('/send_message', 'send_message');
        Route::get('msg_loader/{chat_id}', 'msg_loader');
    });
});

Route::group(['middleware' => 'auth.nurse', 'prefix' => 'nurse'], function () {
    Route::get('/home', [NurseController::class, 'nurse_home']);
    Route::get('/manage_doctor/{doctor_id}', [NurseController::class, 'nurse_manage_doctor']);
    Route::get('/set_doctor_schedule/{doctor_id}', [NurseController::class, 'nurse_set_doctor_schedule']);
    Route::get('/add_schedule_slots', [NurseController::class, 'nurse_add_schedule_slots']);
    Route::post('/doadd_schedule_slots', [NurseController::class, 'nurse_doadd_schedule_slots']);
    Route::get('/view_schedule/{month}/{year}/{doctor_id}', [NurseController::class, 'nurse_view_schedule']);
    Route::get('/view_slots/{schedule_id}/{month}/{year}/{doctor_id}', [NurseController::class, 'nurse_view_slots']);
    Route::get('/view_booked_appointment/{doctor_id}', [NurseController::class, 'nurse_view_booked_appointment']);
    Route::get('/book_appointment/{slot_id}', [NurseController::class, 'nurse_book_appointment']);
    Route::post('/booked_appintment', [NurseController::class, 'nurse_booked_appintment']);

    Route::get('/view_current_month_booking/{start_date}/{end_date}/{doctor_id}', [NurseController::class, 'nurse_view_current_month_booking']);
    Route::get('/view_current_week_booking/{start_date}/{end_date}/{doctor_id}', [NurseController::class, 'nurse_view_current_week_booking']);
    Route::get('/view_current_day_booking/{date}/{doctor_id}', [NurseController::class, 'nurse_view_current_day_booking']);
    Route::get('/view_change_appointment_request/{doctor_id}', [NurseController::class, 'nurse_view_change_appointment_request']);
    Route::get('/change_appointment_details/{change_request_id}', [NurseController::class, 'nurse_change_appointment_details']);
    Route::get('/change_appointment_date/{booking_id}/{doctor_id}', [NurseController::class, 'nurse_change_appointment_date']);
    Route::get('/nurse_avaliable_dates/{doctor_id}', [NurseController::class, 'nurse_avaliable_dates']);
    Route::post('/change_date/{booking_id}', [NurseController::class, 'nurse_change_date']);
    Route::get('/change_appointment_mail/{booking_id}', [NurseController::class, 'nurse_change_appointment_mail']);
    Route::get('/view_appointment_cancellation_request/{doctor_id}', [NurseController::class, 'nurse_view_appointment_cancellation_request']);
    Route::post('/appointment_cancellation/{booking_id}', [NurseController::class, 'nurse_appointment_cancellation_mail']);
    Route::get('/view_questions/{doctor_id}', [NurseController::class, 'nurse_view_questions']);
    Route::get('/reply_question/{question_id}', [NurseController::class, 'nurse_reply_question']);
    Route::post('/doreply_question/{question_id}', [NurseController::class, 'nurse_doreply_question']);
    Route::get('/view_appointment_queries/{doctor_id}', [NurseController::class, 'nurse_view_appointment_queries']);
    Route::get('/reply_appointment_query/{doctor_id}/{booking_id}', [NurseController::class, 'nurse_reply_appointment_query']);
    Route::post('/doreply_appointment_query/{doctor_id}/{booking_id}', [NurseController::class, 'nurse_doreply_appointment_query']);

    Route::controller(DiscussionController::class)->group(function () {
        Route::get('/doctor/view_chats', 'doctor_view_chats');
        Route::get('/doctor/start_chat/{patient_id}', 'doctor_start_chat');
        Route::get('/doctor/chat_with_patient/{chat_id}', 'doctor_chat_with_patient');
        Route::get('/doctor_send_message', 'doctor_send_message');
        Route::get('doctor_msg_loader/{chat_id}', 'doctor_msg_loader');
    });
});

Route::get('/cache', function () {
    Artisan::call('cache:clear');
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
});

// Auth::routes();
