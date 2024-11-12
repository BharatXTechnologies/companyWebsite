<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class websiteBanners extends Model
{
    use HasFactory;
    protected $fillable = ['banner_title', 'banner_image', 'banner_status'];
}
