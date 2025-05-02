<x-app-layout>

    <div class="container">
        <h4>Daftar Rumah Sakit</h4>
        <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary mb-3">Tambah</a>
    
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <table class="table table-bordered">
            <tr>
                <th>Nama</th><th>Alamat</th><th>Email</th><th>Telepon</th><th>Aksi</th>
            </tr>
            @foreach ($data as $item)
            <tr data-id="{{ $item->id }}">
                <td>{{ $item->nama_rumah_sakit }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon }}</td>
                <td>
                    <a href="{{ route('rumah-sakit.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm btn-delete">Hapus</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <script>
        $(document).on('click', '.btn-delete', function () {
            let row = $(this).closest('tr');
            var id = row.data('id');
            
            console.log({row, id});
            

    
            if (confirm('Yakin ingin menghapus rumah sakit ini?')) {
                $.ajax({
                    url: '/rumah-sakit/' + id,
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
    </script>    

</x-app-layout>
