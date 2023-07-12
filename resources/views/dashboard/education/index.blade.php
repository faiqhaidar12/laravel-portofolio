@extends('dashboard.layout')

@section('content')
    <p class="card-title">Education</p>
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Tambah Education</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Universitas</th>
                    <th>Nama Fakultas</th>
                    <th>Prodi</th>
                    <th>IPK</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>{{ $item->info3 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form onsubmit="return confirm('apakah anda yakin ingin menghapus data ini ?')"
                                action="{{ route('education.destroy', $item->id) }}" method="POST" class="d-inline">
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
