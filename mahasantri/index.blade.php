@extends('adminlte::page')
@section('title','Data MahaSantri')

@section('content_header')
    <h1><i class="fa solid fa-user-tie"> Data MahaSantri</i></h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif
    @php
        $ar_judul = ['No','Nama','NIM','Jurusan','Mata Kuliah','Dosen Pengajar'];
        $no = 1;
    @endphp
    <a href="{{ route('mahasantri.create') }}" class="btn btn-info btn-md" role="button"><i class="fa light fa-plus"> Tambah MahaSantri</i></a>
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
            @foreach($ar_mahasantri as $mhst)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mhst->nama }}</td>
                <td>{{ $mhst->nim }}</td>
                <td>{{ $mhst->jurusan_id }}</td>
                <td>{{ $mhst->dosen_id }}</td>
                <td>
                    <form action="{{ route('mahasantri.destroy',$mhst->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('mahasantri.show',$mhst->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('mahasantri.edit',$mhst->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_cuttom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
