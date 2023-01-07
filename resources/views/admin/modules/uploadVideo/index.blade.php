@extends('admin.master')
@section('module', 'List Film')
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
        });
    </script>
@endpush
@section('content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Danh sách phim</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="company" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>AVATAR</th>
                        <th>NAME_FILM</th>
                        <th>LINK FILM</th>
                        <th>CREATED_AT</th>
                        <th>EDIT</th>
                        <TH>DELETE</TH>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($film as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $item->avatar }}" alt="" width="150px"></td>
                            <td>{{ $item->name_film }}</td>
                            <td>{{ $item->movie_format }}</td>
                            <td>{{$item->categoriesStr}}</td>
                            <td>{{$item->castStr}}</td>
                            <td>{{ $item->film_style }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('admin.film.editFilm', ['id' => $item->id]) }}">edit</a></td>
                            <td><a href="{{ route('admin.film.deleteFilm', ['id'=>$item->id]) }}">delete</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
