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
            $service = DB::table('services')->get();

            $featureIds = explode(',', $service->feature_ids);

            $features = DB::table('features')->whereIn('id', $featureIds)->get();
        } else{
            return service::find($id);
        }
    }

}
