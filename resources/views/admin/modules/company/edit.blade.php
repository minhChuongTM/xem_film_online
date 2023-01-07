@extends('admin.master')
@section('module', 'Edit Hãng film')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('module')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('module')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">@yield('action', 'Nhập tên hãng phim vào form')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.company.updateCompany', ['id'=>$company->id]) }}" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company">@yield('module')</label>
                            <input type="text" class="form-control" id="company" name="name" placeholder="Example: Marvel" value="{{ $company->name }}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Publish</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
