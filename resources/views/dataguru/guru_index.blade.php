@extends('sidebar')

@section('content-dinamis')
    <div class="container">
        <h1 class="text-center my-5">Kelola Data Guru</h1>
        <div class="card-footer text-end mt-3 mb-3">
            <a href="{{ route('dataguru.guru_add') }}" class="btn btn-primary mb-3">Tambah Data Guru <i
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
                                <th>Nama Guru</th>
                                <th>Nip</th>
                                <th>Jabatan</th>
                                <th>Absen</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($gurus->count() > 0)
                                @foreach ($gurus as $index => $item)
                                    <tr>
                                        <td>{{ ($gurus->currentPage() - 1) * $gurus->perPage() + ($index + 1) }}</td>
                                        <td>{{ $item['guru'] }}</td>
                                        <td>{{ $item['nip'] }}</td>
                                        <td>{{ $item['jabatan'] }}</td>
                                        <td>{{ $item['jenis_absen'] }}</td>
                                        <td class="{{ $item['jam'] }}">
                                            {{ $item['jam'] }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('dataguru.guru_edit', $item['id']) }}"
                                                class="btn btn-warning btn-sm me-2">Edit <i
                                                    class="fa-solid fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="showModalDelete('{{ $item->id }}', '{{ $item->guru }}')">
                                                Hapus<i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-muted">Data Guru Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin menghapus data guru <b id="name-user"></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endsection

                    @push('script')
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script>
                            function showModalDelete(id, guru) {
                                $('#name-user').text(guru);
                                $('#modalDelete').modal('show');

                                let url = "{{ route('dataguru.guru_delete', ':id') }}";
                                url = url.replace(':id', id);
                                $("#deleteForm").attr('action', url);
                            }
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>

