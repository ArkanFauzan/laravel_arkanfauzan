<x-app-layout>

    <div class="container">
        <h4>{{ isset($pasien) ? 'Edit' : 'Tambah' }} Pasien</h4>
    
        <form method="POST" action="{{ isset($pasien) ? route('pasien.update', $pasien->id) : route('pasien.store') }}">
            @csrf
            @if(isset($pasien)) @method('PUT') @endif
    
            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" value="{{ old('nama_pasien', $pasien->nama_pasien ?? '') }}" required>
            </div>
    
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
            </div>
    
            <div class="mb-3">
                <label>No Telpon</label>
                <input type="text" name="no_telpon" class="form-control" value="{{ old('no_telpon', $pasien->no_telpon ?? '') }}" required>
            </div>
    
            <div class="mb-3">
                <label>Rumah Sakit</label>
                <select id="rumah_sakit_id" name="rumah_sakit_id" class="form-select" required>
                    @if (isset($pasien))
                        <option value="{{ $pasien->rumah_sakit_id }}" selected>
                            {{ $pasien->rumahSakit->nama_rumah_sakit }}
                        </option>
                    @endif
                </select>
            </div>
    
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    
    <script>
      $('#rumah_sakit_id').select2({
          placeholder: 'Cari Rumah Sakit...',
          ajax: {
              url: '/ajax/rumah-sakit/search',
              dataType: 'json',
              delay: 250,
              data: function (params) {
                  return { q: params.term };
              },
              processResults: function (data) {
                  return { results: data };
              },
              cache: true
          }
      });
    </script>
  
</x-app-layout>