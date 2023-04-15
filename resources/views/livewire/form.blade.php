<div >
    <div wire:click="setCreateTaskDialog(false,'task')" class=" fixed bg-gray-300/60 top-0 left-0 w-screen h-screen {{$isFormOpen?'':'hidden'}}"></div>
    <form  method="post" action="{{$action}}" class="w-3/6 py-5 rounded-md h-[20rem] bg-white absolute top-1/4 left-2/4 -translate-x-2/4 {{$isFormOpen?'':'hidden'}}">
        @csrf
        <div class="flex justify-between shadow-lg w-full px-5">
            <h4 class="text-lg text-gray-500 font-semibold">{{$title}}</h4>
            <button>
                <img src="/img/done.svg" class="w-10" srcset="">
            </button>
        </div>
        <div class="flex items-center  my-2 px-5">
            <div class="ml-4 flex-grow">
                <div class="w-full flex justify-between {{$isTask?'':''}}">
                    <div>
                        <label class="block font-medium text-gray-700">Select type</label>
                        <select name="type" >
                            <option value="task" @if($task){{$task->type =='task'?'selected':''}}@endif>Task</option>
                            <option value="priority" @if($task){{$task->type =='priority'?'selected':''}}@endif>Priority</option>
                            <option value="to-do" @if($task){{$task->type =='to-do'?'selected':''}}@endif>To do</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Pick Time</label>
                        <input type="time" name="time" id="time" value="@if($task){{$task->time}}@endif" class="mt-1 bg-transparent text-gray-700 ">
                    </div>
                </div>
                <label class="block font-medium text-gray-700">Description</label>
                <textarea type="text" name="description" id="text" class="w-full bg-transparent border-b-2 text border-b-gray-300 h-40 p-2">@if($task){{$task->description}}@else @endif</textarea>
            </div>
        </div>
    
    </form>
</div>

