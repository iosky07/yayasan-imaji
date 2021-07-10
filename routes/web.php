<?php

use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\ContentTypeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\ProjectBudgetController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SpjController;
use App\Http\Controllers\Admin\StatusBudgetController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TypeBudgetController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/', [SiteController::class, 'beranda'])->name('main-landing');

Route::get('/konten/{slug}', [SiteController::class, 'blogShow'])->name('blog-show');
Route::get('/galeri', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/tentang-kami', [SiteController::class, 'about'])->name('about');
Route::post('/subscribe', [SiteController::class, 'subscribe'])->name('subscribe');
Route::post('/aspirasi', [SiteController::class, 'aspiration'])->name('aspiration');
Route::get('/{slug}', [SiteController::class, 'blog'])->name('blog');

Route::get('/main', function () { //buat liat template laman utama
    return view('pages.page-main');
});

//Route::name('admin.')->middleware(['auth:sanctum', 'verified'])->prefix('admin/')->group(function() {
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum', 'web', 'verified'])->group(function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');
    Route::resource('content', ContentController::class);
    Route::resource('content-type', ContentTypeController::class);
    Route::resource('project-budget', ProjectBudgetController::class);
    Route::resource('status-budget', StatusBudgetController::class);
    Route::resource('type-budget', TypeBudgetController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('budget', BudgetController::class);
    Route::resource('report', ReportController::class);
    Route::resource('finance', FinanceController::class);
    Route::resource('spj', SpjController::class);
    Route::resource('instagram', InstagramController::class);
    Route::resource('subscribe', SubscribeController::class);
//    Route::middleware(['checkRole:1']){}
    Route::get('/user', [UserController::class, "index"])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');

    Route::get('/download-file/{type}/{id}', function ($type,$id) {
        if ($type=='budget') {
            return response()->download(storage_path("app/public/" . \App\Models\Budget::find($id)->file));
        }else if ($type=='spj') {
            return response()->download(storage_path("app/public/" . \App\Models\Spj::find($id)->file));
        }
        else if ($type=='rab') {
            return response()->download(storage_path("app/public/" . \App\Models\Finance::find($id)->file));
        }else if ($type=='report') {
            return response()->download(storage_path("app/public/" . \App\Models\Report::find($id)->file));
        }
    })->name('download');

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
