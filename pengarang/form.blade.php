@extends('adminlte::page')
@section('title','Form Pengarang')

@section('content_header')
    <h1>Form Pengarang</h1>
    <br/>
    <a href="{{ route('pengarang.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop

@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('pengarang.store') }}" enctype="multipart/form-data">
        @csrf 
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
             oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="email" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Foto</label><input type="file" name="foto" class="form-control"/>
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
