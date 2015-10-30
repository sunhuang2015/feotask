<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable=[
        'name',
        'number',
        'company_id',
        'department_name',
        'costcent',
        'category_id',
        'status_id',
        'email',
        'bank_info',
        'bank_account',
        'level_id'
    ];
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function status(){
        return $this->belongsTo('App\EmployeeStatus');
    }
}
