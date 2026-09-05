<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('admin.add_task') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans m-0">

    <div class="flex h-screen overflow-hidden">


        <div class="w-64 bg-gray-800 border-r border-gray-700 text-white flex flex-col p-4 box-border">
            <div class="flex items-center mb-8 pb-4 border-b border-gray-700 px-2">
                <img src="/default-avatar.png" alt="Avatar" class="w-12 h-12 rounded-full object-cover bg-gray-700 mr-3.5">
                <div>
                    <div class="font-bold text-base text-white">{{ __('admin.user') }}</div>
                    <div class="text-xs text-gray-400">{{ __('admin.admin') }}</div>
                </div>
            </div>

            <div class="flex flex-col gap-2.5 flex-grow">
                <a href="/admin-panel" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                    <span>✅</span> {{ __('admin.my_tasks') }}
                </a>
                <a href="{{ route('tasks.due-tasks') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                    <span>⏰</span> {{ __('admin.due_tasks') }}
                </a>
                <a href="/profile/edit" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
                    <span>🛠️</span> {{ __('admin.edit_profile') }}
                </a>
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


        <div class="flex-grow flex flex-col overflow-y-auto">


            <div class="bg-gray-800 px-8 py-4 flex justify-between items-center border-b border-gray-700">
                <h1 class="m-0 text-2xl font-bold text-white">{{ __('admin.add_task') }}</h1>
                <select onchange="window.location.href='/lang/' + this.value" class="bg-gray-700 border border-gray-600 rounded-lg px-3 py-1.5 text-sm text-white focus:outline-none focus:border-red-500 cursor-pointer">
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>{{__('admin.georgian')}}</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{__('admin.english')}}</option>
                </select>
            </div>


            <div class="p-8 box-border max-w-[700px]">
                <div class="bg-gray-800 p-8 rounded-xl border border-gray-700 shadow-lg">
                    <form action="/tasks" method="POST">
                        @csrf


                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-sm text-white-300">{{ __('admin.task_name_en') }}</label>
                            <input type="text" name="title_en" value="{{ old('title_en') }}" class="w-full p-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white box-border focus:outline-none focus:border-red-500">
                            @error('title_en')
                            <div class="text-red-400 text-xs mt-1.5">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-sm text-white-300">{{ __('admin.task_name_ka') }}</label>
                            <input type="text" name="title_ka" value="{{ old('title_ka') }}" class="w-full p-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white box-border focus:outline-none focus:border-red-500">
                            @error('title_ka')
                            <div class="text-red-400 text-xs mt-1.5">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-sm text-white-300">{{ __('admin.description_en') }}</label>
                            <textarea name="description_en" rows="3" class="w-full p-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white box-border focus:outline-none focus:border-red-500">{{ old('description_en') }}</textarea>
                            @error('description_en')
                            <div class="text-red-400 text-xs mt-1.5">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label class="block mb-2 font-bold text-sm text-white-300">{{ __('admin.description_ka') }}</label>
                            <textarea name="description_ka" rows="3" class="w-full p-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white box-border focus:outline-none focus:border-red-500">{{ old('description_ka') }}</textarea>
                            @error('description_ka')
                            <div class="text-red-400 text-xs mt-1.5">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label class="block mb-2 font-bold text-sm text-white-300">{{ __('admin.due_date_field') }}</label>
                            <input type="date" name="due_date" value="{{ old('due_date') }}" class="w-full p-2.5 bg-gray-700 border border-gray-600 rounded-lg text-white box-border focus:outline-none focus:border-red-500">
                            @error('due_date')
                            <div class="text-red-400 text-xs mt-1.5">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white border-none px-5 py-2.5 rounded-lg text-sm font-bold cursor-pointer transition">
                            {{ __('admin.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>