@extends('sidebar')

@section('content-dinamis')
    <div class="container mt-5">
        <h1 class="text-center my-5">Buat Data Baru Siswa</h1>
        <div class="card shadow-lg mx-auto">
            <div class="card-body">
                <form action="{{ route('datamurid.edit.update', $siswa['id']) }} " method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="siswa" class="form-label">Nama Siswa</label>
                        <input type="text" name="siswa" id="siswa" class="form-control"
                            placeholder="Masukkan Nama Siswa" value="{{ $siswa['siswa'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="number" name="nis" id="nis" class="form-control" placeholder="Masukkan NIS"
                            value="{{ $siswa['nis'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_absen" class="form-label">Pilih Jenis Absen</label>
                        <select name="jenis_absen" id="jenis_absen" class="form-select">
                            <option value="Kedatangan" {{ $siswa['jenis_absen'] == 'Kedatangan' ? 'selected' : '' }}>
                                Kedatangan</option>
                            <option value="Ketelatan" {{ $siswa['jenis_absen'] == 'Ketelatan' ? 'selected' : '' }}>Ketelatan
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam Kedatangan</label>
                        <input type="time" name="jam" id="jam" class="form-control"
                            value="{{ $siswa['jam'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="rayon" class="form-label">Rayon</label>
                        <input type="text" name="rayon" id="rayon" class="form-control"
                            placeholder="Masukkan Rayon" value="{{ $siswa['rayon'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="rombel" class="form-label">Rombel</label>
                        <input type="text" name="rombel" id="rombel" class="form-control"
                            placeholder="Masukkan Rombel" value="{{ $siswa['rombel'] }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-50">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer text-center mt-3 mb-3">
        <a href="{{ route('datamurid.siswa_index') }}" class="btn btn-outline-secondary">Kembali ke Daftar Siswa</a>
    </div>
@endsection
