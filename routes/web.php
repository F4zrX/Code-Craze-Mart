<?php

use Illuminate\Support\Facades\Route;

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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

Route::get('/', [FrontController::class, 'index'])->name('landing.index');
Route::get('/browse', [FrontController::class, 'browse'])->name('landing.browse');
Route::get('/browse/category/{category}', [FrontController::class, 'browseByCategory'])->name('landing.browse.kategori');
Route::get('/browse/sort/name', [FrontController::class, 'sortByName'])->name('browse.sortByName');
Route::get('/browse/sort/price', [FrontController::class, 'sortByPrice'])->name('browse.sortByPrice');
Route::get('/browse/sortbypricelowtohigh', [FrontController::class, 'sortByPriceLowToHigh'])->name('browse.sortbypricelowtohigh');
Route::post('/storetrans', [FrontController::class, 'storetrans'])->name('landing.storetrans');
Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [FrontController::class, 'checkout'])->name('checkout.process');
Route::get('/payment/success', [FrontController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/detailtrans', [FrontController::class, 'detailtrans'])->name('landing.detailtrans');
Route::get('/cart', [FrontController::class, 'cart'])->name('landing.cart');
Route::post('/cartup/{id}', [FrontController::class, 'cartup'])->name('cart.update');
Route::get('/detail', [FrontController::class, 'detail'])->name('landing.detail');
Route::get('/detail/{id}', [FrontController::class, 'detail'])->name('landing.detail.id'); // Changed name to 'landing.detail.id'
Route::get('/wishlist', [FrontController::class, 'wishlist'])->name('landing.wishlist'); 
Route::get('/library', [FrontController::class, 'library'])->name('landing.library');
Route::get('/librarydetails', [FrontController::class, 'librarydetails'])->name('landing.librarydetails');
Route::delete('/wishlist/{id}', [FrontController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/generate-random-number', [FrontController::class, 'generateRandomNumber'])->name('generate.random.number');


Route::middleware('auth')->group(function() {
    Route::get('/profile', [FrontController::class, 'profile'])->name('landing.profile');
    Route::patch('/profile/image', [FrontController::class, 'upload'])->name('upload');
    Route::post('/cart', [FrontController::class, 'storecart'])->name('landing.store');
    Route::delete('/cart/{cart}', [FrontController::class, 'delete'])->name('cart.delete');
    Route::get('/history', [FrontController::class, 'history'])->name('landing.history');
    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
    Route::post('/wishlist/add/{game}', [FrontController::class, 'addToWishlist'])->name('wishlist.add');
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [UserController::class, 'resendVerificationEmail'])->name('verification.resend');
});
    
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/games', [GameController::class, 'index'])->name('game.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/game/{game}', [GameController::class, 'destroy'])->name('games.destroy');
    Route::get('/sliders', [GameController::class, 'indexSlider'])->name('game.indexslide');
    Route::get('/sliders/create', [GameController::class, 'createSlider'])->name('games.slidecreate');
    Route::post('/sliders', [GameController::class, 'storeSlider'])->name('sliders.store');
    Route::delete('slider/{id}', [GameController::class, 'deleteSlider'])->name('slider.delete');
    Route::get('/logout', [GameController::class, 'gamelogout'])->name('logoutL');
    Route::get('/kategori', [GameController::class, 'kindex'])->name('game.kindex');
    Route::get('/game/kcreate', [GameController::class, 'kcreate'])->name('game.kategori.kcreate');
    Route::post('/game/kstore', [GameController::class, 'kstore'])->name('kategori.kstore');
    Route::delete('/kategori/{id}', [GameController::class, 'kdelete'])->name('kategori.kdelete');
    Route::post('/midtrans-callback', [GameController::class, 'handleCallback']);
    Route::get('/transactions', [GameController::class, 'showTransactions'])->name('game.orderPages');
    Route::get('/transactions/{id}/edit', 'GameController@editTransaction')->name('transactions.edit');
    Route::put('/transactions/{id}', 'GameController@updateTransaction')->name('transactions.update');
    Route::delete('/transactions/{id}', 'GameController@deleteTransaction')->name('transactions.delete');
    Route::get('/admin/users', 'GameController@showUsers')->name('admin.users');
    Route::get('/admin/users/{user}/edit', [GameController::class, 'edituser'])->name('user.edit');
    Route::put('/admin/users/{user}', [GameController::class, 'updateuser'])->name('user.update');
    Route::put('/users/{user}/validate', 'UserController@validateUser')->name('user.validate');
    Route::delete('/admin/users/{user}', [GameController::class, 'destroyuser'])->name('user.destroy');

});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/proses', [UserController::class, 'proses'])->name('proses');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/prosesL', [UserController::class, 'prosesL'])->name('prosesL');
Route::post('/logout', [FrontController::class, 'logout'])->name('logout');

Route::get('/send', [MailController::class, 'index']);
Route::post('/move-to-library', [MailController::class, 'moveToLibrary'])->name('moveToLibrary');
Route::get('/forget-password', [MailController::class, 'forgetPasswordForm'])->name('forget.password');
Route::post('/forget-password', [MailController::class, 'sendResetLink'])->name('forget.password.post');
Route::get('/reset-password/{token}', [MailController::class, 'resetPasswordForm'])->name('reset.password');
Route::post('/reset-password', [MailController::class, 'resetPassword'])->name('reset.password.post');


// User routes
Route::middleware(['auth', 'checkrole:user'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});

// Protect the admin routes with the 'admin' middleware
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/chat', [ChatController::class, 'adminIndex'])->name('admin.chat.index');
    Route::get('/admin/chat/{userId}', [ChatController::class, 'showChat'])->name('admin.chat.show');
    Route::post('/admin/chat/{userId}', [ChatController::class, 'sendMessages'])->name('admin.chat.send');
});


