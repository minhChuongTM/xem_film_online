@extends('admin.master')
@section('module', 'List Categories')
@push('cssTable')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('administrator') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('administrator') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@push('jsTable')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('administrator') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('administrator') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endpush
@push('jsTableCode')
    <script>
        $(function() {
            $("#company").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
            $("#the_loai").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
            $("#language").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
@endpush
@section('content')
    <div class="row">        
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Danh sách hãng phim</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="company" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CREATED_AT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.company.indexCompany') }}">
                        <button type="button" title="This month" aria-pressed="false" class="fc-today-button btn btn-primary mt-2"> View</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Danh sách thể loại</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="the_loai" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CREATED_AT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.categories.indexCategories') }}">
                        <button type="button" title="This month" aria-pressed="false" class="fc-today-button btn btn-primary mt-2"> View</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Danh sách ngôn ngữ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="language" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CREATED_AT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($language as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.language.indexLanguage') }}">
                        <button type="button" title="This month" aria-pressed="false" class="fc-today-button btn btn-primary mt-2"> View</button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
@endsection
