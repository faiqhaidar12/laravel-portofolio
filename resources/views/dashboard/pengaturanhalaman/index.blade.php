@extends('dashboard.layout')
@section('content')
    <form action="{{ route('pengaturanhalaman.update') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="" class="col-sm-2">About</label>
            <label for="" class="col-sm-6"><select name="_halaman_about" class="form-select">
                    <option value="">--Pilih--</option>
                    @foreach ($datahalaman as $item)
                        <option
                            value="{{ $item->id }}"{{ get_meta_value('_halaman_about') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2">Interest</label>
            <label for="" class="col-sm-6"><select name="_halaman_interest" class="form-select">
                    <option value="">--Pilih--</option>
                    @foreach ($datahalaman as $item)
                        <option
                            value="{{ $item->id }}"{{ get_meta_value('_halaman_interest') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2">Awards</label>
            <label for="" class="col-sm-6"><select name="_halaman_awards" class="form-select">
                    <option value="">--Pilih--</option>
                    @foreach ($datahalaman as $item)
                        <option
                            value="{{ $item->id }}"{{ get_meta_value('_halaman_awards') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
