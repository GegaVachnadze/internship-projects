<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('admin.admin_panel')}}</title>
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
                <a href="/due-tasks" class="text-gray-400 hover:bg-gray-700 hover:text-white text-decoration-none px-4 py-2.5 rounded-lg flex items-center gap-2.5 text-sm transition">
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

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-gray-800 border-b border-gray-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">{{__('admin.admin_panel')}}</h1>

                </div>
                <div class="flex items-center space-x-3">

                    <form action="{{ route('tasks.clearOld') }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-gray-200 px-4 py-2 rounded-lg text-sm font-medium transition cursor-pointer">
                            {{__('admin.delete')}}
                        </button>
                    </form>

                    <a href="{{ route('tasks.create') }}" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center text-decoration-none">
                        {{__('admin.add_task')}}
                    </a>
                </div>
            </header>


            <div class="bg-gray-800/50 px-8 py-2.5 border-b border-gray-700/50 flex justify-end">
                <select onchange="window.location.href='/lang/' + this.value" class="bg-gray-700 border border-gray-600 rounded-lg px-3 py-1.5 text-sm text-white focus:outline-none focus:border-red-500 cursor-pointer">
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>{{ __('admin.georgian') }}</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('admin.english') }}</option>
                </select>
            </div>


            <div class="flex-1 overflow-x-auto p-8">
                <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-700/50 text-gray-400 text-xs uppercase tracking-wider border-b border-gray-700">
                                <th class="py-3.5 px-6">{{__('admin.task_name')}}</th>
                                <th class="py-3.5 px-6">{{__('admin.description')}}</th>
                                <th class="py-3.5 px-6">{{__('admin.created_at')}}</th>
                                <th class="py-3.5 px-6">{{__('admin.due_date')}}</th>
                                <th class="py-3.5 px-6 text-center">{{__('admin.action')}}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 text-sm">
                            @forelse($tasks as $task)
                            <tr class="hover:bg-gray-700/30 transition">
                                <td class="py-4 px-6 font-medium text-white">
                                    {{ app()->getLocale() == 'ka' ? ($task->title_ka ?? $task->title_en) : ($task->title_en ?? $task->title_ka) }}
                                </td>
                                <td class="py-4 px-6 text-gray-400 truncate max-w-xs">
                                    {{ app()->getLocale() == 'ka' ? ($task->description_ka ?? $task->description_en) : ($task->description_en ?? $task->description_ka) }}
                                </td>
                                <td class="py-4 px-6 text-gray-400">{{ $task->created_at->format('Y-m-d') }}</td>
                                <td class="py-4 px-6 {{ \Carbon\Carbon::parse($task->due_date)->isPast() ? 'text-red-400 font-medium' : 'text-gray-400' }}">
                                    {{ $task->due_date }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('tasks.show', $task->id) }}" title="ნახვა" class="text-gray-400 hover:text-white transition">👁️</a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" title="რედაქტირება" class="text-gray-400 hover:text-blue-400 transition">✏️</a>
                                        <form action="{{ route('tasks.clearSingle', $task->id) }}" method="POST" class="inline m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="წაშლა" class="text-gray-400 hover:text-red-400 transition cursor-pointer border-none bg-transparent">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400">
                                    {{__('admin.no_due_tasks')}}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>