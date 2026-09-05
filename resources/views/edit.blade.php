<div style="max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); font-family: sans-serif;">
    <h2 style="margin-bottom: 20px; color: #333; text-align: center;">{{__('admin.edit')}}</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">{{__('admin.task_name_en')}} - {{__('admin.only_english')}}</label>
            <input type="text" name="title_en" value="{{ old('title_en', $task->title_en ?? '') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('title_en')
            <span style="color: #dc3545; font-size: 13px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>


        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">{{__('admin.task_name_ka')}} - {{__('admin.only_georgian')}}</label>
            <input type="text" name="title_ka" value="{{ old('title_ka', $task->title_ka ?? '') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('title_ka')
            <span style="color: #dc3545; font-size: 13px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>


        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">{{__('admin.description_en')}} - {{__('admin.only_english')}}</label>
            <textarea name="description_en" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">{{ old('description_en', $task->description_en ?? '') }}</textarea>
            @error('description_en')
            <span style="color: #dc3545; font-size: 13px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>


        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">{{__('admin.description_ka')}} - {{__('admin.only_georgian')}}</label>
            <textarea name="description_ka" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">{{ old('description_ka', $task->description_ka ?? '') }}</textarea>
            @error('description_ka')
            <span style="color: #dc3545; font-size: 13px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>


        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">{{__('admin.due_date_field')}}</label>
            <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('due_date')
            <span style="color: #dc3545; font-size: 13px; display: block; margin-top: 5px;">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" style="width: 100%; background-color: #007bff; color: white; border: none; padding: 12px; border-radius: 4px; font-size: 16px; cursor: pointer; font-weight: bold;">{{__('admin.edit')}}</button>
    </form>
</div>