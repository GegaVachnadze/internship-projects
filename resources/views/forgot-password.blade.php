<!DOCTYPE html>
<html lang="ka">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>პაროლის აღდგენა - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="შეიყვანეთ ელ-ფოსტა" required>
    <button type="submit">აღდგენის ლინკის გაგზავნა</button>
</form>

<div class="text-center text-sm text-slate-500 pt-2">
    გახსოვთ პაროლი? <a href="{{ url('/authorize') }}" class="text-indigo-600 font-semibold hover:underline">ავტორიზაცია</a>
</div>

</form>
</div>

</body>

</html>