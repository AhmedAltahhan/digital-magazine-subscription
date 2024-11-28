<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate;

Gate::define('subscription.create', function(User $user) {
        $hasPermission = $user->permissions()->where('title', 'subscription.create')->first();
        return $hasPermission?true:false && $user->type === 'subscriber';
});
Gate::define('article.index', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'article.index')->first();
    return $hasPermission?true:false && $user->type === 'subscriber';
});
Gate::define('comment.create', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'comment.create')->first();
    return $hasPermission?true:false && $user->type === 'subscriber';
});

Gate::define('article.create', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'article.create')->first();
    return $hasPermission?true:false && $user->type === 'publisher';
});
Gate::define('magazine.create', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'magazine.create')->first();
    return $hasPermission?true:false && $user->type === 'publisher';
});

Gate::define('user.curd', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'user.curd')->first();
    return $hasPermission?true:false && $user->type === 'manager';
});
Gate::define('subscription.curd', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'subscription.curd')->first();
    return $hasPermission?true:false && $user->type === 'manager';
});
Gate::define('magazine.curd', function(User $user) {
    $hasPermission = $user->permissions()->where('title', 'magazine.curd')->first();
    return $hasPermission?true:false && $user->type === 'manager';
});
