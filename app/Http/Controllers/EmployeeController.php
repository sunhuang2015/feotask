<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EmployeeStatus;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=Employee::with(['company','status'])->orderBy('number','DESC')->get();

        return view('employee.index',compact('employees'));
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
        /*
         *  $table->string('number')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('company_id')->unsigned();
            $table->string('department_name')->nullable();
            $table->string('costcent')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('status_id')->unsigned();
         */
        $data=$request->except([
            '_token',
            'bankaccount',
            'bankinfo',
            'attachment',
            'level_id'
        ]);
        //dd($data);
        Employee::create($data);
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
        $employee=Employee::find($id);
        return view('employee.edit',compact('employee'));
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
        $employee=Employee::find($id);
        $data=$request->except([
            '_token',
            '_method',
            'bankaccount',
            'bankinfo',
            'attachment',
            'level_id'
        ]);
        $employee->update($data);

        return redirect()->to('employee');
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
        Employee::find($id)->delete();
        return redirect()->to('employee');
    }
}
