@extends('tpl.master')

@section('content')
    {{-- task Model start--}}

{!! Form::open(['class'=>'form form-horizontal',]) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group has-warning">
                            <label for="" class="col-xs-2 control-label">任务名称</label>

                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="name" value="{{$task->name}}" disabled>
                            </div>
                            <label for="" class="col-xs-2 control-label">申请人</label>

                            <div class="col-xs-4">
                                <input type="text" name="applicant" class="form-control" value="{{$task->applicant}}" disabled>
                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <label for="" class="col-xs-2 control-label">公司</label>

                            <div class="col-xs-4">
                                {!! Form::select('company_id',App\Company::lists('name','id'),$task->company_id,['class'=>'form-control col-xs-2','disabled']) !!}
                            </div>
                            <label for="" class="col-xs-2 control-label">成本中心</label>

                            <div class="col-xs-4">
                                <input type="text" name="costcent" class="form-control" value="{{$task->costcent}}" disabled>
                            </div>
                        </div>

                        <div class="form-group has-warning">
                            <label for="" class="col-xs-2 control-label">SNC</label>

                            <div class="col-xs-4">
                                <input type="text" name="task_no" class="form-control" value="{{$task->task_no}}" disabled>
                            </div>
                            <label for="" class="col-xs-2 control-label">分类</label>

                            <div class="col-xs-2">
                                {!! Form::select('category_id',App\TaskCategory::lists('name','id'),$task->category_id,['class'=>'form-control','disabled']) !!}
                            </div>

                        </div>

                        <div class="form-group has-warning">

                            <label for="" class="col-xs-2 control-label">附件</label>

                            <div class="col-xs-4">
                                <a href="/download/task/{{$task->id}}"><i class="fa fa-cloud-download fa-2x"></i></a>

                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <label for="" class="col-xs-2 control-label">状态</label>
                            <div class="col-xs-4">
                                {!!  Form::select('task_status_id',App\TaskStatus::lists('name','id'),$task->task_status_id,['class'=>'form-control','disabled'])!!}
                            </div>
                            <label for="" class="col-xs-2 control-label">电话号码</label>
                            <div class="col-xs-4">
                                <input type="text" name="phonenumber" value="{{$task->phonenumber}}" class="form-control" disabled >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-xs-2 control-label">简述</label>
                            <div class="col-xs-10">
                                {!! Form::text('subject',$task->subject,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-xs-2 control-label">简述</label>
                            <div class="col-xs-10">
                                {!! Form::textarea('subject',$task->reason,['class'=>'form-control']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-xs-2"></label>
                <a href="#modal-delete" role="button" class=" green btn btn-default" data-toggle="modal"> {{config('site.delete')}}</a>
                <button type="submit" class="btn btn-primary">{{config('site.save')}}</button>

            </div>
        </div>
    </div>
  {!! Form::close() !!}



    {{-- task Model End--}}
@endsection

@section('script')
@endsection