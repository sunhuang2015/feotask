@extends('tpl.master')

@section('content')
    {!! Form::model($employee,array(
          'route'=>['employee.update',$employee->id],
          'class'=>'form form-horizontal',
          'method'=>'put'
          )
    ) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group ">
                            <label for="" class="col-xs-2 control-label">姓名</label>

                            <div class="col-xs-4">
                                <input type="text" name="name" value="{{$employee->name}} " disabled>
                            </div>
                            <label for="" class="col-xs-2 control-label">工号</label>

                            <div class="col-xs-4">
                                <input type="text" name="number" value="{{$employee->number}}" disabled>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-xs-2 control-label">公司</label>

                            <div class="col-xs-4">
                                {!! Form::select('company_id',App\Company::lists('name','id'),$employee->company_id) !!}
                            </div>
                            <label for="" class="col-xs-2 control-label">成本中心</label>

                            <div class="col-xs-4">
                                <input type="text" name="costcent" value="{{$employee->costcent}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-xs-2 control-label">部门</label>

                            <div class="col-xs-4">
                                <input type="text" name="department_name" value="{{$employee->department_name}}">
                            </div>

                            <label for="" class="col-xs-2 control-label">状态</label>
                            <div class="col-xs-4">
                                {!! Form::select('status_id',App\EmployeeStatus::lists('name','id'),$employee->status_id) !!}
                            </div>
                        </div>
                        <div class="form-group has-error ">

                            <label for="" class="col-xs-2 control-label">级别</label>

                            <div class="col-xs-4">
                                {!! Form::select('level_id',App\EmployeeLevel::lists('name','id'),$employee->level_id) !!}
                            </div>
                            <label for="" class="col-sm-2 control-label">类别</label>

                            <div class="col-xs-4">
                                {!! Form::select('category_id',App\EmployeeCategory::lists('name','id'),$employee->category_id) !!}
                            </div>
                        </div>

                        <div class="form-group has-warning">


                            <label for="" class="col-xs-2 control-label">申请表</label>

                            <div class="col-xs-4">
                                {!! Form::file('attachment',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-xs-2 control-label">银行账号</label>

                            <div class="col-xs-10">
                                <input type="text" name="bank_account"  class="form-control" value="{{$employee->bank_account}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-xs-2 control-label">开户银行</label>

                            <div class="col-xs-10">
                                {!! Form::text('bank_info',$employee->bank_info,['class'=>'form-control']) !!}

                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2"></label>
                <a href="#modal-delete" role="button" class=" green btn btn-default" data-toggle="modal"> {{config('site.delete')}}</a>
                <button type="submit" class="btn btn-primary">{{config('site.save')}}</button>

            </div>
        </div>
    </div>
    {!! Form::close() !!}


    {{-- Confirm Delete --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title"> {{config('site.confirm')}} </h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i> &nbsp;
                        {{config('site.confirm-delete')}}
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/employee/{{$employee->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal"> {{config('site.close')}} </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> {{config('site.yes')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection