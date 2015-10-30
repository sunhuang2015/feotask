@extends('tpl.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <a href="#department_model" role="button" class=" green btn btn-default" data-toggle="modal">New</a>
            <a href="#department_upload_model" role="button" class=" green btn btn-default" data-toggle="modal">Upload</a>
        </div>
        <div class="col-xs-12">
            <table id="department_table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{config('site.id')}}</th>
                    <th> {{config('site.name')}}</th>
                    <th> {{config('site.code')}}</th>
                    <th>{{config('site.description')}}</th>
                    <th>{{config('site.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{$department->name}}</td>
                        <td>{{$department->company->name}}</td>
                        <td>{{$department->costcent}}</td>
                        <td>{{$department->description}}</td>
                        <td>
                            <div class="hidden-sm hidden-xs btn-group">


                                <button class="btn btn-xs btn-info">
                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                </button>


                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown"
                                            data-position="auto">
                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">


                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title=""
                                               data-original-title="Edit">
                                                                                    <span class="green">
                                                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                    </span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- Create Model start --}}
    <div class="modal fade" id="department_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">department</h4>
                </div>
                {!! Form::open(
                    array(
                       'url'=>'department',
                       'class'=>'form form-horizontal',
                       'files'=>true)
                        ) !!}
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-warning">

                                <label for="" class="col-sm-2 control-label">Name</label>

                                <div class="col-xs-4">
                                    <input type="text" name="name" >
                                </div>


                            </div>
                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">Company</label>

                                <div class="col-xs-4">
                                    {!!  Form::select('company_id',App\Company::lists('name','id'))!!}
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">costcent</label>

                                <div class="col-xs-4">
                                    <input type="text" name="costcent" value="">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">名字</label>

                                <div class="col-xs-4">
                                    <input type="text" name="description" value="">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">存盘</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- End Create Model--}}


    {{--Upload Model start --}}
    <div class="modal fade" id="department_upload_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                {!! Form::open(
                    array(
                       'url'=>'upload/department',
                       'class'=>'form form-horizontal',
                       'files'=>true)
                        ) !!}
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">名字</label>

                                <div class="col-xs-4">
                                    {!! Form::file('attachment') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">存盘</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--Upload Model End--}}

@endsection

@section('script')
    <script>
        jQuery(function($){
            //initiate dataTables plugin
            var oTable1 =
                    $('#department_table')
                            .dataTable( {
                                bAutoWidth: false,
                                "aoColumns": [
                                    { "bSortable": false },
                                    null, null,null, null, null,
                                    { "bSortable": false }
                                ],
                                "aaSorting": [],

                                //,
                                //"sScrollY": "200px",
                                //"bPaginate": false,

                                //"sScrollX": "100%",
                                //"sScrollXInner": "120%",
                                //"bScrollCollapse": true,
                                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                //"iDisplayLength": 50
                            } );
            //oTable1.fnAdjustColumnSizing();




        });
    </script>
@endsection
