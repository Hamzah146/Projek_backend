@extends('adminlte::page')
@section('title','Detail Pengarang')

@section('content_header')
    <h1>Detail Pengarang</h1>
    <br/>
    <a href="{{ route('pegawai.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop

@section('content')
    @foreach($data as $d)
    <form action="{{ route('pengarang.update',$d->id) }}" method="POST">
        @csrf 
        @method('put')
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
             oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="email" name="email" value="{{ $d->email }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Foto</label><input type="file" name="foto" value="{{ $d->foto }}" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-info">Update</button>
    </form>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_cuttom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
