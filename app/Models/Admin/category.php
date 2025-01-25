<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];
    use HasFactory;

    function getCategory($id = null){
        if(is_null($id)){
            return category::all();
        }else{
            return category::find($id);
        }
    }

    function deleteCategory($id){
        return category::destroy($id);
    }
}
