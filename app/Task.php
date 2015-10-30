<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    /*
     *   $table->integer('category_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('applicant')->index();
            $table->string('costcent')->index();
            $table->string('task_no');
            $table->string('subject');
            $table->string('reason');
            $table->text('remark')->nullable();
     */
    protected $fillable=[
        'category_id',
        'step_id',
        'status_id',
        'company_id',
        'name',
        'costcent',
        'subject',
        'applicant',
        'reason',
        'task_no',
        'remark'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function step(){
        return $this->belongsTo('App\TaskStep');
    }
}
