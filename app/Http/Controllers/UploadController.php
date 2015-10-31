<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Company;
use App\Department;
use App\Employee;

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

    public function department(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $date = Carbon::now()->format("Y_m_d");
            $path = base_path() . "/up/" . "Department/" . $date . "/";
            $ext = $request->file('attachment')->getClientOriginalExtension();
            $extmine = $request->file('attachment')->getClientMimeType();
            $exts = collect([
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'

            ]);
            if ($exts->contains($extmine)) {
                $request->file('attachment')->move($path, Carbon::now()->timestamp . "." . $ext);
                $filename = $path . Carbon::now()->timestamp . "." . $ext;
                $messages = $this->importDept($filename);

            } else {
                return back()->with('message', '文件格式不对');
            }


        }
        return back()->with('messages', $messages);
    }


    public function importDept($destfile)
    {

        $this->count['dept->success'] = 0;
        $this->count['dept->failed'] = 0;
        Excel::load($destfile, function ($reader) {
            $rules = [
                'name' => 'required|unique_with:departments,company_id,costcent',
                'company_id' => 'required|exists:companies,id',
                'costcent' => 'required'
            ];
            $sheetsCount = $reader->getSheetCount();

            for ($i = 0; $i < $sheetsCount; $i++) {
                $sheets = $reader->getSheet($i)->toArray();
                $company_name = $reader->getSheet($i)->getTitle();
                $dept['company_id'] = Company::where('name', $company_name)->value('id');
                $sheetCount = count($sheets);
                for ($j = 6; $j < $sheetCount; $j++) {
                    $dept['name'] = trim($sheets[$j][1]);
                    $dept['costcent'] = trim($sheets[$j][10]);
                    $dept['description'] = $dept['name'];
                    $dept_v = \Validator::make($dept, $rules);
                    if ($dept_v->passes()) {
                        Department::create($dept);
                        $this->count['dept->success'] += 1;
                    } else {
                        $this->count['dept->failed'] += 1;
                    }
                }
            }


            //END
        });
        return $this->count;
    }


    //CDMA List Upload

    public function cdma(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $date = Carbon::now()->format("Y_m_d");
            $path = base_path() . "/up/" . "CDMA/" . $date . "/";
            $ext = $request->file('attachment')->getClientOriginalExtension();
            $extmine = $request->file('attachment')->getClientMimeType();
            $exts = collect([
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'

            ]);
            if ($exts->contains($extmine)) {
                $request->file('attachment')->move($path, Carbon::now()->timestamp . "." . $ext);
                $filename = $path . Carbon::now()->timestamp . "." . $ext;
                // $messages=$this->importDept($filename);
                $messages = [];
            } else {
                return back()->with('message', '文件格式不对');
            }


        }
        return back()->with('messages', $messages);
    }


    /*
     *  Employee Upload Method
     */

    public function employee(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $date = Carbon::now()->format("Y_m_d");
            $path = base_path() . "/up/" . "EMPLOYEE/" . $date . "/";
            $ext = $request->file('attachment')->getClientOriginalExtension();
            $extmine = $request->file('attachment')->getClientMimeType();
            $exts = collect([
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'

            ]);
            if ($exts->contains($extmine)) {
                $request->file('attachment')->move($path, Carbon::now()->timestamp . "." . $ext);
                $filename = $path . Carbon::now()->timestamp . "." . $ext;
                $messages = $this->importDept($filename);
                $messages = $this->importEMP($filename);
                $messages = [];
            } else {
                return back()->with('message', '文件格式不对');
            }


        }
        return back()->with('messages', $messages);
    }


    public function importEMP($destfile)
    {

        /*
         *
         * $table->string('number')->unique();
            $table->integer('category_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('department_name');
            $table->string('costcenter');
            $table->string('bank_account')->nullable();
            $table->string("bank_info")->nullable();
            $table->string('name');
         */
        Excel::load($destfile, function ($reader) {
            $rules = [
                //
                'number' => 'required|unique:employees',
                'company_id' => 'required|exists:companies,id',
                'bank_account' => 'required|unique:employees',
                'phone_number' => 'required'
            ];
            $sheetsCount = $reader->getSheetCount();

            for ($i = 0; $i < $sheetsCount; $i++) {
                $sheets = $reader->getSheet($i)->toArray();
                $company_name = $reader->getSheet($i)->getTitle();
                $dept['company_id'] = Company::where('name', $company_name)->value('id');
                $sheetCount = count($sheets);
                for ($j = 6; $j < $sheetCount; $j++) {
                    // Get Department ID;
                    $employee['department_name'] = trim($sheets[$j][1]);
                    $employee['costcent'] = trim($sheets[$j][10]);
                    $employee['company_id'] = $dept['company_id'];

                    $employee['name'] = trim($sheets[$j][2]);
                    $employee['number'] = $sheets[$j][3];


                    $level_credit = trim($sheets[$j][6]);
                    if ($level_credit == '实报实销') {
                        $employee['level_id'] = 6;
                    } elseif (intval($level_credit) < 200) {
                        $employee['level_id'] = 1;
                    } elseif (intval($level_credit) > 400) {
                        $employee['level_id'] = 3;
                    } else {
                        $employee['level_id'] = 2;
                    }


                    $employee['phone_number'] = trim($sheets[$j][4]);
                    $employee['category_id'] = 1;
                    $employee['status_id'] = 1;
                    $employee['bank_info'] = trim($sheets[$j][9]);
                    $employee['bank_account'] = str_replace('-', '', trim($sheets[$j][8]));

                    $emp_v = \Validator::make($employee, $rules);
                    if ($emp_v->fails()) {

                    } else {
                        Employee::create($employee);
                    }
                }
            }


            //END
        });
    }
}
