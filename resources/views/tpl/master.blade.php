<!DOCTYPE html>
<html lang="en">
    <!-- HTML Header -->
    @include('tpl.header')

<body class="no-skin">
<!-- #section:basics/navbar.layout -->

@include('tpl.navbar')
<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <!-- #section:basics/sidebar -->

    @include('tpl.sidebar')
    <!-- /section:basics/sidebar -->

    @include('tpl.content')

    @include('tpl.footer')

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

@include('tpl.script')

@yield('script');
</body>
</html>
