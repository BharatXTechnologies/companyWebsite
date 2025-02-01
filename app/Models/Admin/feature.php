<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feature extends Model
{
    use HasFactory;
    protected $table = 'features';
    protected $fillable = ['name', 'icon', 'description'];

    function getFeature($id = null){
        if(is_null($id)){
            return feature::all();
        } else{
            return feature::find($id);
        }
    }

    function deleteFeature($id){
        return feature::destroy($id);
    }
}
