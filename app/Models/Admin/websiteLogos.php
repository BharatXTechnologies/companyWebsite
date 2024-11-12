<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class websiteLogos extends Model
{
    use HasFactory;
    protected $fillable = ['logo_title', 'logo_image', 'logo_status'];
}
