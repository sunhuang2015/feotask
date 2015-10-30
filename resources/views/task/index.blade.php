@extends('tpl.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
          <a href="#task_new_model" role="button" class=" green btn btn-default" data-toggle="modal">New</a>

        </div>
    </div>
    {{-- task Model start--}}
    <div class="modal fade" id="task_new_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">SNC Ticket</h4>
                </div>
                {!! Form::open(
                    array(
                       'url'=>'task',
                       'class'=>'form form-horizontal',
                       'files'=>true)
                        ) !!}
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">任务名称</label>

                                <div class="col-xs-4">
                                    <input type="text" name="name" value="">
                                </div>
                                <label for="" class="col-sm-2 control-label">申请人</label>

                                <div class="col-xs-4">
                                    <input type="text" name="applicant" value="">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">公司</label>

                                <div class="col-xs-4">
                                   {!! Form::select('company_id',App\Company::lists('name','id')) !!}
                                </div>
                                <label for="" class="col-sm-2 control-label">成本中心</label>

                                <div class="col-xs-4">
                                    <input type="text" name="costcent" value="">
                                </div>
                            </div>

                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label">SNC号码</label>

                                <div class="col-xs-4">
                                    <input type="text" name="task_no" value="">
                                </div><label for="" class="col-sm-2 control-label">分类</label>

                                <div class="col-xs-4">
                                    {!! Form::select('category_id',App\TaskCategory::lists('name','id')) !!}
                                </div>
                            </div>

                            <div class="form-group has-warning">
                                <label for="" class="col-sm-2 control-label"></label>

                                <div class="col-xs-4">
                                    <input type="text" name="snc" value="">
                                </div>
                                <label for="" class="col-sm-2 control-label">状态</label>

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

    {{-- task Model End--}}
    <div class="row">
        <div class="col-xs-12">
            <table id="task_apply_table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th> 工号</th>
                    <th> 公司</th>
                    <th>部门</th>
                    <th>申请时间</th>
                    <th>状态</th>
                    <th>{{config('site.action')}}</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($tasks as $task)
                     <tr>

                         <td>{{$task->employee_name}}</td>
                         <td>{{$task->employee_number}}</td><td class="hidden-480">{{$task->company->name}}</td>
                         <td>{{$task->department_name}}</td>
                         <td>{{$task->created_at}}</td>
                         <td>{{$task->taskStatus->name}}</td>
                         <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                                <a href="/task/apply/{{$task->id}}/edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                            <span class="green">

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

@endsection

@section('script')
    <script>
         jQuery(function($){
                     //initiate dataTables plugin
                     var oTable1 =
                             $('#task_apply_table')
                                 //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
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


                     //TableTools settings
                     TableTools.classes.container = "btn-group btn-overlap";
                     TableTools.classes.print = {
                         "body": "DTTT_Print",
                         "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
                         "message": "tableTools-print-navbar"
                     }

                 });
    </script>
@endsection