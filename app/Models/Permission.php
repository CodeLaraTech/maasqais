<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
   // App\Models\Permission.php
    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'permission_group_id');
    }

}
