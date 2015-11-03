@extends('tpl.master')

@section('content')
    {!! Form::open(
                   array(
                      'url'=>'tasklog',
                      'class'=>'form form-horizontal',
                      'files'=>true)
                       ) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" name="task_id" value="{!! $task->id !!}">
                        {{$task->subject}}
                        <div class="form-group has-warning">
                           <label for="" class="col-sm-2 control-label">TaskStep</label>
                           <div class="col-xs-4">
                              {!! Form::select('step_id',App\TaskStep::where('order','>',$order)->orderBy('order')->lists('name','id'), ['class'=>'form-control']) !!}
                           </div>
                        </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">remark</label>
                            <div class="col-xs-4">
                              {!! Form::textarea('remark','',['class'=>'form-control']) !!}
                             </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group has-warning">
                           <label for="" class="col-sm-2 control-label">Supplier</label>
                           <div class="col-xs-4">
                              {!! Form::select('supplier_id',App\Supplier::lists('name','id')) !!}
                           </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">上传附件</label>
                            <div class="col-xs-4">
                              {!! Form::file('attachment',['class'=>'form-control']) !!}
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2"></label>
                <a href="#modal-delete" role="button" class=" green btn btn-default" data-toggle="modal" onclick="goBack()"> 后退</a>
                <button type="submit" class="btn btn-primary">{{config('site.save')}}</button>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
后退

    {{-- Confirm Delete --}}

@endsection

@section('script')
    <script type="text/javascript">
        function goBack()
        {
            window.history.back()
        }
    </script>
@endsection