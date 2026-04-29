@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Nilai Siswa Baru</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Kolom Kiri: Identitas Akademik --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Pilih Siswa</label>
                            <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">
                                <option value="">-- Pilih Siswa --</option>
                                @foreach($siswas as $s)
                                    <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                                        {{ $s->nis }} - {{ $s->nama_lengkap }} ({{ $s->kelas->nama_kelas }})
                                    </option>
                                @endforeach
                            </select>
                            @error('siswa_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mata Pelajaran</label>
                            <select name="mapel_id" id="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                                <option value="" data-guru="-">-- Pilih Mapel --</option>
                                @foreach($mapels as $m)
                                    <option value="{{ $m->id }}"
                                            data-guru="{{ $m->guru->nama_lengkap ?? 'Guru tidak ditemukan' }}"
                                            {{ old('mapel_id') == $m->id ? 'selected' : '' }}>
                                        [{{ $m->kode_mapel }}] {{ $m->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mapel_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Guru Pengampu</label>
                            <input type="text" id="guru_display" class="form-control bg-light" value="-" readonly>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Nilai --}}
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nilai UTS</label>
                                    <input type="number" step="0.01" min="0" max="100"
                                           name="nilai_uts"
                                           id="nilai_uts"
                                           class="form-control @error('nilai_uts') is-invalid @enderror"
                                           value="{{ old('nilai_uts') }}"
                                           placeholder="0 - 100">
                                    @error('nilai_uts') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nilai UAS</label>
                                    <input type="number" step="0.01" min="0" max="100"
                                           name="nilai_uas"
                                           id="nilai_uas"
                                           class="form-control @error('nilai_uas') is-invalid @enderror"
                                           value="{{ old('nilai_uas') }}"
                                           placeholder="0 - 100">
                                    @error('nilai_uas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 border-top pt-3 text-right">
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fas fa-save mr-1"></i> Simpan Nilai
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // ── Guru otomatis dari mapel ──────────────────────────
        const mapelSelect  = document.getElementById('mapel_id');
        const guruInput    = document.getElementById('guru_display');

        function updateGuru() {
            const opt = mapelSelect.options[mapelSelect.selectedIndex];
            guruInput.value = opt.getAttribute('data-guru') || '-';
        }

        mapelSelect.addEventListener('change', updateGuru);
        if (mapelSelect.value !== '') updateGuru();

    });
</script>
@endsection
