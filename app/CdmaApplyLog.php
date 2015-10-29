<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CdmaApplyLog extends Model
{
    //
    protected $fillable=[
        'cdma_apply_id',
        'cdma_status_id',
        'attachment'
    ];
}
