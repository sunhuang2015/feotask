<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CdmaApply;
use App\CdmaApplyLog;
class CdmaApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cdmas=CdmaApply::with(['company','CdmaStatus'])->orderBy('created_at','DESC')->get();
        return view('cdma.apply.index',compact('cdmas'));
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
    public function store(Requests\CdmaApplyRequest $request)
    {
        //
        $data=$request->except(['_token','attachment']);
        $data['attachment']="";
        if($request->hasFile('attachment')){

            $path=base_path('up/')."cdma/apply";
            $ext=$request->file('attachment')->getClientOriginalExtension();
            $filename=$request->get('employee_number').".".$ext;
            $request->file('attachment')->move($path,$filename);
            $data['attachment']=$path.$filename;
        }
        $data['cdma_status_id']=1;

        $cdmas=CdmaApply::create($data);
        $log=   ['cdma_apply_id'=>$cdmas->id,
            'cdma_status_id'=>$data['cdma_status_id'],
            'attachment'=>$data['attachment']
        ];
        CdmaApplyLog::create($log);

       return back();

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

        $cdma=CdmaApply::find($id);
        if($cdma->cdma_status_id<=2){
            return view('cdma.apply.edit',compact('cdma'));
        }
        else{
            return back()->with('message','已经完成<br>无法更新');
        }

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
        $cdma=CdmaApply::find($id);
        $data=$request->except(['_token','_method','attachment']);
        $data['attachment']="";
        if($request->hasFile('attachment')){

            $path=base_path('up/')."cdma/apply";
            $ext=$request->file('attachment')->getClientOriginalExtension();
            $filename=$request->get('employee_number')."_".$data['cdma_status_id'].".".$ext;
            $request->file('attachment')->move($path,$filename);
            $data['attachment']=$path.$filename;
        }

        $cdma->update($data);
        $log=   ['cdma_apply_id'=>$id,
            'cdma_status_id'=>$data['cdma_status_id'],
            'attachment'=>$data['attachment']
        ];
        CdmaApplyLog::create($log);
        return redirect()->to('cdma/apply');
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
