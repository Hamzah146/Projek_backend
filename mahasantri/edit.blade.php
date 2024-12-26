@extends('adminlte::page')
@section('title','Detail MahaSantri')

@section('content_header')
    <h1>Detail MahaSantri</h1>
    <br/>
    <a href="{{ route('mahasantri.index') }}" class="btn btn-info btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop

@section('content')
    @php
        $rs1 = App\Models\Jurusan::all();
        $rs2 = App\Models\Mata Kuliah::all();
        $rs3 = App\Models\Dosen Pengajar::all();
    @endphp
    @foreach($data as $d)
    <form action="{{ route('mahasantri.update',$d->id) }}" method="POST">
        @csrf 
        @method('put')
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
             oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" name="nim" value="{{ $d->nim }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($rs1 as $j)
                    @php
                        $sel1 = ($j->id == $d->idpengarang) ? 'selected' : '';
                    @endphp
                    <option value="{{ $j->id }}" {{ $sel1 }}>{{ $j->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>mata Kuliah</label>
            <select name="matakuliah" class="form-control">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($rs2 as $mk)
                    @php
                        $sel2 = ($mk->id == $d->idpenerbit) ? 'selected' : '';
                    @endphp
                    <option value="{{ $mk->id }}" {{ $sel2 }}>{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengajar</label>
            <select name="dosen_id" class="form-control">
                <option value="">-- Pilih Dosen Pengajar --</option>
                @foreach($rs3 as $dp)
                    @php
                        $sel3 = ($dp->id == $d->idkategori) ? 'selected' : '';
                    @endphp
                    <option value="{{ $dp->id }}" {{ $sel3 }}>{{ $dp->nama }}</option>
                @endforeach
            </select>
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
