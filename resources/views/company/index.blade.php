@extends('tpl.master')
@section('alert')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <table id="company_table" class="table table-striped table-bordered table-hover">
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
            @foreach($companies as $company)
                <tr>
                <td class="center">
                    <label class="pos-rel">
                        {!! $company->id !!}
                    </label>
                </td>


                <td>{!! $company->name !!}</td>
                <td class="hidden-480">{{
                $company->code
                }}</td>
                <td>{{
                $company->description
                }}</td>


                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <a href="/company/{{$company->id}}/edit" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></a>

                        <a href="/delete/company/{{$company->id}}" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>



                    </div>

                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">


                                <li>
                                    <a href="/company/{{$company->id}}/edit" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/delete/company/{{$company->id}}" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
                    $('#company-table')
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