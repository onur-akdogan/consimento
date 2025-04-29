@extends('layouts.auth')

@section('title', 'Kayıt Ol')

@section('content')
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Kayıt Ol</h4>
                        </div>

                        <div class="mb-3 text-start">
                            <a href="{{ route('login') }}" class="text-muted">
                                <i class="fas fa-arrow-left me-1"></i> Geri
                            </a>
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

                        <form action="{{ route('register.post') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Ad Soyad</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="company_name" class="form-label">Şirket Adı (Opsiyonel)</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="company_name" name="company_name" value="{{ old('company_name') }}">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Posta</label>
                                <div class="input-group">
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('assets/images/flags/tr.png') }}" width="16" height="11" alt="TR">
                                        +90
                                    </span>
                                    <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Şifre</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Şifrenizin en az:</label>
                                <div class="password-requirements ms-3">
                                    <div class="requirement {{ session('validation.password_requirements.uppercase') ? 'text-success' : 'text-danger' }}">
                                        <i class="fas fa-circle me-1 small"></i> 1 büyük harf
                                    </div>
                                    <div class="requirement {{ session('validation.password_requirements.number') ? 'text-success' : 'text-danger' }}">
                                        <i class="fas fa-circle me-1 small"></i> 1 rakam
                                    </div>
                                    <div class="requirement {{ session('validation.password_requirements.special') ? 'text-success' : 'text-danger' }}">
                                        <i class="fas fa-circle me-1 small"></i> 1 özel karakter (!@#$%^&*)
                                    </div>
                                    <div class="requirement {{ session('validation.password_requirements.length') ? 'text-success' : 'text-danger' }}">
                                        <i class="fas fa-circle me-1 small"></i> 12 karakter
                                    </div>
                                    <div class="mt-1">içermesi gerekiyor.</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="marketing_emails" name="marketing_emails" {{ old('marketing_emails') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="marketing_emails">
                                        Önemli kampanyalardan haberdar olmak için anlık/kısa mesaj, e-posta ve telefon aracılığıyla <a href="#" class="text-primary">elektronik ileti</a> almak istiyorum.
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms_conditions" name="terms_conditions" required {{ old('terms_conditions') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="terms_conditions">
                                        <a href="#" class="text-primary">Kullanıcı Sözleşmesi'ni</a>, <a href="#" class="text-primary">Aydınlatma Metni'ni</a>, okudum ve kabul ediyorum.
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="privacy_policy" name="privacy_policy" required {{ old('privacy_policy') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="privacy_policy">
                                        <a href="#" class="text-primary">Açık Rıza Metni'ni</a> okudum ve kabul ediyorum.
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid text-center">
                                <div class="mb-3">
                                    <img src="{{ asset('assets/images/captcha.png') }}" alt="Captcha" class="img-fluid">
                                </div>
                                <button class="btn btn-primary" type="submit">Üyelik Oluştur</button>
                            </div>
                        </form>
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

    // Password validation in real-time
    document.getElementById('password').addEventListener('input', function() {
        var password = this.value;
        var hasUpperCase = /[A-Z]/.test(password);
        var hasNumber = /[0-9]/.test(password);
        var hasSpecial = /[!@#$%^&*]/.test(password);
        var hasLength = password.length >= 12;
        
        document.querySelectorAll('.requirement')[0].classList.toggle('text-success', hasUpperCase);
        document.querySelectorAll('.requirement')[0].classList.toggle('text-danger', !hasUpperCase);
        
        document.querySelectorAll('.requirement')[1].classList.toggle('text-success', hasNumber);
        document.querySelectorAll('.requirement')[1].classList.toggle('text-danger', !hasNumber);
        
        document.querySelectorAll('.requirement')[2].classList.toggle('text-success', hasSpecial);
        document.querySelectorAll('.requirement')[2].classList.toggle('text-danger', !hasSpecial);
        
        document.querySelectorAll('.requirement')[3].classList.toggle('text-success', hasLength);
        document.querySelectorAll('.requirement')[3].classList.toggle('text-danger', !hasLength);
    });
</script>
@endpush
@endsection