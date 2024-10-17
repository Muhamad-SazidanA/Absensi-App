@extends('sidebar')

@section('content-dinamis')
    <div class="container mt-5">
        <h1 class="text-center my-5">Buat Data Baru Guru</h1>
        <div class="card shadow-lg mx-auto">
            <div class="card-body">
                <form action="{{ route('dataguru.guru_add.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="guru" class="form-label">Nama Guru</label>
                        <input type="text" name="guru" id="guru" class="form-control"
                            placeholder="Masukkan Nama Guru" value="{{ old('guru') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" name="nip" id="nip" class="form-control" placeholder="Masukkan NIP"
                            value="{{ old('nip') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                            placeholder="Masukkan Jabatan" value="{{ old('jabatan') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_absen" class="form-label">Pilih Jenis Absen</label>
                        <select name="jenis_absen" id="jenis_absen" class="form-select" required>
                            <option hidden selected disabled>Pilih</option>
                            <option value="Kedatangan" {{ old('jenis_absen') == 'Kedatangan' ? 'selected' : '' }}>
                                Kedatangan</option>
                            <option value="Ketelatan" {{ old('jenis_absen') == 'Ketelatan' ? 'selected' : '' }}>
                                Ketelatan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam Kedatangan</label>
                        <input type="time" name="jam" id="jam" class="form-control"
                            value="{{ old('jam') }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer text-center mt-3 mb-3">
        <a href="{{ route('dataguru.guru_index') }}" class="btn btn-outline-secondary">Kembali ke Daftar Siswa</a>
    </div>
@endsection
