@extends('dashboard.layout')

@section('content')
    <p class="card-title">Halaman</p>
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Tambah Halaman</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('apakah anda yakin ingin menghapus data ini ?')"
                                action="{{ route('halaman.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
