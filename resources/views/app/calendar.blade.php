@extends('app.main')
@section('content')
    <h3>calendar</h3>
    <div class="inline-block w-full">
        <div class="bg-white rounded-lg shadow-md">
          <div class="flex items-center justify-between px-4 py-2 border-b border-gray-200">
            <button class="text-gray-600 hover:text-gray-800" onclick="previousMonth()">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                <path d="M14 3L6 10l8 7" />
              </svg>
            </button>
            <div class="text-gray-800 font-medium" id="monthYear"></div>
            <button class="text-gray-600 hover:text-gray-800" onclick="nextMonth()">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                <path d="M6 3l8 7-8 7" />
              </svg>
            </button>
          </div>
          <div class="grid grid-cols-7 gap-1 p-2">
            <div class="text-center text-gray-500 font-medium uppercase">Sun</div>
            <div class="text-center text-gray-500 font-medium uppercase">Mon</div>
            <div class="text-center text-gray-500 font-medium uppercase">Tue</div>
            <div class="text-center text-gray-500 font-medium uppercase">Wed</div>
            <div class="text-center text-gray-500 font-medium uppercase">Thu</div>
            <div class="text-center text-gray-500 font-medium uppercase">Fri</div>
            <div class="text-center text-gray-500 font-medium uppercase">Sat</div>
            @for ($i = 1; $i <= $daysInMonth; $i++)
              <a href="/calendar/{{$i}}/plan?date={{$i}}" class="text-center py-3 bg-gray-100 cursor-pointer hover:bg-gray-200 w-23 h-32" onclick="selectedDate = getDate({{ $i }})">
                {{ $i }}
                </a>
            @endfor
          </div>
        </div>
      </div>
      
      <script>
        let currentDate = new Date();
        let selectedDate = null;
        let daysInMonth = getDaysInMonth(currentDate.getFullYear(), currentDate.getMonth() + 1);
      
        function previousMonth() {
          currentDate.setMonth(currentDate.getMonth() - 1);
          daysInMonth = getDaysInMonth(currentDate.getFullYear(), currentDate.getMonth() + 1);
          displayMonthYear();
        }
      
        function nextMonth() {
          currentDate.setMonth(currentDate.getMonth() + 1);
          daysInMonth = getDaysInMonth(currentDate.getFullYear(), currentDate.getMonth() + 1);
          displayMonthYear();
        }
      
        function getDaysInMonth(year, month) {
          const date = new Date(year, month - 1, 1);
          const days = [];
      
          while (date.getMonth() === month - 1) {
            days.push(new Date(date));
            date.setDate(date.getDate() + 1);
          }
      
          return days.length;
        }
      
        function getDate(day) {
          const year = currentDate.getFullYear();
          const month = currentDate.getMonth() + 1;
          return year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
        }
      
        function displayMonthYear() {
          document.getElementById('monthYear').textContent = currentDate.toLocaleString('default', {
            month: 'long',
            year: 'numeric'
          });
        }
      
        displayMonthYear();
      </script>
      
      
      
          
@endsection