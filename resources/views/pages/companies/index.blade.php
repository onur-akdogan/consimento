@extends('layouts.app')

@section('title', 'Firmalarım')

@section('content') 
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Firmalarım</h4>
        <a href="{{ route('companies.create') }}" class="btn btn-success">Yeni Firma Ekle</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($companies->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Firma Adı</th>
                        <th>E-posta</th>
                        <th>Telefon</th>
                        <th>Adres</th>
                        <th>Oluşturulma</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email ?? '-' }}</td>
                            <td>{{ $company->phone ?? '-' }}</td>
                            <td>{{ $company->address ?? '-' }}</td>
                            <td>{{ $company->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">Henüz bir firma kaydınız yok.</p>
    @endif
</div>
@endsection
