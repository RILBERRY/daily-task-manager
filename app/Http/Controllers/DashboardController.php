<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Tasks;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('app.home');
    }
    public function calendar()  
    {
        $daysInMonth = 30;
        return view('app.calendar',compact('daysInMonth'));
    }
    
    public function manageTasks()
    {
        return view('app.manage-tasks');
    }
    public function dailyPlan($date)
    {
        return view('app.daily-plan');
    }

    public function createNewTask(Request $request, $date)
    {
        $selectedDate = date('Y-m-d', strtotime($date));
        $year = date('Y', strtotime($selectedDate));

        if($year != date('Y')){
            // dd($selectedDate);
            return redirect()->back()->with('error','Please select a valid Date');
        }

        // dd($request, $selectedDate);
        $data = $request->validate([

            'type'=>'required',
            'description'=>'required',
        ]);

        $data['time'] = !$request->has('time')?'00:00':$request->get('time');
        $planData['date'] = $selectedDate;
        $planData['user_id'] = auth()->user()->id;
        $data['user_id'] = auth()->user()->id;
        
        $data['plan_id'] = $this->findOrCreatePlan($planData)->id;
        $status = $this->createTask($data);
        return $status
        ? redirect()->back()->with('success','New Task Added')
        : redirect()->back()->with('error','Something went wrong');
    }

    public function editTask( $date, Tasks $task, Request $request)
    {
        $data = $request->validate([
            'type'=>'required',
            'description'=>'required',
        ]);
        $data['time'] = !$request->has('time')?'00:00':$request->get('time');
        $status = $this->editTasks($task, $data);
        return $status
        ? redirect()->back()->with('success','Task Edited')
        : redirect()->back()->with('error','Something went wrong');
    }

    public function createTask($data)
    {
        return Tasks::create($data);
        
    }
    public function editTasks($task, $data)
    {
        // dd($task, $data);
        return $task->update($data);
        
    }
    public function findOrCreatePlan($data)
    {
        return Plans::where('date',$data['date'])->exists()
        ? Plans::where('date',$data['date'])->first()
        :Plans::create($data);
        
        
    }
}
