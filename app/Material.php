<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    //
    /*
     *  $table->string('code')->unique();
            $table->string('c_name');
            $table->string('e_name');
            $table->string('brand');
            $table->string('unit');
            $table->string('spec')->nullable();
     */
    use SoftDeletes;
    protected $fillable=[
        'code',
        'c_name',
        'e_name',
        'brand',
        'unit',
        'spec',
        'model'
    ];

    public function setCodeAttribute($code){
        $this->attributes['code']=strtoupper(trim($code));
    } public function setCnameAttribute($c_name){
        $this->attributes['c_name']=strtoupper(trim($c_name));
    }
}
