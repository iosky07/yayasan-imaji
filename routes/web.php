<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ContentTypeController;
use App\Http\Controllers\Admin\ProjectBudgetController;
use App\Http\Controllers\Admin\RegulationController;
use App\Http\Controllers\Admin\StatusBudgetController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TypeBudgetController;
use App\Http\Controllers\Admin\TypeFinanceController;
use App\Http\Controllers\GalleryController;
//use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/', [SiteController::class, 'beranda'])->name('main-landing');
Route::get('/berita', [SiteController::class, 'blog'])->name('blog');
Route::get('/berita/{id}', [SiteController::class, 'blogShow'])->name('blog-show');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/peraturan', [SiteController::class, 'regulation'])->name('regulation');
Route::post('/subscribe', [SiteController::class, 'subscribe'])->name('subscribe');
Route::post('/aspirasi', [SiteController::class, 'aspiration'])->name('aspiration');

//Route::get('/', function () {
//    return view('welcome');
//    return view('a-guest-user.pages.site.landing-page');
//});
Route::get('/main', function () { //buat liat template laman utama
    return view('pages.page-main');
});
Route::get('/inner-page', function () { //buat liat template single page / inner page
    return view('template.inner-page');
});
//Route::get('/peraturan', function () { //buat liat peraturan
//    return view('pages.page-peraturan');
//});
//Route::get('/berita', function () { //buat liat berita
//    return view('pages.page-berita');
//});
//Route::get('/anggota', function () { //buat liat profil anggota
//    return view('pages.page-beritamenu');
//});
//[ 'middleware' => [],'prefix'=>'admin' ]
//Route::name('admin.')->middleware(['auth:sanctum', 'verified'])->prefix('admin/')->group(function() {
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum','web', 'verified'])->group(function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::resource('content', ContentController::class);
    Route::resource('content-type', ContentTypeController::class);
    Route::resource('project-budget', ProjectBudgetController::class);
    Route::resource('status-budget', StatusBudgetController::class);
    Route::resource('type-budget', TypeBudgetController::class);
    Route::resource('type-finance', TypeFinanceController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('tag', TagController::class);
//    Route::middleware(['checkRole:1']){}
    Route::get('/user', [ UserController::class, "index" ])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');


    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

});
