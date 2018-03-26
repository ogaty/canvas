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

use App\Helpers\RouteHelper;

/* Frontend page routes. */
Route::group([
    'middlewareGroups' => RouteHelper::getGeneralMiddlewareGroups(),
    'middleware' => RouteHelper::getGeneralMiddleware(),
    'prefix' => RouteHelper::getBlogMain(),
], function () {

    /* Fully-installed and configured routes. */
    Route::get('/', 'Frontend\BlogController@index')->name('canvas.home');
    Route::get('/feed', 'Frontend\BlogController@feed')->name('canvas.feed');
    Route::get('/sitemap.xml', 'Frontend\BlogController@sitemap')->name('canvas.sitemap');

    Route::group(['prefix' => RouteHelper::getBlogPrefix()], function () {
        Route::get('/', 'Frontend\BlogController@index')->name('canvas.blog.post.index');
        Route::get('post/{slug}', 'Frontend\BlogController@showPost')->name('canvas.blog.post.show');
    });

    // こっちのほうが楽だ
    Route::get('/techs', 'Frontend\TechsController@index')->name('techs.home');
    Route::get('/sabian', 'Frontend\FortuneController@index')->name('fortune.home');
    Route::get('/sabian/sabian', 'Frontend\SabianController@index')->name('fortune.sabian');

    Route::get('/search', 'Frontend\SearchController@index')->name('search.index');

    /* Installation page route. */
    Route::get('canvas.install', 'Setup\InstallController@index')->name('canvas.install');

        /* Authentication routes. */
        Route::group([
            'namespace' => 'Auth',
        ], function () {
            Route::group([
                'prefix' => RouteHelper::getAuthPrefix(),
            ], function () {
                Route::get('login', 'LoginController@showLoginForm')->name('canvas.login');
                Route::post('login', 'LoginController@login')->name('login.store');
                Route::get('logout', 'LoginController@logout')->name('logout');
            });

            /* Reset password routes. */
            Route::group(['prefix' => RouteHelper::getPasswordPrefix()], function () {
                Route::post('/', 'PasswordController@updatePassword')->name('password.update');
                Route::get('forgot', 'ForgotPasswordController@showLinkRequestForm')->name('password.forgot');
                Route::post('forgot', 'ForgotPasswordController@sendResetLinkEmail')->name('password.forgot.store');
                Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
                Route::post('reset', 'ResetPasswordController@reset')->name('password.reset.store');
            });
        });
});

