<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="resources/css/app.css"> --}}
    @vite('resources/css/app.css')
    @livewireStyles

    <title>Document</title>
</head>
<body>
    @if ($errors->any() || Session::get('error'))
    <div id="msg" class=" z-40  text-white text-center fixed bottom-3 w-0 h-14 duration-500 overflow-hidden">
        <ul class="my-auto relative left-3/4 -translate-x-3/4 ">
            @foreach ($errors->all() as $error)
                <li class="my-auto">{{ $error }}</li>
            @endforeach
            <li class="my-auto">{{ Session::get('error') }} </li>
        </ul>
        <img src="/img/paint/or-2.svg" class=" relative bottom-[5rem] left-2/4 -translate-x-[60%] -rotate-[180deg] -z-10 w-[40rem]">

    </div>
    @endif
    @if ($errors->any() || Session::get('success'))
    <div id="msg" class=" z-40  text-white text-center fixed bottom-3 w-0 h-14 duration-500 overflow-hidden">
        <ul class="my-auto relative left-3/4 -translate-x-3/4 ">
            @foreach ($errors->all() as $error)
                <li class="my-auto">{{ $error }}</li>
            @endforeach
            <li class="my-auto">{{ Session::get('success') }} </li>
        </ul>
        <img src="/img/paint/green-1.svg" class=" relative bottom-[5rem] left-2/4 -translate-x-[60%] -rotate-[180deg] -z-10 w-[40rem]">

    </div>
    @endif
    <div class="bg-blue-900 fixed py-5 px-4 flex items-center justify-between w-full z-20" >
        <div class="text-white font-bold text-lg">Daily Task Manager</div>
        {{-- <div class="text-white text-center">April 14, 2023</div> --}}
        <div class="flex items-center">
            <div class="h-8 w-8 rounded-full bg-gray-500" onclick="openNav()"></div>
        </div>
    </div>
    <div class=" absolute text-center right-0 top-14 overflow-hidden duration-500 w-52 h-0 z-10 p-2 bg-blue-800 rounded-b-md " id="navBar">
        <div class="w-full flex flex-col space-y-2">
            <h4 class="p-2 pt-6 text-white">Ali Rilwan</h4>
            {{-- <a href="/home" class="p-2 w-full bg-white rounded-md hover:bg-gray-300">Home</a --}}
            <a href="/calendar" class="p-2 w-full bg-white rounded-md hover:bg-gray-300">Calandar</a>
            {{-- <a href="/manage-tasks" class="p-2 w-full bg-white rounded-md hover:bg-gray-300">Manage tasks</a> --}}
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="p-2 w-full rounded-md text-white hover:bg-gray-300">Logout</button>
            </form>
        </div>
    </div>
    <div class="w-full  md:w-5/6  mx-auto  p-5 pt-20">
        
        @yield('content')
        
    </div>
    @livewireScripts
    <script>
        var msg = document.getElementById('msg');
        var navBar = document.getElementById('navBar');
        setTimeout(function() {
            msg.classList.toggle('p-2', msg.classList.contains('w-0'));
            msg.classList.toggle('w-full', msg.classList.contains('w-0'));
            msg.classList.remove('w-0', msg.classList.contains('w-0'));
        }, 50);
        setTimeout(function() {
            msg.classList.toggle('p-0', msg.classList.contains('w-full'));
            msg.classList.toggle('w-0', msg.classList.contains('w-full'));
            msg.classList.remove('w-full', msg.classList.contains('w-full'));
        }, 3000);
        setTimeout(function() {
            msg.classList.toggle('hidden', !msg.classList.contains('w-full'));
        }, 5000);
        
        function openNav(){
            navBar.classList.toggle('h-0', navBar.classList.contains('h-44'));
            navBar.classList.toggle('h-44', !navBar.classList.contains('h-0'));
        }
        

    </script>
</body>
</html>