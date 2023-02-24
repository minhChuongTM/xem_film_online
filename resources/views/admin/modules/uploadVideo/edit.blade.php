@extends('admin.master')
@section('module', 'Upload Video')
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

    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">@yield('action', 'Upload Video')</h3>
            </div>
            <form action="{{ route('admin.UploadMovie.update', ['id'=>$Movie->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Id Film--}}
                <div class="form-group">
                    <select class="form-control" data-placeholder="Tên Phim" style="width: 100%;" name="film_id">
                        @php
                        // kiểm tra khóa ngoại và khóa chính của các bảng có trùng nhau hay không
                            function film($array, $id) {
                                foreach ($array as $film) {
                                    if ($id == $film['id']) {
                                        return true;
                                    }
                                }
                                return false;
                            }
                        @endphp
                        @foreach ($film as $item)
                            <option value="{{ $item->id }}"
                                {{film($film, $Movie->film_id) ? 'seleted' : ''}}>
                                {{ $item->name_film }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Video upload -->
                <div class="form-group mt-2">
                    <div class="collapse show multi-collapse" id="multiCollapseExample1">
                        <div class="form__video">
                            <label id="movie1" for="form__video-upload">{{ $Movie->link }}</label>
                            <input data-name="#movie1" id="form__video-upload" name="link"
                                class="form__video-upload" type="file"
                                accept=".avi, .mp4, .wmv, .mkv, .flv, .webm, .mpg"
                                value="{{ old('link') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="filmTitle" name="resolution"
                        placeholder="Độ phân giải video" value="{{ old('resolution', $Movie->resolution) }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="episodes" name="episodes"
                        placeholder="Tập Phim" minlength="5" maxlength="50" value="{{ old('episodes', $Movie->episodes) }}">
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Publish</button>
                </div>
            </form>
        </div>
    </section>
@endsection
