<!DOCTYPE html>
<html lang="ka">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Tasks - ვადაგადაცილებული დავალებები</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-sans">
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-800 border-r border-gray-700 flex flex-col justify-between p-4">
            <div>
                <div class="text-xl font-bold text-red-500 mb-8 px-2">🌋 Due Tasks</div>
                <nav class="space-y-2">
                    <a href="{{ url('/tasks/due') }}" class="block px-4 py-2.5 rounded-lg bg-gray-700 text-white font-medium">ვადაგადაცილებული</a>
                    <a href="{{ route('tasks.index') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:bg-gray-700 hover:text-white transition">ყველა დავალება</a>
                </nav>
            </div>
            <div class="pt-4 border-t border-gray-700">
                <label class="block text-xs text-gray-400 mb-1">🌐 ენა / Language</label>
                <select class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-red-500">
                    <option>ქართული</option>
                    <option>English</option>
                </select>
            </div>
        </aside>
        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-gray-800 border-b border-gray-700 px-8 py-4 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-white">ვადაგადაცილებული დავალებები</h1>
                    <p class="text-sm text-gray-400">ამ გვერდზე ნაჩვენებია მხოლოდ ვადაგადაცილებული დავალებები.</p>
                </div>
                <div class="flex items-center space-x-3">
                    <form action="{{ route('tasks.clearOld') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-gray-200 px-4 py-2 rounded-lg text-sm font-medium transition cursor-pointer">
                            🧹 ძველების წაშლა
                        </button>
                    </form>
                    <a href="{{ route('tasks.create') }}" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center">
                        ➕ დავალების დამატება
                    </a>
                </div>
            </header>
            <div class="flex-1 overflow-x-auto p-8">
                <div class="bg-gray-800 border border-gray-700 rounded-xl overflow-hidden shadow-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-700/50 text-gray-400 text-xs uppercase tracking-wider border-b border-gray-700">
                                <th class="py-3.5 px-6">დავალების სახელი</th>
                                <th class="py-3.5 px-6">აღწერა</th>
                                <th class="py-3.5 px-6">შექმნის თარიღი</th>
                                <th class="py-3.5 px-6">შესრულების ბოლო ვადა</th>
                                <th class="py-3.5 px-6 text-center">მოქმედება</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 text-sm">
                            @forelse($tasks as $task)
                            <tr class="hover:bg-gray-700/30 transition">
                                <td class="py-4 px-6 font-medium text-white">{{ $task->title }}</td>
                                <td class="py-4 px-6 text-gray-400 truncate max-w-xs">{{ $task->description }}</td>
                                <td class="py-4 px-6 text-gray-400">{{ $task->created_at->format('Y-m-d') }}</td>
                                <td class="py-4 px-6 text-red-400 font-medium">{{ $task->due_date }}</td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('tasks.edit', $task->id) }}" title="რედაქტირება" class="text-gray-400 hover:text-blue-400 transition">✏️</a>
                                        <form action="{{ route('tasks.clearSingle', $task->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="წაშლა" class="text-gray-400 hover:text-red-400 transition cursor-pointer">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400">
                                    🎉 ვადაგადაცილებული დავალებები არ მოიძებნა!
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