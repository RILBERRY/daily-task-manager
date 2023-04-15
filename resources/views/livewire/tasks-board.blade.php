<div class="w-1/2 p-4 ">
    <div class="mb-4">
        <div class="flex justify-between">
            <h2 class="text-lg font-bold text-gray-600">My Tasks</h2>
            <button onclick="Livewire.emit('setCreateTaskDialog', true, 'task')" class="p-2 bg-blue-500 text-white rounded-md text-sm">Add New Task</button>
        </div>
        
        @if ($tasks)
        @foreach ($tasks as $task)  
            <div class="flex items-center my-2">
                <div class="ml-4 flex-grow border-b-2">
                    <input type="time" name="time" id="time" value="{{$task->time}}" class="mt-1 bg-transparent text-xs text-gray-700 ">
                    <div class="flex space-x-2">
                        <input type="checkbox" name="checkbox" {{$task->status?'checked':''}} wire:click="checkTask({{$task->id}})">
                        <p onclick="Livewire.emit('setEditTaskDialog', {{$task->id}}, 'task')" class=" cursor-pointer {{$task->status?'line-through':''}}">{{$task->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
