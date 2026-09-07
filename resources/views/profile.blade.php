<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('admin.edit_profile') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans m-0">
    <div class="flex h-screen overflow-hidden">

        <x-sidebar />

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-gray-800 border-b border-gray-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">{{ __('admin.edit_profile') }}</h1>
                </div>
            </header>

            <div class="bg-gray-800/50 px-8 py-2.5 border-b border-gray-700/50 flex justify-end">
                <select onchange="window.location.href='/lang/' + this.value" class="bg-gray-700 border border-gray-600 rounded-lg px-3 py-1.5 text-sm text-white focus:outline-none focus:border-red-500 cursor-pointer">
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>{{ __('admin.georgian') }}</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('admin.english') }}</option>
                </select>
            </div>

            <div class="flex-1 overflow-y-auto p-8 flex justify-center">
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-8 shadow-lg w-full max-w-xl h-fit">

                    @if(session('success'))
                    <div class="mb-4 p-4 bg-green-500/20 border border-green-500 text-green-300 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-5">
                            <label class="block text-gray-300 text-sm font-medium mb-2">არსებული პაროლი *</label>
                            <input type="password" name="current_password" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-red-500">
                            @error('current_password')
                            <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="block text-gray-300 text-sm font-medium mb-2">ახალი პაროლი (მინ. 4 სიმბოლო) *</label>
                            <input type="password" name="password" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-red-500">
                            @error('password')
                            <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="block text-gray-300 text-sm font-medium mb-2">გაიმეორე ახალი პაროლი *</label>
                            <input type="password" name="password_confirmation" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-red-500">
                            @error('password_confirmation')
                            <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-300 text-sm font-medium mb-2">პროფილის ფოტო</label>
                            <input type="file" name="photo" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-700 file:text-white hover:file:bg-gray-600 cursor-pointer">
                            @error('photo')
                            <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-6 py-2.5 rounded-lg text-sm font-medium transition cursor-pointer">
                                ცვლილებების შენახვა
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>