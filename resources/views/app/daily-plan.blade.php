@extends('app.main')
@section('content')
<div class="flex justify-between p-5 align-bottom h-28">
    <h4 class="text-3xl font-semibold my-auto">Daily Plan</h4>
    <div class="paint-1 w-53  relative">
        <img src="/img/paint.svg" class="w-72 relative  -z-10 -right-20">
        <input type="date" name="date" value="@if(request('date')){{request('date')}}@endif" id="date" onchange="SelectedDate()" class="p-2 absolute bg-transparent top-5 -right-6 z-1" >
    </div>
</div>

<div class="h-screen z-10">
    <div class="h-4/5 flex">
        <livewire:tasks-board />
        
        <div class="w-1/2 p-4 ">
            <livewire:priority-board />
            
            <livewire:to-do-board />
        </div>
    </div>
</div>
<livewire:form />
<div>
    <img src="/img/paint/green-1.svg" class=" fixed top-[0rem] -left-[5rem] rotate-[27deg] -z-10 w-96">
    <img src="/img/paint/green-1.svg" class=" fixed top-[5rem] -left-[10rem] rotate-[48deg] -z-10 w-96">
    <img src="/img/paint/green-2.svg" class=" fixed top-[5rem] -left-[5rem] rotate-[38deg] -z-10 w-96">
    
    <img src="/img/paint/or-1.svg" class=" fixed top-[0rem] -right-[5rem] -rotate-[197deg] -z-20 w-96">
    <img src="/img/paint/or-1.svg" class=" fixed top-[5rem] -right-[10rem] -rotate-[168deg] -z-20 w-96">
    <img src="/img/paint/or-2.svg" class=" fixed top-[5rem] -right-[8rem] rotate-[158deg] -z-20 w-96">
   
    <img src="/img/paint/pea-1.svg" class=" fixed bottom-[0rem] -left-[5rem] -rotate-[17deg] -z-10 w-96">
    <img src="/img/paint/pea-1.svg" class=" fixed bottom-[5rem] -left-[10rem] -rotate-[38deg] -z-10 w-96">
    <img src="/img/paint/pea-2.svg" class=" fixed bottom-[5rem] -left-[5rem] -rotate-[28deg] -z-10 w-96">
    <img src="/img/paint/green-2.svg" class=" fixed -bottom-[7rem] -right-[3rem] -rotate-[180deg] -z-10 w-[40rem]">
</div>
<script>
    function SelectedDate(){
        date = document.getElementById('date').value;
        window.location.replace('/calendar/' + date + '/plan?date='+date);
        console.log(date);
    }
</script>
          
@endsection