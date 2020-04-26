<?php

// Socialite Route
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update'); 
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout'); 


    /// Admin Section 
// categories 
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@Editcategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@Updatecategory');

/// Brand 
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@DeleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@EditBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@UpdateBrand');

// Sub Categories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubCategoryController@DeleteSubcat');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubCategoryController@EditSubcat');

Route::post('update/subcategory/{id}', 'Admin\Category\SubCategoryController@UpdateSubcat');

// Coupons All 
Route::get('admin/sub/coupon', 'Admin\Category\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@UpdateCoupon');

// Newslater

Route::get('admin/newslater', 'Admin\Category\CouponController@Newslater')->name('admin.newslater');
Route::get('delete/sub/{id}', 'Admin\Category\CouponController@DeleteSub');

 // For Show Sub category with ajax
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');



// Product All Route
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');

Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('delete/product/{id}', 'Admin\ProductController@DeleteProduct');

Route::get('view/product/{id}', 'Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}', 'Admin\ProductController@EditProduct');

Route::post('update/product/withoutphoto/{id}', 'Admin\ProductController@UpdateProductWithoutPhoto');

Route::post('update/product/photo/{id}', 'Admin\ProductController@UpdateProductPhoto');

// Blog Admin All

Route::get('blog/category/list', 'Admin\PostController@BlogCatList')->name('add.blog.categorylist');
Route::post('admin/store/blog', 'Admin\PostController@BlogCatStore')->name('store.blog.category');
Route::get('delete/blogcategory/{id}', 'Admin\PostController@DeleteBlogCat');
Route::get('edit/blogcategory/{id}', 'Admin\PostController@EditBlogCat');
Route::post('update/blog/category/{id}', 'Admin\PostController@UpdateBlogCat');


Route::get('admin/add/post', 'Admin\PostController@Create')->name('add.blogpost');
Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');

Route::post('admin/store/post', 'Admin\PostController@store')->name('store.post');

Route::get('delete/post/{id}', 'Admin\PostController@DeletePost');
Route::get('edit/post/{id}', 'Admin\PostController@EditPost');

Route::post('update/post/{id}', 'Admin\PostController@UpdatePost');





// Frontend All Routes
Route::post('store/newslater', 'FrontController@StoreNewslater')->name('store.newslater');

// ADD Wishlist

Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');

// Add to Cart Route 
Route::get('add/to/cart/{id}', 'CartController@AddCart');
Route::get('check', 'CartController@check');

Route::get('product/cart', 'CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/cart/item/', 'CartController@UpdateCart')->name('update.cartitem');

Route::get('/cart/product/view/{id}', 'CartController@ViewProduct');
Route::post('insert/into/cart/', 'CartController@insertCart')->name('insert.into.cart');

Route::get('user/checkout/', 'CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/', 'CartController@wishlist')->name('user.wishlist');

Route::post('user/apply/coupon/', 'CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'CartController@CouponRemove')->name('coupon.remove');




Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');

Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

/// Blog Post Route 

Route::get('blog/post/', 'BlogController@blog')->name('blog.post');

Route::get('language/english', 'BlogController@English')->name('language.english');
Route::get('language/hindi', 'BlogController@Hindi')->name('language.hindi');

Route::get('blog/single/{id}', 'BlogController@BlogSingle');

// Pyment Step 
Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');
Route::post('user/payment/process/', 'PaymentController@Payment')->name('payment.process'); 

Route::post('user/stripe/charge/', 'PaymentController@StripeCharge')->name('stripe.charge');
Route::post('user/oncash/charge/', 'PaymentController@OnCash')->name('oncash.charge');

// Product details Page 
Route::get('products/{id}', 'ProductController@ProductsView');
Route::get('allcategory/{id}', 'ProductController@CategoryView');

// Admin Order Route

Route::get('admin/pading/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');

Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');

Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPayment')->name('admin.accept.payment');

Route::get('admin/cancel/order', 'Admin\OrderController@CancelOrder')->name('admin.cancel.order');

Route::get('admin/process/payment', 'Admin\OrderController@ProcessPayment')->name('admin.process.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPayment')->name('admin.success.payment');

Route::get('admin/delevery/process/{id}', 'Admin\OrderController@DeleveryProcess');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');

/// SEO Setting Route
Route::get('admin/seo', 'Admin\OrderController@seo')->name('admin.seo');
Route::post('admin/seo/update', 'Admin\OrderController@UpdateSeo')->name('update.seo');

// Order Tracking Route
Route::post('order/traking', 'FrontController@OrderTraking')->name('order.tracking');

// Order Report Routes 

Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/delivery', 'Admin\ReportController@TodayDelivery')->name('today.delivery');

Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@Search')->name('search.report');

Route::post('admin/search/by/year', 'Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/search/by/month', 'Admin\ReportController@SearchByMonth')->name('search.by.month');

Route::post('admin/search/by/date', 'Admin\ReportController@SearchByDate')->name('search.by.date');

// Admin Role Routes 

Route::get('admin/all/user', 'Admin\UserRoleController@UserRole')->name('admin.all.user');

Route::get('admin/create/admin', 'Admin\UserRoleController@UserCreate')->name('create.admin');

Route::post('admin/store/admin', 'Admin\UserRoleController@UserStore')->name('store.admin');

Route::get('delete/admin/{id}', 'Admin\UserRoleController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\UserRoleController@UserEdit');

Route::post('admin/update/admin', 'Admin\UserRoleController@UserUpdate')->name('update.admin');

// Admin Site Setting Route 
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');

Route::post('admin/sitesetting', 'Admin\SettingController@UpdateSiteSetting')->name('update.sitesetting');

 // Return Order Route

Route::get('success/list/', 'PaymentController@SuccessList')->name('success.orderlist');

Route::get('request/return/{id}', 'PaymentController@RequestReturn');

Route::get('admin/return/request/', 'Admin\ReturnController@ReturnRequest')->name('admin.return.request');

Route::get('admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return/', 'Admin\ReturnController@AllReturn')->name('admin.all.return');

// Order Stock Route 
Route::get('admin/product/stock', 'Admin\UserRoleController@ProductStock')->name('admin.product.stock');

/// Contact page Routes

Route::get('contact/page', 'ContactController@Contact')->name('contact.page');
Route::post('contact/form', 'ContactController@ContactForm')->name('contact.form');

Route::get('admin/all/message', 'ContactController@AllMessage')->name('all.message');

// Search Route
Route::post('product/search', 'CartController@Search')->name('product.search');