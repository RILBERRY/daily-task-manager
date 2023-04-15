<?php

namespace App\Http\Livewire;

use App\Models\Tasks;
use Livewire\Component;

class Form extends Component
{
    public $task;
    public $title = 'Task';
    public $action = 'task/create';
    public $isTask = false;
    public $type = false;
    public $isFormOpen = false;
    protected $listeners = ['setCreateTaskDialog','setEditTaskDialog'];
    // protected $listeners = ['setCreatePriorityDialog'];
    // protected $listeners = ['setCreateToDoDialog'];
    public function setCreateTaskDialog($status, $type)
    {
        $this->task=null;
        $this->type = $type;
        $this->isTask =  $type=="task" ? true : false;
        $this->action =  'create';
        if(  $this->type == "task" ){
            $this->title = 'Add new Task';

        }elseif(  $this->type == "priority" ){
            $this->title = 'Add new Priority';

        }elseif(  $this->type == "todo" ){
            $this->title = 'Add new To Do';

        }

        $this->isFormOpen = $status;
    }
    public function setEditTaskDialog(Tasks $task, $type)
    {
        $this->task = $task;
        $this->type = $type;
        $this->action =  $task->id.'/edit';

        $this->isTask =  $type=="task" ? true : false;
        $this->title = 'Edit Task';


        $this->isFormOpen = true;
    }
    // public function setCreateToDoDialog($status)
    // {
    //     $this->isTask = true;
    //     $this->isFormOpen = $status;
    // }
    public function render()
    {
        return view('livewire.form');
    }
}
