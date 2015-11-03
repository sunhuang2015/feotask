<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //

    protected $fillable=[
        'name',
        'email',
        'contact_person',
        'phone'
    ];

    public function tasklog(){
        return $this->hasMany(TaskLog::class);
    }
}
