@extends('admin.master')
@section('module', 'Thêm Hãng Sản Xuất phim')
@section('content')


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

    <!-- Box báo lổi khi trong form không có data
            => vô trong Request đã tạo riêng cho từng kiểu Request
                viết 1 hàm message() {} -> ghi nôi dung tiếng việt
                keyword => "laravel form vaalidation message"
        -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Box thông báo đà thêm data từ form thành công vào database
            keyword => "laravel flash message"
            trong controller ->whit('success', 'Bạn đã thêm data thành công vào database')
        -->
    @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

    <!-- Default box -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">@yield('action', 'Nhập tên hãng phim vào form')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin.company.storeCompany') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="category">Thêm Hãng Phim</label>
                    <input type="text" class="form-control" id="company" name="name"
                        placeholder="Example: Phim Hành Động">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Publish</button>
            </div>
        </form>
    </div>
    <!-- /.card -->



@endsection