/* Backend page routes. */
Route::group([
    'middlewareGroups' => RouteHelper::getGeneralMiddlewareGroups(),
    'middleware' => RouteHelper::getAdminMiddleware(),
    'namespace' => 'Backend',
], function () {

    /* Admin dashboard page route. */
    Route::get(RouteHelper::getAdminPrefix(), 'HomeController@index')->name('canvas.admin');

    /* Post page routes. */
    Route::resource(RouteHelper::getAdminPrefix().'/post', 'PostController', [
        'except' => 'show',
        'names' => [
            'index' => 'canvas.admin.post.index',
            'create' => 'canvas.admin.post.create',
            'store' => 'canvas.admin.post.store',
            'edit' => 'canvas.admin.post.edit',
            'update' => 'canvas.admin.post.update',
            'destroy' => 'canvas.admin.post.destroy',
        ],
    ]);
    Route::resource(RouteHelper::getAdminPrefix().'/techs', 'TechsController', [
        'except' => 'show',
        'names' => [
            'index' => 'canvas.admin.techs.index',
            'create' => 'canvas.admin.techs.create',
            'store' => 'canvas.admin.techs.store',
            'edit' => 'canvas.admin.techs.edit',
            'update' => 'canvas.admin.techs.update',
            'destroy' => 'canvas.admin.techs.destroy',
        ],
    ]);
    Route::resource(RouteHelper::getAdminPrefix().'/games', 'GamesController', [
        'except' => 'show',
        'names' => [
            'index' => 'canvas.admin.games.index',
            'create' => 'canvas.admin.games.create',
            'store' => 'canvas.admin.games.store',
            'edit' => 'canvas.admin.games.edit',
            'update' => 'canvas.admin.games.update',
            'destroy' => 'canvas.admin.games.destroy',
        ],
    ]);
    Route::resource(RouteHelper::getAdminPrefix().'/sabian', 'SabianController', [
        'except' => 'show',
        'names' => [
            'index' => 'canvas.admin.sabian.index',
            'create' => 'canvas.admin.sabian.create',
            'store' => 'canvas.admin.sabian.store',
            'edit' => 'canvas.admin.sabian.edit',
            'update' => 'canvas.admin.sabian.update',
            'destroy' => 'canvas.admin.sabian.destroy',
        ],
    ]);

    /* Tag page routes. */
    Route::resource(RouteHelper::getAdminPrefix().'/tag', 'TagController', [
        'except' => 'show',
        'names' => [
            'index' => 'canvas.admin.tag.index',
            'create' => 'canvas.admin.tag.create',
            'store' => 'canvas.admin.tag.store',
            'edit' => 'canvas.admin.tag.edit',
            'update' => 'canvas.admin.tag.update',
            'destroy' => 'canvas.admin.tag.destroy',
        ],
    ]);

    /* Media library page routes. */
    Route::get(RouteHelper::getAdminPrefix().'/upload', 'UploadController@index')->name('canvas.admin.upload');
    Route::post(RouteHelper::getAdminPrefix().'/upload/file', 'UploadController@upload')->name('canvas.admin.fileup');
    \TalvBansal\MediaManager\Routes\MediaRoutes::get();

    /* Profile privacy page routes. */
    Route::get(RouteHelper::getAdminPrefix().'/profile/privacy', 'ProfileController@editPrivacy')->name('canvas.admin.profile.privacy');
    Route::resource(RouteHelper::getAdminPrefix(). '/profile', 'ProfileController', [
        'only' => ['index', 'update'],
        'names' => [
            'index' => 'canvas.admin.profile.index',
            'update' => 'canvas.admin.profile.update',
        ],
    ]);

    /* Search page routes. */
    Route::resource(RouteHelper::getAdminPrefix().'/search', 'SearchController', [
        'only' => ['index'],
        'names' => [
            'index' => 'canvas.admin.search.index',
        ],
    ]);

    /* Help page routes. */
    Route::get(RouteHelper::getAdminPrefix().'/help', 'HelpController@index')->name('canvas.admin.help');

    /* Admin-only accessible routes. */
    Route::group(['middleware' => 'checkIfAdmin'], function () {
        Route::resource(RouteHelper::getAdminPrefix().'/user', 'UserController', [
            'except' => 'show',
            'names' => [
                'index' => 'canvas.admin.user.index',
                'create' => 'canvas.admin.user.create',
                'store' => 'canvas.admin.user.store',
                'edit' => 'canvas.admin.user.edit',
                'update' => 'canvas.admin.user.update',
                'destroy' => 'canvas.admin.user.destroy',
            ],
        ]);

        /* User privacy page routes. */
        Route::get(RouteHelper::getAdminPrefix().'/user/{id}/privacy', 'UserController@privacy')->name('canvas.admin.user.privacy');
        Route::post(RouteHelper::getAdminPrefix().'/user/{id}/privacy', 'UserController@updatePassword')->name('canvas.admin.user.privacy');

        /* Tools page routes. */
        Route::get(RouteHelper::getAdminPrefix().'/tools', 'ToolsController@index')->name('canvas.admin.tools');
        Route::post(RouteHelper::getAdminPrefix().'/tools/reset_index', 'ToolsController@resetIndex')->name('canvas.admin.tools.reset_index');
        Route::post(RouteHelper::getAdminPrefix().'/tools/cache_clear', 'ToolsController@clearCache')->name('canvas.admin.tools.cache_clear');
        Route::post(RouteHelper::getAdminPrefix().'/tools/download_archive', 'ToolsController@handleDownload')->name('canvas.admin.tools.download_archive');
        Route::post(RouteHelper::getAdminPrefix().'/tools/enable_maintenance_mode', 'ToolsController@enableMaintenanceMode')->name('canvas.admin.tools.enable_maintenance_mode');
        Route::post(RouteHelper::getAdminPrefix().'/tools/disable_maintenance_mode', 'ToolsController@disableMaintenanceMode')->name('canvas.admin.tools.disable_maintenance_mode');

        /* Settings page routes. */
        Route::get(RouteHelper::getAdminPrefix().'/settings', '\App\Http\Controllers\Backend\SettingsController@index')->name('canvas.admin.settings');
        Route::post(RouteHelper::getAdminPrefix().'/settings', '\App\Http\Controllers\Backend\SettingsController@store')->name('canvas.admin.settings');
    });
});

