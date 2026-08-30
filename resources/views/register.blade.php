<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Register') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center min-vh-100 py-5">

    <div class="container" style="max-width: 500px;">

        <div class="d-flex justify-content-end mb-3 gap-2">
            <a href="{{ route('lang.switch', 'ka') }}"
                class="btn btn-sm {{ app()->getLocale() == 'ka' ? 'btn-primary' : 'btn-outline-secondary' }}">
                KA
            </a>
            <a href="{{ route('lang.switch', 'en') }}"
                class="btn btn-sm {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-secondary' }}">
                EN
            </a>
        </div>

        <div class="card shadow-sm border-0 p-4 rounded-4">
            <h3 class="mb-4 text-center fw-bold">{{ __('Register') }}</h3>

            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">{{ __('Username') }}</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
                    @error('username')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                    <input type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                    <input type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">{{ __('Repeat Password') }}</label>
                    <input type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">{{ __('Sign up') }}</button>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <a href="{{ route('google.login') }}" class="btn btn-outline-dark w-100 fw-medium py-2 mb-3 d-flex align-items-center justify-content-center gap-2">
                    <svg width="18" height="18" viewBox="0 0 24 24">
                        <path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.6l3.1-3.1C17.3 1.7 14.8 1 12 1 7.5 1 3.7 3.6 1.9 7.3l3.7 2.9C6.5 7.2 9 5 12 5z" />
                        <path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.8z" />
                        <path fill="#FBBC05" d="M5.6 14.8c-.2-.7-.4-1.5-.4-2.3s.2-1.6.4-2.3L1.9 7.3C.7 9.7 0 10.8 0 12s.7 2.3 1.9 4.7l3.7-2.9z" />
                        <path fill="#34A853" d="M12 23c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3 0-5.5-2.2-6.4-5.2L1.9 16c1.8 3.7 5.6 7 10.1 7z" />
                    </svg>
                    {{ __('Google Registration') }}
                </a>
            </form>
        </div>
    </div>

</body>

</html>