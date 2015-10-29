<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> {{config("site.dashboard")}} </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								任务
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">
                    <a href="/task">
                        <i class="menu-icon fa fa-caret-right"></i>
                        SNC Ticket
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/baoxiao">
                        <i class="menu-icon fa fa-caret-right"></i>
                        报销
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/telecom">
                        <i class="menu-icon fa fa-caret-right"></i>
                        话费月报表
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> 网络 </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="/network/devices">
                        <i class="menu-icon fa fa-caret-right"></i>
                       设备管理
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/network/topology">
                        <i class="menu-icon fa fa-caret-right"></i>
                        网络结构
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 手机</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="/cdma/apply">
                        <i class="menu-icon fa fa-caret-right"></i>
                        CDMA申请
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/mobile/">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Form Elements 2
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="form-wizard.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Wizard &amp; Validation
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="wysiwyg.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Wysiwyg &amp; Markdown
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="dropzone.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dropzone File Upload
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-check-square-o"></i>
                <span class="menu-text"> 组织结构</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="/company">
                        <i class="menu-icon fa fa-caret-right"></i>
                        公司
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/department">
                        <i class="menu-icon fa fa-caret-right"></i>
                        部门
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="/employee">
                        <i class="menu-icon fa fa-caret-right"></i>
                        职员
                    </a>

                    <b class="arrow"></b>
                </li>


            </ul>
        </li>    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>