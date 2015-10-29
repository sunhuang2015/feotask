@extends('tpl.master')

@section('content')
    {!! Form::model($company,array(
           'route'=>['company.update',$company->id],
           'class'=>'form form-horizontal',
           'method'=>'put'
           )
     ) !!}
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-warning">
                <label for="" class="col-sm-2 control-label">名字</label>
                <div class="col-xs-8">
                    <input type="text" name="name" value="{{$company->name}}">
                </div>
            </div>
            <div class="form-group has-warning">
                <label for="" class="col-sm-2 control-label">{{config('site.description')}}</label>
                <div class="col-xs-8">
                    <input type="text" name="description" value="{{$company->description}}">
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
                    <form method="POST" action="/company/{{$company->id}}">
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