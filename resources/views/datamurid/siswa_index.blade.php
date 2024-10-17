@extends('sidebar')

@section('content-dinamis')
    <div class="container">
        <h1 class="text-center my-5">Kelola Data Siswa</h1>
        <div class="card-footer text-end mt-3 mb-3">
            <a href="{{ route('datamurid.siswa_add') }}" class="btn btn-primary mb-3">Tambah Data Siswa <i
                    class="fa-solid fa-user-plus ms-2"></i></a>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card shadow-lg mx-auto">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Nis</th>
                                <th>Absen</th>
                                <th>Jam</th>
                                <th>Rayon</th>
                                <th>Rombel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->count() > 0)
                                @foreach ($students as $index => $item)
                                    <tr >
                                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + ($index + 1) }}</td>
                                        <td>{{ $item['siswa'] }}</td>
                                        <td>{{ $item['nis'] }}</td>
                                        <td>{{ $item['jenis_absen'] }}</td>
                                        <td class="{{ $item['jam']}}">
                                            {{ $item['jam'] }}</td>
                                        <td>{{ $item['rayon'] }}</td>
                                        <td>{{ $item['rombel'] }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('datamurid.siswa_edit', $item['id']) }}" class="btn btn-warning btn-sm me-2">Edit <i class="fa-solid fa-edit"></i></a>
                                            <form action="{{ route('datamurid.siswa_delete', $item['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete <i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-muted">Data Siswa Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
