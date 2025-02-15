<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class service extends Model
{
    use HasFactory;
    protected $table ='services';  
    protected $fillable = ['name', 'icon', 'image', 'small_desc', 'full_desc', 'feature_ids'];

    function getService($id = null){
        if(is_null($id)){
            return service::get();
        } else{
            return service::find($id);
        }
    }

    function getServiceByName($serviceName){
        return service::where('name', $serviceName)->first();
    }

    function getActiveServices(){
        return service::where('status', 1)->get();
    }

}
