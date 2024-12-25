@extends('adminlte::page')
@section('title','Detail Pengarang')

@section('content_header')
    <h1>Detail Pengarang</h1>
    <br/>
    <a href="{{ route('pengarang.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop

@section('content')
    @foreach($ar_pengarang as $b)
    <form >
        @csrf 
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
             oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" placeholder="{{ $b->nama }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="email" placeholder="{{ $b->email }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Foto</label><input type="file" placeholder="{{ $b->foto }}" class="form-control" disabled/>
        </div>
    </form>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_cuttom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
