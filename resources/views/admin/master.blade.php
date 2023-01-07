<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.blocks.head')

    <!-- Css Form Film --> 
    @stack('css')

    <!-- Css Table -->
    @stack('cssTable')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.blocks.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.blocks.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('admin.blocks.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.blocks.foot')
    <!-- Js Form Create Film -->
    @stack('js')
    @stack('jscode')
    <!-- Js Table -->
    @stack('jsTable')
    @stack('jsTableCode')
</body>

</html>
