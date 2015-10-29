<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CdmaApply extends Model
{
    //

    protected $fillable=[
        'employee_number',
        'employee_name',
        'employee_email',
        'department_name',
        'company_id',
        'attachment',
        'snc',
        'cid',
        'cdma_status_id',
        'phonenumber'
    ];


    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function CdmaStatus(){
        return $this->belongsTo('App\CdmaStatus');
    }
}
