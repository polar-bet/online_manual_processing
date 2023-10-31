<?php

use Illuminate\Support\Facades\Cookie;
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
Route::middleware('auth')->group(function () {
    Route::get("/logout", function () {
//        cookie()->forget('email');
//        cookie()->forget('password');
        auth("web")->logout();
        return redirect()->route("home.index");
    })->name("logout");
});


Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['namespace' => 'Home'], function () {
        Route::get('/', IndexController::class)->name('home.index');
    });
    Route::group(['namespace' => 'Account', 'prefix' => 'account', 'middleware' => 'guest'], function () {
        Route::group(['namespace' => 'Registration', 'prefix' => 'registration'], function () {
            Route::post('/', StoreController::class)->name('account.registration.store');
        });
        Route::group(['namespace' => 'Authorization', 'prefix' => 'authorization'], function () {
            Route::post('/', StoreController::class)->name('account.authorization.store');
        });
        Route::group(['namespace' => 'Password'], function () {
            Route::group(['namespace' => 'Forgot', 'prefix' => 'forgot_password'], function () {
                Route::get('/', IndexController::class)->name('account.password.forgot.index');
                Route::post('/', StoreController::class)->name('account.password.forgot.store');
            });
            Route::group(['namespace' => 'Reset', 'prefix' => 'reset_password'], function () {
                Route::get('/{token}', IndexController::class)->name('account.password.reset.index');
                Route::patch('/{token}', UpdateController::class)->name('account.password.reset.update');
            });
        });
        Route::get('/', IndexController::class)->name('account.index');
    });
    Route::group(['namespace' => 'Forum', 'prefix' => 'forum'], function () {
        Route::group(['namespace' => 'Theme', 'prefix' => 'theme'], function () {
            Route::get('/', IndexController::class)->name('forum.theme.index');
            Route::get('/create', CreateController::class)->name('forum.theme.create')->middleware('auth');
            Route::post('/create', StoreController::class)->name('forum.theme.store');
            Route::get('/{theme}', ShowController::class)->name('forum.theme.show')->middleware('visit');
        });
    });

    Route::group(['namespace' => 'Reference', 'prefix' => 'reference'], function () {
        Route::group(['namespace' => 'Overview'], function () {
            Route::get('/overview', IndexController::class)->name('reference.overview.index');
        });
        Route::group(['namespace' => 'People'], function () {
            Route::get('/people', IndexController::class)->name('reference.people.index');
        });
    });
    Route::group(['namespace' => 'Documentation', 'prefix' => 'documentation'], function () {
        Route::get('/', IndexController::class)->name('documentation.index');
        Route::get('/{article}', ShowController::class)->name('documentation.show');
        Route::group(['namespace' => 'Method', 'prefix' => 'method'], function () {
            Route::get('/{method}', ShowController::class)->name('documentation.method.show');
        });
    });
    Route::group(['namespace' => 'Example', 'prefix' => 'examples'], function () {
        Route::get('/', IndexController::class)->name('example.index');
        Route::get('/{article}', ShowController::class)->name('example.show');
    });
    Route::group(['namespace' => 'UserOffice', 'prefix' => 'user_office', 'middleware' => 'auth'], function () {
        Route::get('/', IndexController::class)->name('user-office.index');
        Route::patch('/{user}', UpdateController::class)->name('user-office.update');
    });
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::group(['namespace' => 'Documentation', 'prefix' => 'documentation'], function () {
            Route::group(['namespace' => 'Section', 'prefix' => 'sections'], function () {
                Route::get('/', IndexController::class)->name('admin.documentation.section.index');
                Route::get('/create', CreateController::class)->name('admin.documentation.section.create');
                Route::post('/create', StoreController::class)->name('admin.documentation.section.store');
                Route::get('/edit/{section}', EditController::class)->name('admin.documentation.section.edit');
                Route::patch('/edit/{section}', UpdateController::class)->name('admin.documentation.section.update');
                Route::delete('/delete/{section}', DeleteController::class)->name('admin.documentation.section.delete');
            });

            Route::group(['namespace' => 'Type', 'prefix' => 'types'], function () {
                Route::get('/', IndexController::class)->name('admin.documentation.type.index');
                Route::get('/create', CreateController::class)->name('admin.documentation.type.create');
                Route::post('/create', StoreController::class)->name('admin.documentation.type.store');
                Route::get('/edit/{type}', EditController::class)->name('admin.documentation.type.edit');
                Route::patch('/edit/{type}', UpdateController::class)->name('admin.documentation.type.update');
                Route::delete('/delete/{type}', DeleteController::class)->name('admin.documentation.type.delete');
            });
            Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
                Route::get('/', IndexController::class)->name('admin.documentation.article.index');
                Route::get('/create', CreateController::class)->name('admin.documentation.article.create');
                Route::post('/create', StoreController::class)->name('admin.documentation.article.store');
                Route::get('/{article}', ShowController::class)->name('admin.documentation.article.show');
                Route::get('/edit/{article}', EditController::class)->name('admin.documentation.article.edit');
                Route::patch('/edit/{article}', UpdateController::class)->name('admin.documentation.article.update');
                Route::delete('/delete/{article}', DeleteController::class)->name('admin.documentation.article.delete');
            });

            Route::group(['namespace' => 'Method', 'prefix' => 'methods'], function () {
                Route::get('/', IndexController::class)->name('admin.documentation.method.index');
                Route::get('/{method}', ShowController::class)->name('admin.documentation.method.show');
                Route::post('/create', StoreController::class)->name('admin.documentation.method.store');
                Route::get('method/create', CreateController::class)->name('admin.documentation.method.create');
                Route::get('/edit/{method}', EditController::class)->name('admin.documentation.method.edit');
                Route::patch('/edit/{method}', UpdateController::class)->name('admin.documentation.method.update');
                Route::delete('/delete/{method}', DeleteController::class)->name('admin.documentation.method.delete');
            });
        });
        Route::group(['namespace' => 'Example', 'prefix' => 'examples'], function () {
            Route::group(['namespace' => 'Section', 'prefix' => 'sections'], function () {
                Route::get('/', IndexController::class)->name('admin.example.section.index');
                Route::get('/create', CreateController::class)->name('admin.example.section.create');
                Route::post('/create', StoreController::class)->name('admin.example.section.store');
                Route::get('/edit/{section}', EditController::class)->name('admin.example.section.edit');
                Route::patch('/edit/{section}', UpdateController::class)->name('admin.example.section.update');
                Route::delete('/delete/{section}', DeleteController::class)->name('admin.example.section.delete');
            });
            Route::group(['namespace' => 'Type', 'prefix' => 'types'], function () {
                Route::get('/', IndexController::class)->name('admin.example.type.index');
                Route::get('/create', CreateController::class)->name('admin.example.type.create');
                Route::post('/create', StoreController::class)->name('admin.example.type.store');
                Route::get('/edit/{type}', EditController::class)->name('admin.example.type.edit');
                Route::patch('/edit/{type}', UpdateController::class)->name('admin.example.type.update');
                Route::delete('/delete/{type}', DeleteController::class)->name('admin.example.type.delete');
            });
            Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function () {
                Route::get('/', IndexController::class)->name('admin.example.article.index');
                Route::get('/create', CreateController::class)->name('admin.example.article.create');
                Route::post('/create', StoreController::class)->name('admin.example.article.store');
                Route::get('/{article}', ShowController::class)->name('admin.example.article.show');
                Route::get('/edit/{article}', EditController::class)->name('admin.example.article.edit');
                Route::patch('/edit/{article}', UpdateController::class)->name('admin.example.article.update');
                Route::delete('/delete/{article}', DeleteController::class)->name('admin.example.article.delete');
            });
        });

        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', IndexController::class)->name('admin.user.index');
            Route::get('/edit/{user}', EditController::class)->name('admin.user.edit');
            Route::patch('/edit/{user}', UpdateController::class)->name('admin.user.update');
            Route::delete('/delete/{user}', DeleteController::class)->name('admin.user.delete');
        });
        Route::group(['namespace' => 'Role', 'prefix' => 'roles'], function () {
            Route::get('/', IndexController::class)->name('admin.role.index');
            Route::get('/create', CreateController::class)->name('admin.role.create');
            Route::post('/create', StoreController::class)->name('admin.role.store');
            Route::get('/edit/{role}', EditController::class)->name('admin.role.edit');
            Route::patch('/edit/{role}', UpdateController::class)->name('admin.role.update');
            Route::delete('/delete/{role}', DeleteController::class)->name('admin.role.delete');
        });
        Route::group(['namespace' => 'Theme', 'prefix' => 'themes'], function () {
            Route::get('/', IndexController::class)->name('admin.theme.index');
            Route::get('/create', CreateController::class)->name('admin.theme.create');
            Route::post('/create', StoreController::class)->name('admin.theme.store');
            Route::get('/{theme}', ShowController::class)->name('admin.theme.show');
            Route::get('/edit/{theme}', EditController::class)->name('admin.theme.edit');
            Route::patch('/edit/{theme}', UpdateController::class)->name('admin.theme.update');
            Route::delete('/delete/{theme}', DeleteController::class)->name('admin.theme.delete');
        });
        Route::get('/', IndexController::class)->name('admin.index');

    });
});

