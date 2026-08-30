<!DOCTYPE html>
<html lang="ka">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>პაროლის აღდგენა - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">პაროლის აღდგენა</h1>
            <p class="text-sm text-slate-500 mt-1">შეიყვანეთ თქვენი ელ-ფოსტა აღდგენის ინსტრუქციის მისაღებად</p>
        </div>


        <form action="#" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="emailInput" class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                <input type="email" id="emailInput" name="email" placeholder="მაგ: example@domain.com" required
                    class="w-full px-4 py-3 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98]">
                აღდგენა
            </button>

            <div class="text-center text-sm text-slate-500 pt-2">
                გახსოვთ პაროლი? <a href="{{ url('/authorize') }}" class="text-indigo-600 font-semibold hover:underline">ავტორიზაცია</a>
            </div>

        </form>
    </div>

</body>

</html>