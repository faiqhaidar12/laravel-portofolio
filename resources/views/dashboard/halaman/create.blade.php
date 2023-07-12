@extends('dashboard.layout')
@section('content')
    <div class="pb-3 mb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-info float-end">Kembali</a>
    </div>
    <form action="{{ route('halaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Masukan Judul" value="{{ Session::get('judul') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" class="form-control summernote" rows="5">{{ Session::get('isi') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
