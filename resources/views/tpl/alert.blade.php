
@if (session()->has('message'))
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-check green"></i>
        <p>{!!session('message') !!}</p>

    </div>
@endif




