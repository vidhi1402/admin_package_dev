<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

/*Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'Admin\DashboardController@index']);*/

Route::group(['prefix' => '/admin/'], function () {
    /*Start::Dashboard route*/
    Route::get('/dashboard', ['as' => 'admin.dashboard.index', 'uses' => 'Admin\DashboardController@Index']);
    /*End::Dashboard route*/

    /*Start::Contact-Us route*/
    Route::get('/contact-us', ['as' => 'admin.contact_us.index', 'uses' => 'Admin\ContactUsController@Index']);
    Route::post('/contact-us/message', ['as' => 'admin.contact_us.get_message', 'uses' => 'Admin\ContactUsController@GetMessageContact']);
    Route::get('/contact-us/{id}/delete', ['as' => 'admin.contact_us.delete', 'uses' => 'Admin\ContactUsController@Delete']);
    /*End::Contact-Us route*/

    /*Start::Service route*/
    Route::get('/service', ['as' => 'admin.service.index', 'uses' => 'Admin\ServiceController@Index']);
    Route::post('/service-insert', ['as' => 'admin.service.insert', 'uses' => 'Admin\ServiceController@Insert']);
    Route::get('/service/{id}/delete', ['as' => 'admin.service.delete', 'uses' => 'Admin\ServiceController@Delete']);
    Route::post('/service/update', ['as' => 'admin.service.update', 'uses' => 'Admin\ServiceController@Update']);
    Route::post('/service/update-status', ['as' => 'admin.service.change_status', 'uses' => 'Admin\ServiceController@UpdateStatus']);
    Route::get('/service/{id}/edit', ['as' => 'admin.service.edit', 'uses' => 'Admin\ServiceController@GetService']);
    Route::post('/service/get-sub-category', ['as' => 'admin.service_sub_category.get_sub_category', 'uses' => 'Admin\ServiceController@GetSubCategoryService']);
    Route::post('/service/image', ['as' => 'admin.service.get_image', 'uses' => 'Admin\ServiceController@GetServiceImage']);
    Route::post('/service/image-status-change', ['as' => 'admin.service.change_image_status', 'uses' => 'Admin\ServiceController@UpdateStatusServiceImage']);
    Route::post('/service/image-delete', ['as' => 'admin.service.delete_image', 'uses' => 'Admin\ServiceController@DeleteServiceImage']);
    /*End::Service route*/

    /*Start::Service-category route*/
    Route::get('/service-category', ['as' => 'admin.service_category.index', 'uses' => 'Admin\ServiceCategoryController@Index']);
    Route::post('/service-category-insert', ['as' => 'admin.service_category.insert', 'uses' => 'Admin\ServiceCategoryController@Insert']);
    Route::get('/service-category/{id}/edit', ['as' => 'admin.service_category.edit', 'uses' => 'Admin\ServiceCategoryController@GetServiceCategory']);
    Route::get('/service-category/{id}/delete', ['as' => 'admin.service_category.delete', 'uses' => 'Admin\ServiceCategoryController@Delete']);
    Route::post('/service-category/update', ['as' => 'admin.service_category.update', 'uses' => 'Admin\ServiceCategoryController@Update']);
    Route::post('/service-category/update-status', ['as' => 'admin.service_category.change_status', 'uses' => 'Admin\ServiceCategoryController@UpdateStatus']);
    /*End::Service-category route*/

    /*Start::service-sub-category route*/
    Route::get('/service-sub-category', ['as' => 'admin.service_sub_category.index', 'uses' => 'Admin\ServiceSubCategoryController@Index']);
    Route::post('/service-sub-category-insert', ['as' => 'admin.service_sub_category.insert', 'uses' => 'Admin\ServiceSubCategoryController@Insert']);
    Route::get('/service-sub-category/{id}/edit', ['as' => 'admin.service_sub_category.edit', 'uses' => 'Admin\ServiceSubCategoryController@GetServiceSubCategory']);
    Route::get('/service-sub-category/{id}/delete', ['as' => 'admin.service_sub_category.delete', 'uses' => 'Admin\ServiceSubCategoryController@Delete']);
    Route::post('/service-sub-category/update', ['as' => 'admin.service_sub_category.update', 'uses' => 'Admin\ServiceSubCategoryController@Update']);
    Route::post('/service-sub-category/update-status', ['as' => 'admin.service_sub_category.change_status', 'uses' => 'Admin\ServiceSubCategoryController@UpdateStatus']);
    /*End::service-sub-category route*/

    /*Start::Product route*/
    Route::get('/product', ['as' => 'admin.product.index', 'uses' => 'Admin\ProductController@Index']);
    Route::post('/product-insert', ['as' => 'admin.product.insert', 'uses' => 'Admin\ProductController@Insert']);
    Route::get('/product/{id}/delete', ['as' => 'admin.product.delete', 'uses' => 'Admin\ProductController@Delete']);
    Route::post('/product/update', ['as' => 'admin.product.update', 'uses' => 'Admin\ProductController@Update']);
    Route::post('/product/update-status', ['as' => 'admin.product.change_status', 'uses' => 'Admin\ProductController@UpdateStatus']);
    Route::get('/product/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'Admin\ProductController@GetProduct']);
    Route::post('/product/get-sub-category', ['as' => 'admin.product_sub_category.get_sub_category', 'uses' => 'Admin\ProductController@GetSubCategoryProduct']);
    Route::post('/product/image', ['as' => 'admin.product.get_image', 'uses' => 'Admin\ProductController@GetProductImage']);
    Route::post('/product/image-status-change', ['as' => 'admin.product.change_image_status', 'uses' => 'Admin\ProductController@UpdateStatusProductImage']);
    Route::post('/product/image-delete', ['as' => 'admin.product.delete_image', 'uses' => 'Admin\ProductController@DeleteProductImage']);
    /*End::Product route*/

    /*Start::Product-category route*/
    Route::get('/product-category', ['as' => 'admin.product_category.index', 'uses' => 'Admin\ProductCategoryController@Index']);
    Route::post('/product-category-insert', ['as' => 'admin.product_category.insert', 'uses' => 'Admin\ProductCategoryController@Insert']);
    Route::get('/product-category/{id}/edit', ['as' => 'admin.product_category.edit', 'uses' => 'Admin\ProductCategoryController@GetProductCategory']);
    Route::get('/product-category/{id}/delete', ['as' => 'admin.product_category.delete', 'uses' => 'Admin\ProductCategoryController@Delete']);
    Route::post('/product-category/update', ['as' => 'admin.product_category.update', 'uses' => 'Admin\ProductCategoryController@Update']);
    Route::post('/product-category/update-status', ['as' => 'admin.product_category.change_status', 'uses' => 'Admin\ProductCategoryController@UpdateStatus']);
    /*End::Product-category route*/

    /*Start::product-sub-category route*/
    Route::get('/product-sub-category', ['as' => 'admin.product_sub_category.index', 'uses' => 'Admin\ProductSubCategoryController@Index']);
    Route::post('/product-sub-category-insert', ['as' => 'admin.product_sub_category.insert', 'uses' => 'Admin\ProductSubCategoryController@Insert']);
    Route::get('/product-sub-category/{id}/edit', ['as' => 'admin.product_sub_category.edit', 'uses' => 'Admin\ProductSubCategoryController@GetProductSubCategory']);
    Route::get('/product-sub-category/{id}/delete', ['as' => 'admin.product_sub_category.delete', 'uses' => 'Admin\ProductSubCategoryController@Delete']);
    Route::post('/product-sub-category/update', ['as' => 'admin.product_sub_category.update', 'uses' => 'Admin\ProductSubCategoryController@Update']);
    Route::post('/product-sub-category/update-status', ['as' => 'admin.product_sub_category.change_status', 'uses' => 'Admin\ProductSubCategoryController@UpdateStatus']);
    /*End::product-sub-category route*/
});