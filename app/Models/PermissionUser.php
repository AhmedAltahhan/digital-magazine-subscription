<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionUser extends Pivot
{
    protected $fillable = [
        'user_id',
        'permission_id',
    ];
}
