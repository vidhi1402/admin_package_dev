<?php

Route::get('/test', function(){
    echo 'Hello from the  package!';
});

Route::group(['prefix' => '/admin/' ,'middleware' => 'web'], function () {
    /*Start::Dashboard route*/
    Route::get('/dashboard', ['as' => 'admin.dashboard.index', 'uses' => 'Aii\Admin\DashboardController@Index']);
    /*End::Dashboard route*/

    /*Start::Contact-Us route*/
    Route::get('/contact-us', ['as' => 'admin.contact_us.index', 'uses' => 'Aii\Admin\ContactUsController@Index']);
    Route::post('/contact-us/message', ['as' => 'admin.contact_us.get_message', 'uses' => 'Aii\Admin\ContactUsController@GetMessageContact']);
    Route::get('/contact-us/{id}/delete', ['as' => 'admin.contact_us.delete', 'uses' => 'Aii\Admin\ContactUsController@Delete']);
    /*End::Contact-Us route*/

    /*Start::Service route*/
    Route::get('/service', ['as' => 'admin.service.index', 'uses' => 'Aii\Admin\ServiceController@Index']);
    Route::post('/service-insert', ['as' => 'admin.service.insert', 'uses' => 'Aii\Admin\ServiceController@Insert']);
    Route::get('/service/{id}/delete', ['as' => 'admin.service.delete', 'uses' => 'Aii\Admin\ServiceController@Delete']);
    Route::post('/service/update', ['as' => 'admin.service.update', 'uses' => 'Aii\Admin\ServiceController@Update']);
    Route::post('/service/update-status', ['as' => 'admin.service.change_status', 'uses' => 'Aii\Admin\ServiceController@UpdateStatus']);
    Route::get('/service/{id}/edit', ['as' => 'admin.service.edit', 'uses' => 'Aii\Admin\ServiceController@GetService']);
    Route::post('/service/get-sub-category', ['as' => 'admin.service_sub_category.get_sub_category', 'uses' => 'Aii\Admin\ServiceController@GetSubCategoryService']);
    Route::post('/service/image', ['as' => 'admin.service.get_image', 'uses' => 'Aii\Admin\ServiceController@GetServiceImage']);
    Route::post('/service/image-status-change', ['as' => 'admin.service.change_image_status', 'uses' => 'Aii\Admin\ServiceController@UpdateStatusServiceImage']);
    Route::post('/service/image-delete', ['as' => 'admin.service.delete_image', 'uses' => 'Aii\Admin\ServiceController@DeleteServiceImage']);
    /*End::Service route*/

    /*Start::Service-category route*/
    Route::get('/service-category', ['as' => 'admin.service_category.index', 'uses' => 'Aii\Admin\ServiceCategoryController@Index']);
    Route::post('/service-category-insert', ['as' => 'admin.service_category.insert', 'uses' => 'Aii\Admin\ServiceCategoryController@Insert']);
    Route::get('/service-category/{id}/edit', ['as' => 'admin.service_category.edit', 'uses' => 'Aii\Admin\ServiceCategoryController@GetServiceCategory']);
    Route::get('/service-category/{id}/delete', ['as' => 'admin.service_category.delete', 'uses' => 'Aii\Admin\ServiceCategoryController@Delete']);
    Route::post('/service-category/update', ['as' => 'admin.service_category.update', 'uses' => 'Aii\Admin\ServiceCategoryController@Update']);
    Route::post('/service-category/update-status', ['as' => 'admin.service_category.change_status', 'uses' => 'Aii\Admin\ServiceCategoryController@UpdateStatus']);
    /*End::Service-category route*/

    /*Start::service-sub-category route*/
    Route::get('/service-sub-category', ['as' => 'admin.service_sub_category.index', 'uses' => 'Aii\Admin\ServiceSubCategoryController@Index']);
    Route::post('/service-sub-category-insert', ['as' => 'admin.service_sub_category.insert', 'uses' => 'Aii\Admin\ServiceSubCategoryController@Insert']);
    Route::get('/service-sub-category/{id}/edit', ['as' => 'admin.service_sub_category.edit', 'uses' => 'Aii\Admin\ServiceSubCategoryController@GetServiceSubCategory']);
    Route::get('/service-sub-category/{id}/delete', ['as' => 'admin.service_sub_category.delete', 'uses' => 'Aii\Admin\ServiceSubCategoryController@Delete']);
    Route::post('/service-sub-category/update', ['as' => 'admin.service_sub_category.update', 'uses' => 'Aii\Admin\ServiceSubCategoryController@Update']);
    Route::post('/service-sub-category/update-status', ['as' => 'admin.service_sub_category.change_status', 'uses' => 'Aii\Admin\ServiceSubCategoryController@UpdateStatus']);
    /*End::service-sub-category route*/

    /*Start::Product route*/
    Route::get('/product', ['as' => 'admin.product.index', 'uses' => 'Aii\Admin\ProductController@Index']);
    Route::post('/product-insert', ['as' => 'admin.product.insert', 'uses' => 'Aii\Admin\ProductController@Insert']);
    Route::get('/product/{id}/delete', ['as' => 'admin.product.delete', 'uses' => 'Aii\Admin\ProductController@Delete']);
    Route::post('/product/update', ['as' => 'admin.product.update', 'uses' => 'Aii\Admin\ProductController@Update']);
    Route::post('/product/update-status', ['as' => 'admin.product.change_status', 'uses' => 'Aii\Admin\ProductController@UpdateStatus']);
    Route::get('/product/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'Aii\Admin\ProductController@GetProduct']);
    Route::post('/product/get-sub-category', ['as' => 'admin.product_sub_category.get_sub_category', 'uses' => 'Aii\Admin\ProductController@GetSubCategoryProduct']);
    Route::post('/product/image', ['as' => 'admin.product.get_image', 'uses' => 'Aii\Admin\ProductController@GetProductImage']);
    Route::post('/product/image-status-change', ['as' => 'admin.product.change_image_status', 'uses' => 'Aii\Admin\ProductController@UpdateStatusProductImage']);
    Route::post('/product/image-delete', ['as' => 'admin.product.delete_image', 'uses' => 'Aii\Admin\ProductController@DeleteProductImage']);
    /*End::Product route*/

    /*Start::Product-category route*/
    Route::get('/product-category', ['as' => 'admin.product_category.index', 'uses' => 'Aii\Admin\ProductCategoryController@Index']);
    Route::post('/product-category-insert', ['as' => 'admin.product_category.insert', 'uses' => 'Aii\Admin\ProductCategoryController@Insert']);
    Route::get('/product-category/{id}/edit', ['as' => 'admin.product_category.edit', 'uses' => 'Aii\Admin\ProductCategoryController@GetProductCategory']);
    Route::get('/product-category/{id}/delete', ['as' => 'admin.product_category.delete', 'uses' => 'Aii\Admin\ProductCategoryController@Delete']);
    Route::post('/product-category/update', ['as' => 'admin.product_category.update', 'uses' => 'Aii\Admin\ProductCategoryController@Update']);
    Route::post('/product-category/update-status', ['as' => 'admin.product_category.change_status', 'uses' => 'Aii\Admin\ProductCategoryController@UpdateStatus']);
    /*End::Product-category route*/

    /*Start::product-sub-category route*/
    Route::get('/product-sub-category', ['as' => 'admin.product_sub_category.index', 'uses' => 'Aii\Admin\ProductSubCategoryController@Index']);
    Route::post('/product-sub-category-insert', ['as' => 'admin.product_sub_category.insert', 'uses' => 'Aii\Admin\ProductSubCategoryController@Insert']);
    Route::get('/product-sub-category/{id}/edit', ['as' => 'admin.product_sub_category.edit', 'uses' => 'Aii\Admin\ProductSubCategoryController@GetProductSubCategory']);
    Route::get('/product-sub-category/{id}/delete', ['as' => 'admin.product_sub_category.delete', 'uses' => 'Aii\Admin\ProductSubCategoryController@Delete']);
    Route::post('/product-sub-category/update', ['as' => 'admin.product_sub_category.update', 'uses' => 'Aii\Admin\ProductSubCategoryController@Update']);
    Route::post('/product-sub-category/update-status', ['as' => 'admin.product_sub_category.change_status', 'uses' => 'Aii\Admin\ProductSubCategoryController@UpdateStatus']);
    /*End::product-sub-category route*/

    /*Start::team member route*/
    Route::get('/team-member', ['as' => 'admin.team_member.index', 'uses' => 'Aii\Admin\TeamMemberController@Index']);
    Route::post('/team-member/insert', ['as' => 'admin.team_member.insert', 'uses' => 'Aii\Admin\TeamMemberController@Insert']);
    Route::get('/team-member/{id}/edit', ['as' => 'admin.team_member.edit', 'uses' => 'Aii\Admin\TeamMemberController@GetTeamMember']);
    Route::get('/team-member/{id}/delete', ['as' => 'admin.team_member.delete', 'uses' => 'Aii\Admin\TeamMemberController@Delete']);
    Route::post('/team-member/update', ['as' => 'admin.team_member.update', 'uses' => 'Aii\Admin\TeamMemberController@Update']);
    Route::post('/team-member/update-status', ['as' => 'admin.team_member.change_status', 'uses' => 'Aii\Admin\TeamMemberController@UpdateStatus']);
    /*End::team member route*/

    /*Start::testimonial route*/
    Route::get('/testimonial', ['as' => 'admin.testimonial.index', 'uses' => 'Aii\Admin\TestimonialController@Index']);
    Route::post('/testimonial/insert', ['as' => 'admin.testimonial.insert', 'uses' => 'Aii\Admin\TestimonialController@Insert']);
    Route::get('/testimonial/{id}/edit', ['as' => 'admin.testimonial.edit', 'uses' => 'Aii\Admin\TestimonialController@GetTestimonial']);
    Route::get('/testimonial/{id}/delete', ['as' => 'admin.testimonial.delete', 'uses' => 'Aii\Admin\TestimonialController@Delete']);
    Route::post('/testimonial/update', ['as' => 'admin.testimonial.update', 'uses' => 'Aii\Admin\TestimonialController@Update']);
    Route::post('/testimonial/update-status', ['as' => 'admin.testimonial.change_status', 'uses' => 'Aii\Admin\TestimonialController@UpdateStatus']);
    /*End::testimonial route*/
});