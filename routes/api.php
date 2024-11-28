<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Manager\MagazineController as ManagerMagazineController;
use App\Http\Controllers\Api\Manager\PaymentController;
use App\Http\Controllers\Api\Manager\SubscriptionController as ManagerSubscriptionController;
use App\Http\Controllers\Api\Manager\UserController;
use App\Http\Controllers\Api\publisher\ArticleController as PublisherArticleController;
use App\Http\Controllers\Api\publisher\MagazineController as PublisherMagazineController;
use App\Http\Controllers\Api\Subscriber\ArticleController;
use App\Http\Controllers\Api\Subscriber\CommentController;
use App\Http\Controllers\Api\Subscriber\MagazineController;
use App\Http\Controllers\Api\Subscriber\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'Login']);
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/add_subscription', [SubscriptionController::class, 'create'])->middleware('can:subscription.create');
    Route::get('/show_article', [ArticleController::class, 'index'])->middleware('can:article.index');
    Route::post('/add_comment', [CommentController::class, 'create'])->middleware('can:comment.create');

    Route::post('/add_magazine', [PublisherMagazineController::class, 'create'])->middleware('can:magazine.create');
    Route::post('/add_article', [PublisherArticleController::class, 'create'])->middleware('can:article.create');

    Route::apiResource('users',UserController::class)->middleware('can:user.curd');
    Route::apiResource('subscriptions',ManagerSubscriptionController::class)->middleware('can:subscription.curd');
    Route::apiResource('magazins',ManagerMagazineController::class)->middleware('can:magazine.curd');
    Route::get('/show_payments', [PaymentController::class, 'index'])->middleware('can:subscription.curd');
});
