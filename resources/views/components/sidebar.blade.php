<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="w-64 bg-gray-800 border-r border-gray-700 text-white flex flex-col p-4 box-border">

        <div class="flex items-center mb-8 pb-4 border-b border-gray-700 px-2">
            <img src="{{ auth()->user()->avatar ?? '/default-avatar.png' }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover bg-gray-700 mr-3.5">
            <div>
                <div class="font-bold text-base text-white">{{ auth()->user()->name ?? __('admin.user') }}</div>
                <div class="text-xs text-gray-400">{{ __('admin.admin') }}</div>
            </div>
        </div>

        <div class="flex flex-col gap-2.5 flex-grow">
            <a href="/admin-panel" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                <span>✅</span> {{ __('admin.my_tasks') }}
            </a>
            <a href="/due-tasks" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                <span>⏰</span> {{ __('admin.due_tasks') }}
            </a>
            <a href="/profile" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                <span>🛠️</span> {{ __('admin.edit_profile') }}
            </a>
        </div>

        <div class="mb-4 px-2">
            <label class="block text-xs text-gray-400 mb-1.5 font-medium">ენა / Language</label>
            <select onchange="window.location.href='/lang/' + this.value" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-500 cursor-pointer">
                <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>{{ __('admin.georgian') }}</option>
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('admin.english') }}</option>
            </select>
        </div>

        <div>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white border-none px-4 py-2.5 rounded-lg cursor-pointer flex items-center justify-center gap-2.5 text-sm font-medium transition">
                    <span>🚪</span> {{ __('admin.logout') }}
                </button>
            </form>
        </div>
    </div>
</body>

</html>