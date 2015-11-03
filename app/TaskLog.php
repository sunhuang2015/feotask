<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    //

    /*
     *  $table->integer('task_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->string('task_file')->nullable();
            $table->string('remark')->nullable();
     */
    protected $fillable=[
        'task_id',
        'company_id',
        'step_id',
        'task_file',
        'remark'
    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }
}
