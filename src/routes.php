<?php


Route::group(['middleware' => ['web', 'auth']], function () {
    // admins
    Route::resource('/admin/menus', 'Ddkits\Adminpanel\Controller\MenusController');
    Route::resource('/admin', 'Ddkits\Adminpanel\Controller\AdminPanelController');
    Route::resource('/admin/profiles', 'Ddkits\Adminpanel\Controller\ProfilesController');
    // Route::resource('/admin-refreshapps', 'RefreshAppsCont');
    Route::get('/admin-test-java', ['as' => 'admin.test.java', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@testJava']);
    // Route::resource('/admin-shell', 'ShellCont');
    Route::resource('/admin/private/settings', 'Ddkits\Adminpanel\Controller\SettingsController');
    Route::resource('/admin/posts', 'Ddkits\Adminpanel\Controller\PostController');
    // Route::resource('/admin/sites', 'SitesCont');
    Route::post('/admin-save/settings', ['as' => 'admin.settings.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@storeSettings']);
    Route::post('/admin/create-settings', ['as' => 'admin.settings.store', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@createSettings']);
    // // saves admins
    Route::post('/admin-users/save', ['as' => 'admin.users.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsersStore']);
    Route::post('/admin-posts/save', ['as' => 'admin.posts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostsStore']);
    Route::post('/admin-proposts/save', ['as' => 'admin.proposts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminProPostsStore']);
    Route::post('/admin-tags/save', ['as' => 'admin.tags.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostTagsStore']);
    Route::post('/admin-categories/save', ['as' => 'admin.categories.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostCategoriesStore']);
    Route::post('/admin-path-update', ['as' => 'admin.updatePath', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@pathUpdate']);
    // Pages
    // get

    Route::get('/admin-users', ['as' => 'admin.users', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsers']);
});

// sitemap links
Route::get('/sitemap', 'Ddkits\Adminpanel\Controller\SitemapsController@index');
Route::get('/sitemap/post', 'Ddkits\Adminpanel\Controller\SitemapsController@posts');

// Public Posts
Route::group(['middleware' => ['web']], function () {
    Route::get('/article/{path?}', 'Ddkits\Adminpanel\Controller\PostController@showPath')->where('path', '.*');
});
