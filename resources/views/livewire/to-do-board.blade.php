<div class="mb-4 h-1/2 bg-[#A3C5C4] p-4 rounded-md">
    <div class="flex justify-between">
        <h2 class="text-lg font-bold text-gray-600">To Do</h2>
        <button  onclick="Livewire.emit('setCreateTaskDialog', true, 'todo')" class="p-2 bg-blue-500 text-white rounded-md text-sm">Add New To-do</button>
    </div>

    @if ($tasks)
    @foreach ($tasks as $task)  
        <div class="flex items-center my-2">
            <div class="ml-4 flex-grow border-b-2">
                <div class="flex space-x-2">
                    <input type="checkbox" name="checkbox" {{$task->status?'checked':''}} wire:click="checkTask({{$task->id}})">
                    <p onclick="Livewire.emit('setEditTaskDialog', {{$task->id}}, 'task')" class=" cursor-pointer {{$task->status?'line-through':''}}">{{$task->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
    @endif
    {{-- @foreach ($tasks as $task)  
        <div class="flex items-center  my-2">
            <div class="ml-4 flex-grow">
                <textarea type="text" name="text" id="text" class="w-full bg-transparent border-b-2 text border-b-gray-300">This is some thing to do in the about time</textarea>
            </div>
        </div>
    @endforeach --}}
</div>
