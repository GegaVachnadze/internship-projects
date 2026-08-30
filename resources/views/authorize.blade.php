<!DOCTYPE html>
<html lang="ka">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ავტორიზაცია - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">მოგესალმებით</h1>
            <p class="text-sm text-slate-500 mt-1">შეიყვანეთ თქვენი მონაცემები სისტემაში შესასვლელად</p>
        </div>

        <form id="loginForm" class="space-y-5" novalidate>

            <div>
                <label for="userInput" class="block text-sm font-semibold text-slate-700 mb-1.5">Username ან Email</label>
                <input type="text" id="userInput" placeholder="მაგ: user123 ან email@domain.com"
                    class="w-full px-4 py-3 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                <p id="userError" class="text-xs text-rose-500 mt-1.5 hidden font-medium">გთხოვთ შეიყვანოთ მინიმუმ 3 სიმბოლო</p>
            </div>

            <div>
                <label for="passwordInput" class="block text-sm font-semibold text-slate-700 mb-1.5">პაროლი</label>
                <input type="password" id="passwordInput" placeholder="შეიყვანეთ პაროლი"
                    class="w-full px-4 py-3 text-sm bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                <p id="passwordError" class="text-xs text-rose-500 mt-1.5 hidden font-medium">პაროლის ველი სავალდებულოა</p>
            </div>


            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98]">
                ავტორიზაცია
            </button>


            <div class="text-center text-sm text-slate-500 pt-2">
                არ გაქვთ ანგარიში? <a href="{{ url('/register') }}" class="text-indigo-600 font-semibold hover:underline">რეგისტრაცია</a>
            </div>

        </form>
    </div>

    <script>
        const form = document.getElementById('loginForm');
        const userInput = document.getElementById('userInput');
        const passwordInput = document.getElementById('passwordInput');
        const userError = document.getElementById('userError');
        const passwordError = document.getElementById('passwordError');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;

            if (userInput.value.trim().length < 3) {
                userError.classList.remove('hidden');
                userInput.classList.add('border-rose-500', 'bg-rose-50');
                isValid = false;
            } else {
                userError.classList.add('hidden');
                userInput.classList.remove('border-rose-500', 'bg-rose-50');
            }

            if (passwordInput.value.trim() === '') {
                passwordError.classList.remove('hidden');
                passwordInput.classList.add('border-rose-500', 'bg-rose-50');
                isValid = false;
            } else {
                passwordError.classList.add('hidden');
                passwordInput.classList.remove('border-rose-500', 'bg-rose-50');
            }

            if (isValid) {
                alert('ავტორიზაცია წარმატებულია!');
            }
        });
    </script>
</body>

</html>