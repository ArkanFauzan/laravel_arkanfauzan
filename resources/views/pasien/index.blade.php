<x-app-layout>

    <div class="container">
        <h4>Data Pasien</h4>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah</a>
    
        <div class="mb-3" style="max-width: 300px;">
            <label>Filter berdasarkan Rumah Sakit</label>
            <select id="filter_rumah_sakit" class="form-select">
                
            </select>
        </div>
    
        <table class="table table-bordered" id="pasien_table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Rumah Sakit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $item)
                <tr data-id="{{ $item->id }}">
                    <td>{{ $item->nama_pasien }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telpon }}</td>
                    <td>{{ $item->rumahSakit->nama_rumah_sakit }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        // Delete
        $(document).on('click', '.delete-btn', function () {
            let row = $(this).closest('tr');
            let id = row.data('id');
    
            if (confirm("Yakin ingin pasien ini?")) {
                $.ajax({
                    url: '/pasien/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function () {
                        row.fadeOut(300, function () { $(this).remove(); });
                    },
                    error: function () {
                        alert('Gagal menghapus data. Silakan coba lagi.');
                    }
                });
            }
        });

        // Search and filter by rumah sakit
        $('#filter_rumah_sakit').select2({
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

        $('#filter_rumah_sakit').on('change', function () {
            let id = $(this).val();
            let url = id ? '/filter-pasien/' + id : '/pasien';
    
            if (id) {
                $.get(url, function (data) {
                    let rows = '';
                    data.forEach(p => {
                        rows += `<tr data-id="${p.id}">
                            <td>${p.nama_pasien}</td>
                            <td>${p.alamat}</td>
                            <td>${p.no_telpon}</td>
                            <td>${p.rumah_sakit.nama_rumah_sakit}</td>
                            <td>
                                <a href="/pasien/${p.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm delete-btn">Hapus</button>
                            </td>
                        </tr>`;
                    });
                    $('#pasien_table tbody').html(rows);
                });
            } else {
                location.reload();
            }
        });
    </script>
  
</x-app-layout>