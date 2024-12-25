@extends('adminlte::page')
@section('title','Data Pengarang')

@section('content_header')
    <h1><i class="fa fa-user"> Data Pengarang</i></h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif
    @php
        $ar_judul = ['No','Nama','Email','foto'];
        $no = 1;
    @endphp
    <a href="{{ route('pengarang.create') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-plus"> Tambah Pengarang</i></a>
    <br/><br/>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($ar_pengarang As $pgr)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pgr->nama }}</td>
                <td>{{ $pgr->email }}</td>
                <td width="20%">
                @php
                    if(!empty($pgr->foto)){
                @endphp
                    <img src="{{ asset('images')}}/{{ $pgr->foto }}" width="10%"  />
                @php
                }else{
                @endphp
                
                    <img src="{{ asset('images')}}/nophoto.png" width="10%" />
                @php
                }
                @endphp
                </td>
                <td>
                    <form action="{{ route('pengarang.destroy',$pgr->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('pengarang.show', $pgr->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('pengarang.edit',$pgr->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_cuttom.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>@</b> Who Am I
    </div>
    <strong>&copy; {{ date('Y') }} <a href="#">Software Development</a>.</strong> All rights reserved.
@stop


@section('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script> console.log('Hi!'); </script>

     <!-- DataTables  & Plugins -->
     <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>
@stop
