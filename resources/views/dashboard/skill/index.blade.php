@extends('dashboard.layout')
@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Programming Languages & Tools</label>
            <input type="text" class="form-control form-control-sm skill" name="_language" id="judul"
                aria-describedby="helpId" placeholder="Masukan Programming Languages & Tools"
                value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Work Flow</label>
            <textarea name="_workflow" class="form-control summernote" rows="5">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
@push('child-script-skill')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
