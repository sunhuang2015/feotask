@extends('tpl.master')

@section('content')
    {!! Form::model($cdma,array(
          'route'=>['cdma.apply.update',$cdma->id],
          'class'=>'form form-horizontal',
          'method'=>'put'
          )
    ) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group has-warning">
                            <label for="" class="col-sm-2 control-label">姓名</label>

                            <div class="col-xs-4">
                                <input type="text" name="employee_name" value="{{$cdma->employee_name}}">
                            </div>
                            <label for="" class="col-sm-2 control-label">工号</label>

                            <div class="col-xs-4">
                                <input type="text" name="employee_number" value="{{$cdma->employee_number}}">
                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <label for="" class="col-sm-2 control-label">公司</label>

                            <div class="col-xs-4">
                                {!! Form::select('company_id',App\Company::lists('name','id'),$cdma->company_id) !!}
                            </div>
                            <label for="" class="col-sm-2 control-label">部门</label>

                            <div class="col-xs-4">
                                <input type="text" name="department_name" value="{{$cdma->department_name}}">
                            </div>
                        </div>

                        <div class="form-group has-warning">
                            <label for="" class="col-sm-2 control-label">邮件</label>

                            <div class="col-xs-4">
                                <input type="text" name="employee_email" value="{{$cdma->email}}">
                            </div><label for="" class="col-sm-2 control-label">身份证</label>

                            <div class="col-xs-4">
                                <input type="text" name="cid" value="{{$cdma->cid}}">
                            </div>
                        </div>

                        <div class="form-group has-warning">
                            <label for="" class="col-sm-2 control-label">SNC</label>

                            <div class="col-xs-4">
                                <input type="text" name="snc" value="{{$cdma->snc}}">
                            </div>
                            <label for="" class="col-sm-2 control-label">附件</label>

                            <div class="col-xs-4">
                                {!! Form::file('attachment') !!}

                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <label for="" class="col-sm-2 control-label">状态</label>
                            <div class="col-xs-4">
                                {!!  Form::select('cdma_status_id',App\CdmaStatus::where("id",'>',$cdma->cdma_status_id)->lists('name','id'))!!}
                            </div>
                            <label for="" class="col-sm-2 control-label">电话号码</label>
                            <div class="col-xs-4">
                                <input type="text" name="phonenumber" >
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
                    <form method="POST" action="/cdma/apply/{{$cdma->id}}">
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