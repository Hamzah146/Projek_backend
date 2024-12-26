@extends('adminlte::page')
@section('title','Form MahaSantri')

@section('content_header')
    <h1>Form MahaSantri</h1>
    <br/>
    <a href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa thin fa-arrow-left"> Back</i></a>
@stop

@section('content')
    @php
        $rs1 = App\Models\Jurusan::all();
        $rs2 = App\Models\MataKuliah::all();
        $rs3 = App\Models\Dosen Pengajar::all();
    @endphp

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('mahasantri.store') }}">
        @csrf 
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
             oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" name="nim" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control">
                <option value="">-- Pilih Jurusan</option>
                @foreach($rs1 as $j)
                    <option value="{{ $j->id }}"></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah" class="form-control">
                <option value="">-- Pilih Mata Kuliah</option>
                @foreach($rs1 as $mk)
                    <option value="{{ $mk->id }}"></option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengajar</label>
            <select name="dosen_id" class="form-control">
                <option value="">-- Pilih Dosen Pengajar</option>
                @foreach($rs1 as $dp)
                    <option value="{{ $dp->id }}"></option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-info">Simpan</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_cuttom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
