<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('admin.title')}}</title>
</head>

<body>
    <div style="display: flex; height: 100vh; font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; overflow: hidden;">

        <div style="width: 260px; background-color: #343a40; color: #ffffff; display: flex; flex-direction: column; padding: 20px; box-sizing: border-box;">

            <div style="display: flex; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #4b545c; padding-bottom: 15px;">
                <img src="/default-avatar.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; background-color: #6c757d; margin-right: 15px;">
                <div>
                    <div style="font-weight: bold; font-size: 16px;">{{ __('admin.user') }}</div>
                    <div style="font-size: 12px; color: #adb5bd;">{{ __('admin.admin') }}</div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 10px; flex-grow: 1;">
                <a href="/tasks" style="color: #ffffff; text-decoration: none; padding: 10px 15px; border-radius: 5px; background-color: #007bff; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span>✅</span> {{ __('admin.my_tasks') }}
                </a>
                <a href="/tasks/due" style="color: #c2c7d0; text-decoration: none; padding: 10px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span>⏰</span> {{ __('admin.due_tasks') }}
                </a>
                <a href="/profile/edit" style="color: #c2c7d0; text-decoration: none; padding: 10px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span>🛠️</span> {{ __('admin.edit_profile') }}
                </a>
            </div>

            <div>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="width: 100%; background-color: #dc3545; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; font-size: 14px;">
                        <span>🚪</span> {{ __('admin.logout') }}
                    </button>
                </form>
            </div>
        </div>

        <div style="flex-grow: 1; display: flex; flex-direction: column; overflow-y: auto;">

            <div style="background-color: #ffffff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #dee2e6; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h1 style="margin: 0; font-size: 22px; color: #333;">{{ __('admin.all_tasks') }}</h1>

                <div style="display: flex; align-items: center; gap: 15px;">

                    <select onchange="window.location.href='/lang/' + this.value" style="padding: 6px 10px; border-radius: 4px; border: 1px solid #ced4da; background-color: #fff; cursor: pointer;">
                        <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>ქართული</option>
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    </select>


                    <a href="/tasks/create" style="background-color: #28a745; color: white; padding: 8px 15px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                        <span>➕</span> {{ __('admin.add_task') }}
                    </a>

                    <form action="/tasks/clear-due" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background-color: #ffc107; color: #212529; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold; display: flex; align-items: center; gap: 5px;">
                            <span>🧹</span> {{ __('admin.clear_old_tasks') }}
                        </button>
                    </form>
                </div>
            </div>

            <div style="padding: 30px; box-sizing: border-box;">
                <div style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                        <thead>
                            <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6; color: #495057;">
                                <th style="padding: 15px;">{{ __('admin.task_name') }}</th>
                                <th style="padding: 15px;">{{ __('admin.description') }}</th>
                                <th style="padding: 15px;">{{ __('admin.created_at') }}</th>
                                <th style="padding: 15px;">{{ __('admin.due_date') }}</th>
                                <th style="padding: 15px; text-align: center;">{{ __('admin.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr style="border-bottom: 1px solid #dee2e6;">

                                <td style="padding: 15px; font-weight: 500; color: #333;">
                                    {{ app()->getLocale() == 'ka' ? $task->title_ka : $task->title_en }}
                                </td>


                                <td style="padding: 15px; color: #666;">
                                    {{ app()->getLocale() == 'ka' ? $task->description_ka : $task->description_en }}
                                </td>

                                <td style="padding: 15px; color: #666;">{{ $task->created_at->format('Y-m-d') }}</td>
                                <td style="padding: 15px; color: #28a745;">{{ $task->due_date }}</td>
                                <td style="padding: 15px; text-align: center;">
                                    <div style="display: flex; justify-content: center; gap: 8px;">
                                        <a href="/tasks/{{ $task->id }}" style="background-color: #17a2b8; color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none;" title="{{ __('admin.view') }}">👁️</a>
                                        <a href="/tasks/{{ $task->id }}/edit" style="background-color: #ffc107; color: #212529; padding: 6px 10px; border-radius: 4px; text-decoration: none;" title="{{ __('admin.edit') }}">✏️</a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="margin: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 6px 10px; border-radius: 4px; cursor: pointer;" title="{{ __('admin.delete') }}">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>