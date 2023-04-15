@extends('app.main')
@section('content')
    <div class="relative top-0 left-0 w-full bg-white shadow-lg rounded-md">
        <div class="container flex items-center justify-between px-5 py-2 ">
            <div class="flex justify-between space-x-4 w-full flex-wrap sm:flex-nowrap">
                <div class="flex items-center space-x-4 sm:w-full p-2">
                    <button class="flex items-center space-x-2">
                        <div class="text-gray-500">All Tasks</div>
                        <div class="bg-gray-300 rounded-full h-6 w-6 flex items-center justify-center">10</div>
                    </button>
                    <button class="flex items-center space-x-2">
                        <div class="text-gray-500">Pending Tasks</div>
                        <div class="bg-yellow-400 rounded-full h-6 w-6 flex items-center justify-center">5</div>
                    </button>
                    <button class="flex items-center space-x-2">
                        <div class="text-gray-500">Completed Tasks</div>
                        <div class="bg-green-400 rounded-full h-6 w-6 flex items-center justify-center">5</div>
                    </button>
                </div>
                <div class="relative w-full sm:w-2/4">
                    <input type="text" class="bg-gray-100 rounded-full py-2 pr-4 pl-10 w-full focus:outline-none focus:ring focus:ring-blue-400" placeholder="Search...">
                    <div class="absolute top-0 left-0 flex items-center h-full ml-3">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10.5a5.5 5.5 0 11-11 0 5.5 5.5 0 0111 0z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <table class="table w-full mt-5">
        <thead>
            <tr class="bg-gray-400 rounded-md">
                <th class="py-2 px-4 text-left">#</th>
                <th class="py-2 px-4 text-left">Task</th>
                <th class="py-2 px-4 text-left">Start Time</th>
                <th class="py-2 px-4 text-left">Status</th>
                <th class="py-2 px-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class=" border-b-2 hover:bg-gray-200">
                <td class="py-2 px-4 text-left">1</td>
                <td class="py-2 px-4 text-left">Wash cloths</td>
                <td class="py-2 px-4 text-left">2:30 PM</td>
                <td class="py-2 px-4 text-left">Up coming</td>
                <td class="py-2 px-4 text-left"><a href="/task/view">View</a></td>
            </tr>
            <tr class=" border-b-2 hover:bg-gray-200">
                <td class="py-2 px-4 text-left">1</td>
                <td class="py-2 px-4 text-left">Wash cloths</td>
                <td class="py-2 px-4 text-left">2:30 PM</td>
                <td class="py-2 px-4 text-left">Up coming</td>
                <td class="py-2 px-4 text-left"><a href="/task/view">View</a></td>
            </tr>
            <tr class=" border-b-2 hover:bg-gray-200">
                <td class="py-2 px-4 text-left">1</td>
                <td class="py-2 px-4 text-left">Wash cloths</td>
                <td class="py-2 px-4 text-left">2:30 PM</td>
                <td class="py-2 px-4 text-left">Completed</td>
                <td class="py-2 px-4 text-left"><a href="/task/view">View</a></td>
            </tr>
                    
        </tbody>
    </table>
          
@endsection