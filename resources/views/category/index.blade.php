@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    List Category
                </div>
                <div class="text-right pt-2 pr-2">
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Tambah Category</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center" width="200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        {{-- <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Anda yakin akan menghapus data ini?');" class="btn btn-danger btn-sm">Hapus</button>
                                        </form> --}}
                                        <a href="{{ route('category.destroy', $item->id) }}" data-method="DELETE" data-action="update" data-confirm="anda yakin akan melakukan perubahan" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center"><em>Tidak ada data</em></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection