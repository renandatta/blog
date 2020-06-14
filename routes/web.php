<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('storage/{folder}/{filename}', function ($folder,$filename){
    $path = storage_path('app/' . $folder . '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

//------------------------------ home area ---------------------------------------------------

Route::get('/', 'HomeController@index')->name('/');

//------------------------------ admin area ---------------------------------------------------

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@login_process')->name('login.process');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('media', 'MediaController@index')->name('media');
Route::post('media/search', 'MediaController@search')->name('media.search');
Route::get('media/info/{id}', 'MediaController@info')->name('media.info');
Route::post('media/save/{id}', 'MediaController@save')->name('media.save');
Route::delete('media/delete/{id}', 'MediaController@delete')->name('media.delete');

Route::get('module', 'ModuleController@index')->name('module');
Route::post('module/search', 'ModuleController@search')->name('module.search');
Route::get('module/info/{id}', 'ModuleController@info')->name('module.info');
Route::post('module/save/{id}', 'ModuleController@save')->name('module.save');
Route::delete('module/delete/{id}', 'ModuleController@delete')->name('module.delete');
Route::get('module/move/{code}/{direction}', 'ModuleController@move')->name('module.move');

Route::get('user_level', 'UserLevelController@index')->name('user_level');
Route::post('user_level/search', 'UserLevelController@search')->name('user_level.search');
Route::get('user_level/info/{id}', 'UserLevelController@info')->name('user_level.info');
Route::post('user_level/save/{id}', 'UserLevelController@save')->name('user_level.save');
Route::delete('user_level/delete/{id}', 'UserLevelController@delete')->name('user_level.delete');
Route::get('user_level/credential/{id}', 'UserLevelController@credential')->name('user_level.credential');
Route::post('user_level/credential/{id}/save', 'UserLevelController@credential_save')->name('user_level.credential.save');

Route::get('user', 'UserController@index')->name('user');
Route::post('user/search', 'UserController@search')->name('user.search');
Route::get('user/info/{id}', 'UserController@info')->name('user.info');
Route::post('user/save/{id}', 'UserController@save')->name('user.save');
Route::delete('user/delete/{id}', 'UserController@delete')->name('user.delete');

Route::get('post_category', 'PostCategoryController@index')->name('post_category');
Route::post('post_category/search', 'PostCategoryController@search')->name('post_category.search');
Route::get('post_category/info/{id}', 'PostCategoryController@info')->name('post_category.info');
Route::post('post_category/save/{id}', 'PostCategoryController@save')->name('post_category.save');
Route::delete('post_category/delete/{id}', 'PostCategoryController@delete')->name('post_category.delete');

Route::get('post', 'PostController@index')->name('post');
Route::post('post/search', 'PostController@search')->name('post.search');
Route::get('post/info/{id}', 'PostController@info')->name('post.info');
Route::post('post/save/{id}', 'PostController@save')->name('post.save');
Route::delete('post/delete/{id}', 'PostController@delete')->name('post.delete');

Route::get('service', 'ServiceController@index')->name('service');
Route::post('service/search', 'ServiceController@search')->name('service.search');
Route::get('service/info/{id}', 'ServiceController@info')->name('service.info');
Route::post('service/save/{id}', 'ServiceController@save')->name('service.save');
Route::delete('service/delete/{id}', 'ServiceController@delete')->name('service.delete');

Route::get('client', 'ClientController@index')->name('client');
Route::post('client/search', 'ClientController@search')->name('client.search');
Route::get('client/info/{id}', 'ClientController@info')->name('client.info');
Route::post('client/save/{id}', 'ClientController@save')->name('client.save');
Route::delete('client/delete/{id}', 'ClientController@delete')->name('client.delete');
Route::get('client/review/{id}', 'ClientController@review')->name('client.review');
Route::post('client/review/{id}/save', 'ClientController@review_save')->name('client.review.save');
Route::delete('client/review/{id}/delete', 'ClientController@review_delete')->name('client.review.delete');

Route::get('partner', 'PartnerController@index')->name('partner');
Route::post('partner/search', 'PartnerController@search')->name('partner.search');
Route::get('partner/info/{id}', 'PartnerController@info')->name('partner.info');
Route::post('partner/save/{id}', 'PartnerController@save')->name('partner.save');
Route::delete('partner/delete/{id}', 'PartnerController@delete')->name('partner.delete');

Route::get('slider', 'SliderController@index')->name('slider');
Route::post('slider/search', 'SliderController@search')->name('slider.search');
Route::get('slider/info/{id}', 'SliderController@info')->name('slider.info');
Route::post('slider/save/{id}', 'SliderController@save')->name('slider.save');
Route::delete('slider/delete/{id}', 'SliderController@delete')->name('slider.delete');

Route::get('content', 'ContentController@index')->name('content');
Route::post('content/search', 'ContentController@search')->name('content.search');
Route::get('content/info/{id}', 'ContentController@info')->name('content.info');
Route::post('content/save/{id}', 'ContentController@save')->name('content.save');
Route::delete('content/delete/{id}', 'ContentController@delete')->name('content.delete');

Route::get('featured_post', 'FeaturedPostController@index')->name('featured_post');
Route::post('featured_post/search', 'FeaturedPostController@search')->name('featured_post.search');
Route::get('featured_post/info/{id}', 'FeaturedPostController@info')->name('featured_post.info');
Route::post('featured_post/save/{id}', 'FeaturedPostController@save')->name('featured_post.save');
Route::delete('featured_post/delete/{id}', 'FeaturedPostController@delete')->name('featured_post.delete');
Route::post('featured_post/detail/save', 'FeaturedPostController@detail_save')->name('featured_post.detail.save');
Route::delete('featured_post/detail/delete', 'FeaturedPostController@detail_delete')->name('featured_post.detail.delete');

Route::get('setting', 'SettingController@index')->name('setting');
Route::post('setting/search', 'SettingController@search')->name('setting.search');
Route::get('setting/info/{id}', 'SettingController@info')->name('setting.info');
Route::post('setting/save/{id}', 'SettingController@save')->name('setting.save');
Route::delete('setting/delete/{id}', 'SettingController@delete')->name('setting.delete');
