<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=site_url('admin');?>">Admin Sismasoya</a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?=site_url('');?>"><i class="fa fa-arrow-left fa-fw"></i> See Homepage</a>
                </li>
                <li >
                    <a href="<?=site_url('admin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li >
                    <a href="<?=site_url('admin/kasus');?>"><i class="fa fa-list fa-fw"></i> Daftar Kasus</a>
                </li>
                <li >
                    <a href="<?=site_url('admin/kasus_baru');?>"><i class="fa fa-users fa-fw"></i> Kasus Baru Pengguna </a>
                </li>
                <li>
                    <a href="<?=site_url('admin/hama');?>"><i class="fa fa-bug fa-fw"></i> Data Hama</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/gejala');?>"><i class="fa fa-warning fa-fw"></i> Data Gejala</a>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?=site_url('admin/users');?>">Pengguna</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                <!-- </li> -->
                <li>
                    <a href="<?=site_url('logout');?>"><i class="fa fa-arrow-right fa-fw"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
