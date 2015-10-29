<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //
    
   use SoftDeletes;
    protected $fillable=['name','code','remark','description'];
    protected $table='companies';

    public function department(){
        return $this->hasMany('App\Departments');
    }

    public function setNameAttribute($name){
        $this->attributes['name']=trim($name);
    }
}
