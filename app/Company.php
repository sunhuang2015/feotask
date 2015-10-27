<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable=['name','code','remark'];
    protected $table='companies';

    public function department(){
        return $this->hasMany('App\Departments');
    }

    public function setNameAttribute($name){
        $this->attributes['name']=trim($name);
    }
}
