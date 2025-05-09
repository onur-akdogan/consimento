@extends('layouts.app')

@section('title', 'Ülke Yönetimi')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Ülke Yönetimi</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ulkeler.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="ad" class="form-control" placeholder="Yeni ülke adı" required>
            <button class="btn btn-primary">Ekle</button>
        </div>
        @error('ad')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Ülke Adı</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ulkeler as $ulke)
                <tr>
                    <td>{{ $ulke->id }}</td>
                    <td>{{ $ulke->ad }}</td>
                    <td>
                        <form action="{{ route('ulkeler.destroy', $ulke->id) }}" method="POST" onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Henüz ülke eklenmemiş.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
