<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="password">ახალი პაროლი</label>
            <input id="password" type="password" name="password" required>
            @error('password')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">გაიმეორეთ პაროლი</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">პაროლის შეცვლა</button>
    </form>
</body>

</html>