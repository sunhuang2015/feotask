<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable=['company_id','name','costcent','description'];

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
