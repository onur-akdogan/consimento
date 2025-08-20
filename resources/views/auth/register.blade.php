@extends('layouts.auth')

@section('title', 'Kayıt Ol')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 py-10">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 uppercase">Kayıt Ol</h2>
        </div>

        <div class="mb-4">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                <i class="fas fa-arrow-left mr-1"></i> Geri
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Ad Soyad -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Ad Soyad</label>
                <div class="relative">
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute right-3 top-2.5 text-gray-400"><i class="fas fa-user"></i></span>
                </div>
            </div>

            <!-- Şirket Adı -->
            <div>
                <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Şirket Adı (Opsiyonel)</label>
                <div class="relative">
                    <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute right-3 top-2.5 text-gray-400"><i class="fas fa-building"></i></span>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-Posta</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute right-3 top-2.5 text-gray-400"><i class="fas fa-envelope"></i></span>
                </div>
            </div>

            <!-- Telefon -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                <div class="flex items-center border rounded-lg overflow-hidden">
                    <span class="flex items-center gap-2 px-3 bg-gray-100 text-sm text-gray-600">
                        <img src="{{ asset('assets/images/flags/tr.png') }}" alt="TR" class="w-5 h-auto"> +90
                    </span>
                    <input type="text" name="phone" id="phone" required value="{{ old('phone') }}"
                        class="w-full px-4 py-2 focus:outline-none">
                </div>
            </div>

            <!-- Şifre -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="absolute right-3 top-2.5 text-gray-400 cursor-pointer" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <!-- Şifre Kuralları -->
            <div class="text-sm text-gray-700">
                <p class="mb-1">Şifrenizin en az:</p>
                <ul class="ml-4 space-y-1" id="password-requirements">
                    <li class="requirement text-red-500"><i class="fas fa-circle text-xs mr-2"></i> 1 büyük harf</li>
                    <li class="requirement text-red-500"><i class="fas fa-circle text-xs mr-2"></i> 1 rakam</li>
                    <li class="requirement text-red-500"><i class="fas fa-circle text-xs mr-2"></i> 1 özel karakter (!@#$%^&*)</li>
                    <li class="requirement text-red-500"><i class="fas fa-circle text-xs mr-2"></i> 12 karakter</li>
                </ul>
            </div>

            <!-- Checkboxes -->
            <div class="space-y-3 text-sm text-gray-700">
                <div class="flex items-start gap-2">
                    <input type="checkbox" name="marketing_emails" id="marketing_emails" {{ old('marketing_emails') ? 'checked' : '' }}
                        class="mt-1">
                    <label for="marketing_emails">
                        Önemli kampanyalardan haberdar olmak için <a href="#" class="text-blue-500 underline">elektronik ileti</a> almak istiyorum.
                    </label>
                </div>

                <div class="flex items-start gap-2">
                    <input type="checkbox" name="terms_conditions" id="terms_conditions" required {{ old('terms_conditions') ? 'checked' : '' }}
                        class="mt-1">
                    <label for="terms_conditions">
                        <a href="#" class="text-blue-500 underline">Kullanıcı Sözleşmesi'ni</a> ve
                        <a href="#" class="text-blue-500 underline">Aydınlatma Metni'ni</a> okudum ve kabul ediyorum.
                    </label>
                </div>

                <div class="flex items-start gap-2">
                    <input type="checkbox" name="privacy_policy" id="privacy_policy" required {{ old('privacy_policy') ? 'checked' : '' }}
                        class="mt-1">
                    <label for="privacy_policy">
                        <a href="#" class="text-blue-500 underline">Açık Rıza Metni'ni</a> okudum ve kabul ediyorum.
                    </label>
                </div>
            </div>

            <!-- Captcha ve Submit -->
            <div class="text-center space-y-4 pt-2">
                <div>
                    <img src="{{ asset('assets/images/captcha.png') }}" alt="Captcha" class="mx-auto w-40 h-auto">
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Üyelik Oluştur
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        field.type = field.type === "password" ? "text" : "password";
    }

    document.getElementById('password').addEventListener('input', function () {
        const password = this.value;
        const requirements = [
            /[A-Z]/.test(password),
            /[0-9]/.test(password),
            /[!@#$%^&*]/.test(password),
            password.length >= 12
        ];
        document.querySelectorAll('#password-requirements .requirement').forEach((el, i) => {
            el.classList.toggle('text-green-600', requirements[i]);
            el.classList.toggle('text-red-500', !requirements[i]);
        });
    });
</script>
@endpush
@endsection
