<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    //
    protected $fillable=[
        'name',
        'description'
    ];
    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
