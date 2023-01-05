<?php


Route::group(['middleware' => ['web', 'auth']], function () {
    // admins
    Route::resources([
        '/ddk/admin/menu'=> Ddkits\Adminpanel\Controller\MenusController::class,
        '/ddk/admin' => Ddkits\Adminpanel\Controller\AdminPanelController::class,
        '/ddk/profile' => Ddkits\Adminpanel\Controller\ProfilesController::class,
        '/ddk/admin/private/settings' => Ddkits\Adminpanel\Controller\SettingsController::class,
        '/ddk/admin/posts' => Ddkits\Adminpanel\Controller\PostController::class,
        '/ddk/dashboard/admin/contacts' => Ddkits\Adminpanel\Controller\ContactController::class,
    ]);
    // Route::resource('/ddk/admin-refreshapps', 'RefreshAppsCont');
    Route::get('/ddk/admin-test-java', ['as' => 'ddk.admin.test.java', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@testJava']);
    // Route::resource('/ddk/admin-shell', 'ShellCont');
    // Route::resource('/ddk/admin/sites', 'SitesCont');
    Route::post('/ddk/admin-save/settings', ['as' => 'ddk.admin.settings.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@storeSettings']);
    Route::post('/ddk/admin/create-settings', ['as' => 'ddk.admin.settings.store', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@createSettings']);
    // // saves admins
    Route::post('/ddk/admin-users/save', ['as' => 'ddk.admin.users.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsersStore']);
    Route::post('/ddk/admin-posts/save', ['as' => 'ddk.admin.posts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostsStore']);
    Route::post('/ddk/admin-proposts/save', ['as' => 'ddk.admin.proposts.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminProPostsStore']);
    Route::post('/ddk/admin-tags/save', ['as' => 'ddk.admin.tags.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostTagsStore']);
    Route::post('/ddk/admin-categories/save', ['as' => 'ddk.admin.categories.save', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminPostCategoriesStore']);
    Route::post('/ddk/admin-path-update', ['as' => 'ddk.admin.updatePath', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@pathUpdate']);
    // Pages
    // get
    Route::get('/ddk/dashboard/contacts/{id}/delete',
    ['as' => 'ddk.admin.contacts.delete',
        'uses' => 'Ddkits\Adminpanel\Controller\ContactController@destroy']
    );
        /* contacts */
    Route::get('/ddk/admin-users', ['as' => 'ddk.admin.users', 'uses' => 'Ddkits\Adminpanel\Controller\AdminPanelController@adminUsers']);
     // ipban routes
     Route::get('/ddk/dashboard/admin/block/ip/{ip}', ['as' => 'ddk.public.block.ip', 'uses' => 'Ddkits\Adminpanel\Controller\IpbanController@blockIp']);
     Route::get('/ddk/dashboard/admin/unblock/ip/{ip}', ['as' => 'ddk.public.unblock.ip', 'uses' => 'Ddkits\Adminpanel\Controller\IpbanController@unBlockIp']);

});

// sitemap links
Route::get('/ddk/sitemap', 'Ddkits\Adminpanel\Controller\SitemapsController@index');
Route::get('/ddk/sitemap/post', 'Ddkits\Adminpanel\Controller\SitemapsController@posts');

// Public Posts
Route::group(['middleware' => ['web']], function () {
    Route::post('/ddk/contactus/submit', [Ddkits\Adminpanel\Controller\ContactController::class, 'submit']);
    Route::get('/ddk/article/{path?}', 'Ddkits\Adminpanel\Controller\PostController@showPath')->where('path', '.*');
});
