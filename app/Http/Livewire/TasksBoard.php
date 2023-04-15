<?php

namespace App\Http\Livewire;

use App\Models\Plans;
use App\Models\Tasks;
use Livewire\Component;

class TasksBoard extends Component
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
            return Tasks::where([['plan_id', Plans::where('date',$this->date)->first()->id],['type','task']])
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
        return view('livewire.tasks-board',['tasks'=>$this->tasks]);
    }
}
