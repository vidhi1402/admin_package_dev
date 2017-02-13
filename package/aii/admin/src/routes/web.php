<?php

Route::get('/test', function () {
    echo 'Hello from the  package!';
});

Route::group(['prefix' => '/admin/', 'middleware' => 'web'], function () {

   // Route::get('/register', ['as' => 'admin.auth.register', 'uses' => 'Aii\Admin\Controller\Auth\RegisterController@showRegistrationForm']);
    Route::get('/login', ['as' => 'admin.auth.login', 'uses' => 'Aii\Admin\Controller\Auth\LoginController@ShowLoginForm']);
    //Route::post('/register', ['as' => 'admin.admin.register-admin', 'uses' => 'Aii\Admin\Controller\Auth\RegisterController@register']);
    Route::post('/login', ['as' => 'admin.auth.login-admin', 'uses' => 'Aii\Admin\Controller\Auth\LoginController@login']);
    Route::post('/logout', ['as' => 'admin.auth.logout', 'uses' => 'Aii\Admin\Controller\Auth\LoginController@logout']);
    /*Start::Dashboard route*/
    Route::get('/dashboard', ['as' => 'admin.dashboard.index', 'uses' => 'Aii\Admin\Controller\DashboardController@Index']);
    /*End::Dashboard route*/

    /*Start::Contact-Us route*/
    Route::get('/contact-us', ['as' => 'admin.contact_us.index', 'uses' => 'Aii\Admin\Controller\ContactUsController@Index']);
    Route::post('/contact-us/message', ['as' => 'admin.contact_us.get_message', 'uses' => 'Aii\Admin\Controller\ContactUsController@GetMessageContact']);
    Route::get('/contact-us/{id}/delete', ['as' => 'admin.contact_us.delete', 'uses' => 'Aii\Admin\Controller\ContactUsController@Delete']);
    /*End::Contact-Us route*/

    /*Start::Service route*/
    Route::get('/service', ['as' => 'admin.service.index', 'uses' => 'Aii\Admin\Controller\ServiceController@Index']);
    Route::post('/service-insert', ['as' => 'admin.service.insert', 'uses' => 'Aii\Admin\Controller\ServiceController@Insert']);
    Route::get('/service/{id}/delete', ['as' => 'admin.service.delete', 'uses' => 'Aii\Admin\Controller\ServiceController@Delete']);
    Route::post('/service/update', ['as' => 'admin.service.update', 'uses' => 'Aii\Admin\Controller\ServiceController@Update']);
    Route::post('/service/update-status', ['as' => 'admin.service.change_status', 'uses' => 'Aii\Admin\Controller\ServiceController@UpdateStatus']);
    Route::get('/service/{id}/edit', ['as' => 'admin.service.edit', 'uses' => 'Aii\Admin\Controller\ServiceController@GetService']);
    Route::post('/service/get-sub-category', ['as' => 'admin.service_sub_category.get_sub_category', 'uses' => 'Aii\Admin\Controller\ServiceController@GetSubCategoryService']);
    Route::post('/service/image', ['as' => 'admin.service.get_image', 'uses' => 'Aii\Admin\Controller\ServiceController@GetServiceImage']);
    Route::post('/service/image-status-change', ['as' => 'admin.service.change_image_status', 'uses' => 'Aii\Admin\Controller\ServiceController@UpdateStatusServiceImage']);
    Route::post('/service/image-delete', ['as' => 'admin.service.delete_image', 'uses' => 'Aii\Admin\Controller\ServiceController@DeleteServiceImage']);
    /*End::Service route*/

    /*Start::Service-category route*/
    Route::get('/service-category', ['as' => 'admin.service_category.index', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@Index']);
    Route::post('/service-category-insert', ['as' => 'admin.service_category.insert', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@Insert']);
    Route::get('/service-category/{id}/edit', ['as' => 'admin.service_category.edit', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@GetServiceCategory']);
    Route::get('/service-category/{id}/delete', ['as' => 'admin.service_category.delete', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@Delete']);
    Route::post('/service-category/update', ['as' => 'admin.service_category.update', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@Update']);
    Route::post('/service-category/update-status', ['as' => 'admin.service_category.change_status', 'uses' => 'Aii\Admin\Controller\ServiceCategoryController@UpdateStatus']);
    /*End::Service-category route*/

    /*Start::service-sub-category route*/
    Route::get('/service-sub-category', ['as' => 'admin.service_sub_category.index', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@Index']);
    Route::post('/service-sub-category-insert', ['as' => 'admin.service_sub_category.insert', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@Insert']);
    Route::get('/service-sub-category/{id}/edit', ['as' => 'admin.service_sub_category.edit', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@GetServiceSubCategory']);
    Route::get('/service-sub-category/{id}/delete', ['as' => 'admin.service_sub_category.delete', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@Delete']);
    Route::post('/service-sub-category/update', ['as' => 'admin.service_sub_category.update', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@Update']);
    Route::post('/service-sub-category/update-status', ['as' => 'admin.service_sub_category.change_status', 'uses' => 'Aii\Admin\Controller\ServiceSubCategoryController@UpdateStatus']);
    /*End::service-sub-category route*/

    /*Start::Product route*/
    Route::get('/product', ['as' => 'admin.product.index', 'uses' => 'Aii\Admin\Controller\ProductController@Index']);
    Route::post('/product-insert', ['as' => 'admin.product.insert', 'uses' => 'Aii\Admin\Controller\ProductController@Insert']);
    Route::get('/product/{id}/delete', ['as' => 'admin.product.delete', 'uses' => 'Aii\Admin\Controller\ProductController@Delete']);
    Route::post('/product/update', ['as' => 'admin.product.update', 'uses' => 'Aii\Admin\Controller\ProductController@Update']);
    Route::post('/product/update-status', ['as' => 'admin.product.change_status', 'uses' => 'Aii\Admin\Controller\ProductController@UpdateStatus']);
    Route::get('/product/{id}/edit', ['as' => 'admin.product.edit', 'uses' => 'Aii\Admin\Controller\ProductController@GetProduct']);
    Route::post('/product/get-sub-category', ['as' => 'admin.product_sub_category.get_sub_category', 'uses' => 'Aii\Admin\Controller\ProductController@GetSubCategoryProduct']);
    Route::post('/product/image', ['as' => 'admin.product.get_image', 'uses' => 'Aii\Admin\Controller\ProductController@GetProductImage']);
    Route::post('/product/image-status-change', ['as' => 'admin.product.change_image_status', 'uses' => 'Aii\Admin\Controller\ProductController@UpdateStatusProductImage']);
    Route::post('/product/image-delete', ['as' => 'admin.product.delete_image', 'uses' => 'Aii\Admin\Controller\ProductController@DeleteProductImage']);
    /*End::Product route*/

    /*Start::Product-category route*/
    Route::get('/product-category', ['as' => 'admin.product_category.index', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@Index']);
    Route::post('/product-category-insert', ['as' => 'admin.product_category.insert', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@Insert']);
    Route::get('/product-category/{id}/edit', ['as' => 'admin.product_category.edit', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@GetProductCategory']);
    Route::get('/product-category/{id}/delete', ['as' => 'admin.product_category.delete', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@Delete']);
    Route::post('/product-category/update', ['as' => 'admin.product_category.update', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@Update']);
    Route::post('/product-category/update-status', ['as' => 'admin.product_category.change_status', 'uses' => 'Aii\Admin\Controller\ProductCategoryController@UpdateStatus']);
    /*End::Product-category route*/

    /*Start::product-sub-category route*/
    Route::get('/product-sub-category', ['as' => 'admin.product_sub_category.index', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@Index']);
    Route::post('/product-sub-category-insert', ['as' => 'admin.product_sub_category.insert', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@Insert']);
    Route::get('/product-sub-category/{id}/edit', ['as' => 'admin.product_sub_category.edit', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@GetProductSubCategory']);
    Route::get('/product-sub-category/{id}/delete', ['as' => 'admin.product_sub_category.delete', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@Delete']);
    Route::post('/product-sub-category/update', ['as' => 'admin.product_sub_category.update', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@Update']);
    Route::post('/product-sub-category/update-status', ['as' => 'admin.product_sub_category.change_status', 'uses' => 'Aii\Admin\Controller\ProductSubCategoryController@UpdateStatus']);
    /*End::product-sub-category route*/

    /*Start::team member route*/
    Route::get('/team-member', ['as' => 'admin.team_member.index', 'uses' => 'Aii\Admin\Controller\TeamMemberController@Index']);
    Route::post('/team-member/insert', ['as' => 'admin.team_member.insert', 'uses' => 'Aii\Admin\Controller\TeamMemberController@Insert']);
    Route::get('/team-member/{id}/edit', ['as' => 'admin.team_member.edit', 'uses' => 'Aii\Admin\Controller\TeamMemberController@GetTeamMember']);
    Route::get('/team-member/{id}/delete', ['as' => 'admin.team_member.delete', 'uses' => 'Aii\Admin\Controller\TeamMemberController@Delete']);
    Route::post('/team-member/update', ['as' => 'admin.team_member.update', 'uses' => 'Aii\Admin\Controller\TeamMemberController@Update']);
    Route::post('/team-member/update-status', ['as' => 'admin.team_member.change_status', 'uses' => 'Aii\Admin\Controller\TeamMemberController@UpdateStatus']);
    /*End::team member route*/

    /*Start::testimonial route*/
    Route::get('/testimonial', ['as' => 'admin.testimonial.index', 'uses' => 'Aii\Admin\Controller\TestimonialController@Index']);
    Route::post('/testimonial/insert', ['as' => 'admin.testimonial.insert', 'uses' => 'Aii\Admin\Controller\TestimonialController@Insert']);
    Route::get('/testimonial/{id}/edit', ['as' => 'admin.testimonial.edit', 'uses' => 'Aii\Admin\Controller\TestimonialController@GetTestimonial']);
    Route::get('/testimonial/{id}/delete', ['as' => 'admin.testimonial.delete', 'uses' => 'Aii\Admin\Controller\TestimonialController@Delete']);
    Route::post('/testimonial/update', ['as' => 'admin.testimonial.update', 'uses' => 'Aii\Admin\Controller\TestimonialController@Update']);
    Route::post('/testimonial/update-status', ['as' => 'admin.testimonial.change_status', 'uses' => 'Aii\Admin\Controller\TestimonialController@UpdateStatus']);
    /*End::testimonial route*/

    /*Start :: Gallery Category*/
    Route::get('/gallery-category', ['as' => 'admin.gallery-category.index', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@Index']);
    Route::post('/gallery-category', ['as' => 'admin.gallery_category.insert', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@Insert']);
    Route::get('/gallery-category/{id}/edit', ['as' => 'admin.gallery_category.edit', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@GetGalleryCategory']);
    Route::post('/gallery-category/update', ['as' => 'admin.gallery_category.update', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@Update']);
    Route::get('/gallery-category/{id}/delete', ['as' => 'admin.gallery_category.delete', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@Delete']);
    Route::post('/gallery-category/update-status', ['as' => 'admin.gallery_category.change_status', 'uses' => 'Aii\Admin\Controller\GalleryCategoryController@UpdateStatus']);
    /*End :: Gallery Category*/

    /*Start :: Gallery Sub Category */
    Route::get('/gallery-sub-category', ['as' => 'admin.gallery_sub_ategory.index', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@Index']);
    Route::post('/gallery-sub-category', ['as' => 'admin.gallery_sub_ategory.insert', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@Insert']);
    Route::get('/gallery-sub-category/{id}/edit', ['as' => 'admin.gallery_sub_ategory.edit', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@GetGallarySubCategory']);
    Route::post('/gallery-sub-category/update', ['as' => 'admin.gallery_sub_ategory.update', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@Update']);
    Route::get('/gallery-sub-category/{id}/delete', ['as' => 'admin.gallery_sub_ategory.delete', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@Delete']);
    Route::post('/gallery-sub-category/update-status', ['as' => 'admin.gallery_sub_ategory.change_status', 'uses' => 'Aii\Admin\Controller\GallerySubCategoryController@UpdateStatus']);
    /*End :: Gallery Sub Category */

    /*Start:: Gallery */
    Route::get('/gallery', ['as' => 'admin.gallery.index', 'uses' => 'Aii\Admin\Controller\GalleryController@Index']);
    /*Start:: Gallery */

    /*Start :: Get Subcategory List*/
    Route::post('/gallery/get-sub-category', ['as' => 'admin.gallery.get_sub_category', 'uses' => 'Aii\Admin\Controller\GalleryController@GetSubCategoryGallery']);
    Route::post('/gallery', ['as' => 'admin.gallery.insert', 'uses' => 'Aii\Admin\Controller\GalleryController@insert']);

    Route::get('/gallery/{id}/delete', ['as' => 'admin.gallery.delete', 'uses' => 'Aii\Admin\Controller\GalleryController@Delete']);
    Route::post('/gallery/image', ['as' => 'admin.gallery.get_image', 'uses' => 'Aii\Admin\Controller\GalleryController@GetGalleryImage']);
    Route::post('/gallery/image-delete', ['as' => 'admin.gallery.delete_image', 'uses' => 'Aii\Admin\Controller\GalleryController@DeleteGalleryImage']);
    Route::get('/gallery/{id}/edit', ['as' => 'admin.gallery.edit', 'uses' => 'Aii\Admin\Controller\GalleryController@GetGallery']);
    Route::post('/gallery/update', ['as' => 'admin.gallery.update', 'uses' => 'Aii\Admin\Controller\GalleryController@Update']);

});