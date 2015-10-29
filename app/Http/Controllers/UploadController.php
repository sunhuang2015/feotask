<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Company;
use App\Department;
class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*
    *   Department Upload
    *
    *
    */

    public function department(Request $request){
        if($request->hasFile('attachment')){
            $date=Carbon::now()->format("Y_m_d");
            $path=base_path()."/up/"."Department/".$date."/";
            $ext=$request->file('attachment')->getClientOriginalExtension();
            $extmine=$request->file('attachment')->getClientMimeType();
            $exts=collect([
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'

            ]);
            if($exts->contains($extmine)){
                $request->file('attachment')->move($path,Carbon::now()->timestamp.".".$ext);
                $filename=$path.Carbon::now()->timestamp.".".$ext;
                $messages=$this->importDept($filename);

            }else{
                return back()->with('message','文件格式不对');
            }


        }
        return back()->with('messages',$messages);
    }


    public function importDept($destfile){

        $this->count['dept->success']=0;
        $this->count['dept->failed']=0;
        Excel::load($destfile,function($reader){
            $rules=[
                'name'=>'required|unique_with:departments,company_id,costcent',
                'company_id'=>'required|exists:companies,id',
                'costcent'=>'required'
            ];
            $sheetsCount=$reader->getSheetCount();

            for($i=0;$i<$sheetsCount;$i++){
                $sheets=$reader->getSheet($i)->toArray();
                $company_name=$reader->getSheet($i)->getTitle();
                $dept['company_id']=Company::where('name',$company_name)->value('id');
                $sheetCount=count($sheets);
                for($j=6;$j<$sheetCount;$j++){
                    $dept['name']=trim($sheets[$j][1]);
                    $dept['costcent']=trim($sheets[$j][10]);
                    $dept['description']=$dept['name'];
                    $dept_v=\Validator::make($dept,$rules);
                    if($dept_v->passes()){
                        Department::create($dept);
                        $this->count['dept->success']+=1;
                    }else{
                        $this->count['dept->failed']+=1;
                    }
                }
            }



            //END
        });
        return $this->count;
    }
}
