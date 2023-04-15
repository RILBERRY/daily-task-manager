<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plans;
use App\Models\Tasks;

class ToDoBoard extends Component
{
    protected $tasks;
    public $date;
    
    public function mount()
    {
        $this->date = date('Y-m-d', strtotime(request()->query('date')));
    }

    public function getTasks()
    {
        if(Plans::where('date',$this->date)->exists()){
            return Tasks::where([['plan_id', Plans::where('date',$this->date)->first()->id],['type','to-do']])
            ->orderBy('status', 'asc')
            ->orderBy('time', 'asc')
            ->get();
        }

    }
    public function editTask(Tasks $task){
        $this->emit('form', $task );
    }

    public function checkTask(Tasks $task)
    {
        $task->update([
            'status' => !$task->status,
        ]);
        $this->tasks = $this->getTasks();
    }

    public function render()
    {
        $this->tasks = $this->getTasks();
        return view('livewire.to-do-board',['tasks'=>$this->tasks]);
    }
}
