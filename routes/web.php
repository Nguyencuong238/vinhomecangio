<?php

use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ChannelController;
use App\Http\Controllers\Backend\ExecutiveController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Front\AlbumCategoryController;
use App\Http\Controllers\Front\EventCategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\PostArchiveController;
use App\Http\Controllers\Front\PostCategoryController;
use App\Http\Controllers\Front\VideoCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\BlogController as FrontBlogController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\EventController as FrontEventController;
use App\Http\Controllers\Front\ProjectController as FrontProjectController;
use App\Http\Controllers\Front\VideoController as FrontVideoController;
use App\Http\Controllers\Front\AlbumController as FrontAlbumController;
use App\Http\Controllers\Front\PostTagController;
use App\Http\Controllers\Front\VoteProjectController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\DepartmentController as FrontDepartmentController;
use App\Http\Controllers\Front\ExecutiveController as FrontExecutiveController;
use App\Http\Controllers\Front\ActionNewsController;
use App\Http\Controllers\Front\UserMediaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RedirectOldPostController;
use App\Http\Middleware\Filter;
use App\Http\Middleware\IsAdmin;


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

Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('tong-quan', [HomeController::class, 'about'])->name('about');
Route::get('tin-tuc', [HomeController::class, 'news'])->name('news');
Route::get('tin-tuc/{post:slug}', [HomeController::class, 'newsDetail'])->name('news_detail');

Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');
Route::get('gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('tien-do', [HomeController::class, 'progress'])->name('progress');
Route::get('tien-ich', [HomeController::class, 'utility'])->name('utility');

//Route::get('register', [HomeController::class, 'register'])->name('register');

// Route::get('tin-tuc', [FrontPostController::class, 'index'])->name('front.posts.index');

// Route::get('su-kien/{slug}', [FrontEventController::class, 'show'])->name('front.events.show');
// Route::get('danh-muc-su-kien/{slug}', EventCategoryController::class)->name('eventCategory');

// Route::get('video', [FrontVideoController::class, 'index'])->name('front.videos.index');
// Route::get('video/getSearch', [FrontVideoController::class, 'getSearch'])->name('getSearch');
// Route::get('video/{id}', [FrontVideoController::class, 'show'])->name('front.videos.show');
// Route::get('danh-muc-video/{slug}', VideoCategoryController::class)->name('videoCategory');
// Route::get('video-thuoc-category/{categoryId}', [VideoCategoryController::class, 'getDatabyAjax'])->name('getDatabyAjax');

// Route::get('gallery', [FrontAlbumController::class, 'index'])->name('front.albums.index');
// Route::post('gallery', [FrontAlbumController::class, 'search'])->name('front.albums.search');
// Route::get('gallery/{name}', [FrontAlbumController::class, 'show'])->name('front.albums.show');
// Route::get('danh-muc-gallery/{name}', AlbumCategoryController::class)->name('albumCategory');

// Route::get('user-album', [FrontAlbumController::class, 'userAlbum'])->name('user-album.index');
// Route::post('user-album', [FrontAlbumController::class, 'store'])->name('user-album.store');
// Route::get('user-album/{id}', [FrontAlbumController::class, 'edit'])->name('user-album.edit');
// Route::post('user-album/{id}', [FrontAlbumController::class, 'update'])->name('user-album.update');
// Route::delete('user-album/delete/{id}', [FrontAlbumController::class, 'delete'])->name('user-album.delete');

// Route::get('user-video', [FrontVideoController::class, 'userVideo'])->name('user-video.index');
// Route::post('user-video', [FrontVideoController::class, 'store'])->name('user-video.store');
// Route::get('user-video/{id}', [FrontVideoController::class, 'edit'])->name('user-video.edit');
// Route::post('user-video/{id}', [FrontVideoController::class, 'update'])->name('user-video.update');
// Route::delete('user-video/delete/{id}', [FrontVideoController::class, 'delete'])->name('user-video.delete');

// Route::post('du-an/{project}/vote', VoteProjectController::class)->name('front.projects.vote');


// Route::get('danh-muc/{slug}', PostCategoryController::class)->name('postCategory');

// Route::get('cong-doan/{slug}_{id}', [FrontDepartmentController::class, 'show'])->name('front.department.show');



Route::get('gioi-thieu', [FrontPageController::class, 'about'])->name('front.pages.about');
Route::get('dich-vu', [FrontPageController::class, 'service'])->name('front.pages.service');
Route::get('doi-tac', [FrontPageController::class, 'partner'])->name('front.pages.partner');


// Route::get('the/{slug}', PostTagController::class)->name('postTag');

// Route::get('archive/{year}/{month}', PostArchiveController::class)->name('postArchive');
Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters');

// Route::post('post/review', [FrontEventController::class, 'postReview'])->name('postReview');

Route::view('/user/profile', 'profile.show')->name('profile.show')->middleware(['auth', 'verified']);

// Route::view('/user/dashboard', 'front.user.dashboard')->name('user.dashboard')->middleware(['auth', 'verified']);
// Route::get('/user/department', [FrontDepartmentController::class, 'index'])->name('user.department')->middleware(['auth', 'verified']);
// Route::post('/user/department', [FrontDepartmentController::class, 'save'])->name('user.department-save')->middleware(['auth', 'verified']);

// Route::get('/ban-dieu-hanh', [FrontExecutiveController::class, 'index'])->name('executives.index')->middleware(['auth', 'verified']);
// Route::post('/executives/store', [FrontExecutiveController::class, 'store'])->name('executives.store')->middleware(['auth', 'verified']);
// Route::get('/ban-dieu-hanh/{id}', [FrontExecutiveController::class, 'edit'])->name('executives.edit')->middleware(['auth', 'verified']);
// Route::post('/executives/update', [FrontExecutiveController::class, 'update'])->name('executives.update')->middleware(['auth', 'verified']);
// Route::delete('/executives/delete/{id}', [FrontExecutiveController::class, 'delete'])->name('executives.delete')->middleware(['auth', 'verified']);

// Route::get('/action-news', [ActionNewsController::class, 'index'])->name('action-news.index')->middleware(['auth', 'verified']);
// Route::get('/action-news/create', [ActionNewsController::class, 'create'])->name('action-news.create')->middleware(['auth', 'verified']);
// Route::post('/action-news/store', [ActionNewsController::class, 'store'])->name('action-news.store')->middleware(['auth', 'verified']);
// Route::get('/action-news/edit/{id}', [ActionNewsController::class, 'edit'])->name('action-news.edit')->middleware(['auth', 'verified']);
// Route::post('/action-news/update/{id}', [ActionNewsController::class, 'update'])->name('action-news.update')->middleware(['auth', 'verified']);
// Route::delete('/action-news/delete/{id}', [ActionNewsController::class, 'delete'])->name('action-news.delete')->middleware(['auth', 'verified']);

Route::prefix('backend')
	->middleware(['auth', 'verified', IsAdmin::class])
	->group(function() {
		Route::get('/dashboard', [BackendHomeController::class, 'index'])->name('dashboard');

		Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
		Route::resource('posts', PostController::class);
		Route::resource('blogs', BlogController::class);

		Route::resource('tags', TagController::class);
		Route::resource('categories', CategoryController::class);
		Route::resource('pages', PageController::class);
		Route::resource('banners', BannerController::class);
		Route::resource('videos', VideoController::class);

		Route::resource('users', UserController::class);
		Route::resource('roles', RoleController::class);

		Route::get('/projects/search', [ProjectController::class, 'search'])->name('projects.search');
		Route::resource('projects', ProjectController::class);
		Route::resource('locations', ProjectController::class);

        Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
        Route::resource('events', EventController::class);

		Route::resource('channels', ChannelController::class);
		Route::resource('partners', PartnerController::class);

		Route::post('change-date', [ChannelController::class, 'changeDate'])->name('change-date');

        Route::get('/notifications/search', [NotificationController::class, 'search'])->name('notifications.search');
        Route::resource('notifications', NotificationController::class);

        Route::get('/gallery/search', [AlbumController::class, 'search'])->name('albums.search');
        Route::resource('gallery', AlbumController::class);
		Route::get('setting/home', [SettingController::class, 'home'])->name('setting.home');
		Route::post('setting/home', [SettingController::class, 'saveHome'])->name('setting.home.save');

		Route::get('newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
		Route::get('newsletters/create', [NewsletterController::class, 'create'])->name('newsletters.create');


		Route::mediaLibrary();
	});

Route::get('glide/{path}', ImageController::class)->where('path', '.+');

Route::get('/{slug}.{id}', RedirectOldPostController::class);


Route::get('/doanh-nghiep/{slug}', [FrontProjectController::class, 'show'])->name('front.projects.show')
->where(['slug' => '[0-9A-Za-z\-]+', 'id' => '[0-9]+']);

Route::get('/{slug}', [FrontPostController::class, 'show'])->middleware(Filter::class)->name('front.posts.show')
->where(['slug' => '[0-9A-Za-z\-]+', 'id' => '[0-9]+']);

Route::get('/{slug}-g{id}', [FrontBlogController::class, 'show'])->middleware(Filter::class)->name('front.blogs.show')
->where(['slug' => '[0-9A-Za-z\-]+', 'id' => '[0-9]+']);
Route::resource('department', DepartmentController::class);
Route::resource('executive', ExecutiveController::class);
// Route::resource('posts', PostController::class);