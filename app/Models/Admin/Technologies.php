<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technologies extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'technologies';
    protected $fillable = ['technology_name', 'technology_icon', 'technology_description', 'technology_status'];

    public function getTechnologies($id = null){
        if(is_null($id)){
            return Technologies::all();
        }else{
            return Technologies::find($id);
        }
    }
}
