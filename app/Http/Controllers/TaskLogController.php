<?php

namespace App\Http\Controllers;

use App\TaskLog;
use App\TaskStep;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Carbon\Carbon;
class TaskLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $task=Task::find($id);
        $order=TaskStep::find($task->step_id)->value('order');
        return view('tasklog.edit',compact('task'))->with('order',$order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->except(['_token','attachment']);
        if($request->hasFile('attachment')) {
            $data = $request->except(['_token', 'attachment']);
            $date = Carbon::now()->format("Y_m_d");
            $path = base_path() . "/up/" . "TASK/" . $date . "/";
            $ext = $request->file('attachment')->getClientOriginalExtension();
            $extmine = $request->file('attachment')->getClientMimeType();
            $request->file('attachment')->move($path, Carbon::now()->timestamp . "." . $ext);
            $filename = $path . Carbon::now()->timestamp . "." . $ext;


            $data['attachment'] = $filename;
        }
        $data['company_id']=Task::find($request->get('task_id'))->company->id;

        $tasklog=TaskLog::create($data);

        $task=$tasklog->task->update(['step_id'=>$data['step_id']]);
        //$task=$tasklog->task;
        // dd($task);
        return redirect()->to('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
