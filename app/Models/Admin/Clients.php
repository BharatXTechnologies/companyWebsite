<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_name',
        'business_name',
        'address',
        'email',
        'phone',
        'city',
        'state',
        'country',
        'pin',
        'gst_no',
        'pan_no',
        'status',
    ];

    function getClientsData($id = null){
        if (is_null($id)) {
            return Clients::get();
        } else {
            return Clients::where('id', $id)->first(); 
        }
    }
}
