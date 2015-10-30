<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Carbon\Carbon;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tasks=Task::with(['company','step'])->orderBy('created_at','DESC')->get();

        return view('task.index',compact('tasks'));

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
    public function store(Requests\TaskCreateRequest $request)
    {
        //
        if($request->hasFile('attachment')){
            $data=$request->except(['_token','attachment']);
            $date=Carbon::now()->format("Y_m_d");
            $path=base_path()."/up/"."TASK/".$date."/";
            $ext=$request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->move($path,Carbon::now()->timestamp.".".$ext);
            $filename=$path.Carbon::now()->timestamp.".".$ext;
            $data['attachment']=$filename;
            $data['step_id']=1;
            $data['status_id']=1;
            //dd($data);
            $task=Task::create($data);

            return back();

        }


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
        $task=Task::find($id);

        return view('task.edit',compact('task'));
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
