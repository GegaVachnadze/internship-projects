<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('admin.task_details') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans m-0">
    <div class="flex h-screen overflow-hidden">

        <x-sidebar />

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-gray-800 border-b border-gray-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">{{ __('admin.task_details') }}</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center text-decoration-none">
                        ✏️ {{ __('admin.edit') }}
                    </a>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8 flex justify-center">
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-8 shadow-lg w-full max-w-2xl h-fit">

                    <div class="space-y-6">
                        <div>
                            <span class="block text-xs uppercase tracking-wider text-gray-400 mb-1">{{ __('admin.task_name') }}</span>
                            <h2 class="text-xl font-bold text-white">
                                {{ app()->getLocale() == 'ka' ? ($task->title_ka ?? $task->title_en) : ($task->title_en ?? $task->title_ka) }}
                            </h2>
                        </div>

                        <div>
                            <span class="block text-xs uppercase tracking-wider text-gray-400 mb-1">{{ __('admin.description') }}</span>
                            <p class="text-gray-300 bg-gray-700/50 p-4 rounded-lg border border-gray-700 leading-relaxed">
                                {{ app()->getLocale() == 'ka' ? ($task->description_ka ?? $task->description_en) : ($task->description_en ?? $task->description_ka) }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-2 border-t border-gray-700">
                            <div>
                                <span class="block text-xs uppercase tracking-wider text-gray-400 mb-1">{{ __('admin.created_at') }}</span>
                                <span class="text-gray-200 font-medium">{{ $task->created_at->format('Y-m-d') }}</span>
                            </div>
                            <div>
                                <span class="block text-xs uppercase tracking-wider text-gray-400 mb-1">{{ __('admin.due_date') }}</span>
                                <span class="{{ \Carbon\Carbon::parse($task->due_date)->isPast() ? 'text-red-400 font-medium' : 'text-gray-200 font-medium' }}">
                                    {{ $task->due_date }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-700 flex justify-end">
                        <a href="/admin-panel" class="bg-gray-700 hover:bg-gray-600 text-gray-200 px-5 py-2.5 rounded-lg text-sm font-medium transition text-decoration-none">
                            {{__('admin.get_back')}}
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>