@extends('layouts.auth')

@section('title', 'Giriş Yap')

@section('content')
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Giriş Yap</h4>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Posta</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="E-posta adresinizi girin">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Şifre</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Şifrenizi girin" required>
                                    <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Beni hatırla</label>
                                </div>
                                <a href=" " class="text-muted">Şifremi unuttum</a>
                            </div>

                            <div class="d-grid text-center mb-3">
                                <button class="btn btn-primary" type="submit">Giriş Yap</button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">Hesabınız yok mu? <a href="{{ route('register') }}" class="text-primary fw-medium ms-1">Kayıt Ol</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function togglePassword(fieldId) {
        var field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
@endpush
@endsection