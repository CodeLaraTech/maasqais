<?php

namespace Modules\LMS\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StudentUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'student_users';

    protected $fillable = ['name', 'email', 'phone', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
