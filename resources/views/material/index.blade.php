@extends('tpl.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <a href="#material_model" role="button" class=" green btn btn-default" data-toggle="modal">新物料</a>

        </div>
        <div class="col-xs-12">
            <table id="material_table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>编码</th>
                        <th>中文</th>
                        <th>英文</th>
                        <th>型号</th>
                        <th>品牌</th>
                        <th>单位</th>
                        <th>要求</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($materials as $material)
                    <tr>
                        <td>{{$material->code}}</td>
                        <td>{{$material->c_name}}</td>
                        <td>{{$material->e_name}}</td>
                        <td>{{$material->model}}</td>
                        <td>{{$material->brand}}</td>
                        <td>{{$material->unit}}</td>
                        <td>{{$material->spec}}</td>
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
    <div class="modal fade" id="material_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">物料编码</h4>
                </div>
                {!! Form::open(
                    array(
                       'url'=>'material',
                       'class'=>'form form-horizontal',
                       'files'=>true)
                        ) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group has-warning">
                                <label for="" class="col-xs-2 control-label">物料编码</label>
                                <div class="col-xs-4">
                                    <input type="text" name="code" class="form-control" required >
                                </div>
                                <label for="" class="col-sm-2 control-label">品牌</label>
                                <div class="col-xs-4">
                                  {!! Form::text('brand','',['class'=>'form-control','required']) !!}
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="" class="col-xs-2 control-label">中文名</label>
                                <div class="col-xs-4">
                                     {!! Form::text('c_name','',['class'=>'form-control','required']) !!}
                                </div>


                                <label for="" class="col-xs-2 control-label">英文名</label>
                                <div class="col-xs-4">
                                      {!! Form::text('e_name','',['class'=>'form-control','required']) !!}
                                </div>
                             </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">型号</label>
                                <div class="col-xs-4">
                                    {!! Form::text('model','',['class'=>'form-control','required']) !!}
                                </div>
                                <label for="" class="col-sm-2 control-label">单位</label>
                                <div class="col-xs-4">
                                  {!! Form::text('unit','',['class'=>'form-control','required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">spec</label>
                                <div class="col-xs-10">
                                  {!! Form::textarea('spec','',['class'=>'form-control']) !!}
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

    {{--Upload Model End--}}

@endsection

@section('script')
    <script>
         jQuery(function($){
                     //initiate dataTables plugin
                     var oTable1 =
                             $('#material_table')
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
