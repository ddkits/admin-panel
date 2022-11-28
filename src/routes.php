<?php


Route::group(['middleware' => ['web', 'auth']], function () {
    // admins
    Route::resource('/admin/menu', 'Ddkits\Adminpanel\Controller\MenusController');
    Route::resource('/admin', 'Ddkits\Adminpanel\Controller\AdminPanelController');
    Route::resource('/profile', 'Ddkits\Adminpanel\Controller\ProfilesController');
    // Route::resource('/admin-refreshapps', 'RefreshAppsCont');
    Route::get('/admin-test-java', ['as' => 'ddk.admin.test.java', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@testJava']);
    // Route::resource('/admin-shell', 'ShellCont');
    Route::resource('/admin/private/settings', 'Ddkits\Adminpanel\Controller\SettingsController');
    Route::resource('/admin/posts', 'Ddkits\Adminpanel\Controller\PostController');
    // Route::resource('/admin/sites', 'SitesCont');
    Route::post('/admin-save/settings', ['as' => 'ddk.admin.settings.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@storeSettings']);
    Route::post('/admin/create-settings', ['as' => 'ddk.admin.settings.store', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@createSettings']);
    // // saves admins
    Route::post('/admin-users/save', ['as' => 'ddk.admin.users.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsersStore']);
    Route::post('/admin-posts/save', ['as' => 'ddk.admin.posts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostsStore']);
    Route::post('/admin-proposts/save', ['as' => 'ddk.admin.proposts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminProPostsStore']);
    Route::post('/admin-tags/save', ['as' => 'ddk.admin.tags.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostTagsStore']);
    Route::post('/admin-categories/save', ['as' => 'ddk.admin.categories.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostCategoriesStore']);
    Route::post('/admin-path-update', ['as' => 'ddk.admin.updatePath', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@pathUpdate']);
    // Pages
    // get
    Route::get('dashboard/contacts/{id}/delete',
    ['as' => 'ddk.admin.contacts.delete',
        'uses' => 'Ddkits\Adminpanel\Controller\ContactController@destroy']
    );
    /* contacts */
    Route::resource('/dashboard/admin/contacts', 'Ddkits\Adminpanel\Controller\ContactController');
        /* contacts */
    Route::get('/admin-users', ['as' => 'ddk.admin.users', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsers']);
     // ipban routes
     Route::get('/dashboard/admin/block/ip/{ip}', ['as' => 'ddk.public.block.ip', 'uses' => 'Ddkits\Adminpanel\Controller\IpbanController@blockIp']);
     Route::get('/dashboard/admin/unblock/ip/{ip}', ['as' => 'ddk.public.unblock.ip', 'uses' => 'Ddkits\Adminpanel\Controller\IpbanController@unBlockIp']);

});

// sitemap links
Route::get('/sitemap', 'Ddkits\Adminpanel\Controller\SitemapsController@index');
Route::get('/sitemap/post', 'Ddkits\Adminpanel\Controller\SitemapsController@posts');

// Public Posts
Route::group(['middleware' => ['web']], function () {
    Route::post('/contactus/submit', [Ddkits\Adminpanel\Controller\ContactController::class,'submit']);
    Route::get('/article/{path?}', 'Ddkits\Adminpanel\Controller\PostController@showPath')->where('path', '.*');
});
