@extends('admin.master')
@section('module', 'Thêm film')
@push('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('administrator') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('administrator') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/dropzone/min/dropzone.min.css">
    <!-- Css Handle -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/handleCode/css/handle.css">
@endpush
@push('js')
    <!-- Select2 -->
    <script src="{{ asset('administrator') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('administrator') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('administrator') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('administrator') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('administrator') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('administrator') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('administrator') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('administrator') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('administrator') }}/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- Js Handle -->
    <script src="{{ asset('administrator') }}/handleCode/js/handle.js"></script>
@endpush
@push('jscode')
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'D-M-Y'
            });

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'D-M-Y'
            });
        })
    </script>
@endpush

@section('content')

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

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">@yield('action', 'Thêm phim')</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.film.storeFilm') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <!-- Title Film -->
                    <div class="form-group">
                        <label for="filmTitle">Tiêu đề phim</label>
                        <input type="text" class="form-control" id="filmTitle" name="name_film"
                            placeholder="Tiêu đề phim" minlength="5" maxlength="50" value="{{ old('name_film') }}"> {{-- Value= "{{ old('name') }}" => giữ lại giá trị cũ nó ko bị mất khi data bị trùng--}}
                    </div>
                    <!-- End Title Film -->

                    <!-- select movie genre -->
                    <div class="form-group">
                        <label>Thể loại phim</label>
                        <select class="select2" multiple="multiple" data-placeholder="Chọn thể loại" style="width: 100%;"
                            name="categories_id[]">
                            @foreach ($categories_id as $item)
                                <option value="{{ $item['id'] }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- end select Company -->

                    <!-- textarea Nội dung phim -->
                    <div class="form-group">
                        <label>Nội dung phim</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="film_content" aria-valuetext="{{ old('film_content') }}"></textarea>
                    </div>

                    <!-- Movie duration -->
                    <div class="form-group">
                        <label for="movieDuration">Thời lượng phim</label>
                        <input type="number" class="form-control" id="movieDuration" name="movie_duration" placeholder=""
                            minlength="5" maxlength="50" value="{{ old('movie_duration') }}">
                    </div>
                    <!-- End Movie duration -->

                    <!-- Nation -->
                    <div class="form-group">
                        <label>Quốc gia</label>
                        <select class="form-control"data-placeholder="Select a State" style="width: 100%;" name="nation">
                            <option value="Việt Nam">Việt Nam</option>
                            <option value="Mỹ" selected>Mỹ</option>
                            <option value="Hàn Quốc">Hàn Quốc</option>
                            <option value="Trung Quốc">Trung Quốc</option>
                            <option value="Hoa Kỳ">Hoa Kỳ</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Nhật Bản">Nhật Bản</option>
                            <option value="Châu Âu">Châu Âu</option>
                            <option value="Hồng Kong">Hồng Kong</option>
                            <option value="Thái Lan">Thái Lan</option>
                            <option value="Đài Loan">Đài Loan</option>
                            <option value="Ấn Độ">Ấn Độ</option>
                        </select>
                    </div>
                    <!-- End Nation -->

                    <!-- Yeat of manufacture -->
                    <div class="form-group">
                        <label>Năm sản xuất</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                data-target="#reservationdate" name="year_of_manufacture" value="{{ old('year_of_manufacture') }}"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>


                    </div>
                    <!-- End Yeat of manufacture -->

                    <!-- Statust -->
                    <div class="form-group">
                        <label for="status">Trang thái</label>
                        <input type="text" class="form-control" id="nation" name="status"
                            placeholder="Example: Đang chiếu tập 16" maxlength="10" value="{{ old('status') }}">
                    </div>
                    <!-- end Statust -->

                    <!-- radio Film Format -->
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="radio" name="movie_format" checked id="radioDanger1" value="Phim Bộ">
                            <label for="radioDanger1">Phim Bộ</label>
                        </div>
                        <div class="icheck-danger d-inline">
                            <input type="radio" name="movie_format" id="radioDanger2" value="Phim Lẻ">
                            <label for="radioDanger2">Phim Lẽ</label>
                        </div>
                    </div>
                    <!-- end radio Film Format -->

                    <!-- Film style -->
                    <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" checked id="checkboxDanger1" name="film_style[]" value="Phim Mới">
                            <label for="checkboxDanger1">
                                Phim Mới
                            </label>
                        </div>
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="checkboxDanger2" name="film_style[]" value="Phim Đặc Sắc">
                            <label for="checkboxDanger2">
                                Phim Đặc Sắc
                            </label>
                        </div>
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="checkboxDanger3" name="film_style[]" value="Phim Phổ Biến">
                            <label for="checkboxDanger3">
                                Phim Phổ Biến
                            </label>
                        </div>
                        <div class="icheck-danger d-inline">
                            <input type="checkbox" id="checkboxDanger4" name="film_style[]" value="Phim Chiếu Rạp">
                            <label for="checkboxDanger4">
                                Phim Chiếu Rạp
                            </label>
                        </div>
                    </div>
                    <!-- End Film style -->

                    <!-- select Language -->
                    <div class="form-group">
                        <label>Ngôn ngữ phim</label>
                        <select class="form-control" data-placeholder="Select a State" style="width: 100%;"
                            name="language_id">
                            @foreach ($language_id as $item)
                                <option value="{{ $loop->iteration }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- end select Language -->

                    <!-- select Company -->
                    <div class="form-group">
                        <label>Hãng Phim</label>
                        <select class="form-control" data-placeholder="Chọn hãng phim" style="width: 100%;"
                            name="film_company_id">
                            @foreach ($company_id as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- end select Company -->

                    <!-- Cast -->
                    <div class="form-group">
                        <label>Diễn viên</label>
                        <select class="select2" multiple="multiple" data-placeholder="Chọn diễn viên"
                            style="width: 100%;" name="cast_id[]">
                            @foreach ($cast as $item)
                                <option value="{{ $item['id'] }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Cast -->

                    <!-- Avatar -->
                    <div class="form__img">
                        <label for="form__img-upload">Upload cover (270 x 400)</label>
                        <input id="form__img-upload" name="avatar" type="file" accept=".png, .jpg, .jpeg" value="{{ old('avatar') }}">
                        <img id="form__img" src="#" alt=" ">
                    </div>
                    <!-- End Avatar -->

                    <!-- Banner -->
                    <div class="form__gallery">
                        <label id="gallery1" for="form__gallery-upload">Upload photos</label>
                        <input data-name="#gallery1" id="form__gallery-upload" name="img"
                            class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" value="{{ old('img[]') }}">
                    </div>
                    <!-- End Banner -->
                    
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
@endsection
