<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
   protected $fillable = ['name', 'email', 'password', 'image', 'ip_address'];
   
}
