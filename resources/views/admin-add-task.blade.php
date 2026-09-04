<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('admin.add_task') }}</title>
</head>

<body style="margin: 0; font-family: Arial, sans-serif; background-color: #f4f6f9;">

    <div style="display: flex; height: 100vh; overflow: hidden;">


        <div style="width: 260px; background-color: #343a40; color: #ffffff; display: flex; flex-direction: column; padding: 20px; box-sizing: border-box;">
            <div style="display: flex; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #4b545c; padding-bottom: 15px;">
                <img src="/default-avatar.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; background-color: #6c757d; margin-right: 15px;">
                <div>
                    <div style="font-weight: bold; font-size: 16px;">{{ __('admin.user') }}</div>
                    <div style="font-size: 12px; color: #adb5bd;">{{ __('admin.admin') }}</div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 10px; flex-grow: 1;">
                <a href="/tasks" style="color: #c2c7d0; text-decoration: none; padding: 10px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
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


            <div style="background-color: #ffffff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #dee2e6;">
                <h1 style="margin: 0; font-size: 22px; color: #333;">{{ __('admin.add_task') }}</h1>
                <select onchange="window.location.href='/lang/' + this.value" style="padding: 6px 10px; border-radius: 4px; border: 1px solid #ced4da; cursor: pointer;">
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>ქართული</option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                </select>
            </div>


            <div style="padding: 30px; box-sizing: border-box; max-width: 700px;">
                <div style="background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <form action="/tasks" method="POST">
                        @csrf


                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; color: #333;">{{ __('admin.task_name_en') }}</label>
                            <input type="text" name="title_en" value="{{ old('title_en') }}" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                            @error('title_en')
                            <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; color: #333;">{{ __('admin.task_name_ka') }}</label>
                            <input type="text" name="title_ka" value="{{ old('title_ka') }}" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                            @error('title_ka')
                            <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; color: #333;">{{ __('admin.description_en') }}</label>
                            <textarea name="description_en" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">{{ old('description_en') }}</textarea>
                            @error('description_en')
                            <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; color: #333;">{{ __('admin.description_ka') }}</label>
                            <textarea name="description_ka" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">{{ old('description_ka') }}</textarea>
                            @error('description_ka')
                            <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; color: #333;">{{ __('admin.due_date_field') }}</label>
                            <input type="date" name="due_date" value="{{ old('due_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
                            @error('due_date')
                            <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 14px; font-weight: bold; cursor: pointer;">
                            {{ __('admin.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>