<x-app-layout>

    <div class="container">
        <h4>{{ isset($rumahSakit) ? 'Edit' : 'Tambah' }} Rumah Sakit</h4>
    
        <form method="POST" action="{{ isset($rumahSakit) ? route('rumah-sakit.update', $rumahSakit->id) : route('rumah-sakit.store') }}">
            @csrf
            @if(isset($rumahSakit)) @method('PUT') @endif
    
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama_rumah_sakit" class="form-control" value="{{ old('nama_rumah_sakit', $rumahSakit->nama_rumah_sakit ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $rumahSakit->alamat ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $rumahSakit->email ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $rumahSakit->telepon ?? '') }}" required>
            </div>
    
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('rumah-sakit.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
  
</x-app-layout>