<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="auth-container" style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f8fafc; font-family: sans-serif;">
        <div class="auth-card" style="background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05); width: 100%; max-width: 420px; text-align: center;">

            <h2 style="color: #0f172a; font-size: 24px; font-weight: 700; margin-bottom: 8px;">პაროლის შეცვლა</h2>
            <p style="color: #64748b; font-size: 14px; margin-bottom: 24px;">შეიყვანეთ ახალი პაროლი თქვენი ანგარიშისთვის</p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div style="text-align: left; margin-bottom: 16px;">
                    <label for="password" style="display: block; color: #334155; font-size: 13px; font-weight: 600; margin-bottom: 6px;">ახალი პაროლი</label>
                    <input id="password" type="password" name="password" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box; transition: border-color 0.2s;">
                    @error('password')
                    <span style="color: #ef4444; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="text-align: left; margin-bottom: 24px;">
                    <label for="password_confirmation" style="display: block; color: #334155; font-size: 13px; font-weight: 600; margin-bottom: 6px;">გაიმეორეთ პაროლი</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required style="width: 100%; padding: 12px 16px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box; transition: border-color 0.2s;">
                </div>

                <button type="submit" style="width: 100%; background: #5850ec; color: #ffffff; border: none; padding: 12px; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 12px rgba(88, 80, 236, 0.3); transition: background 0.2s;">პაროლის შეცვლა</button>
            </form>

        </div>
    </div>
</body>

</html>