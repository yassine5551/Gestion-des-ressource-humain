@extends("layouts.admin")
@section("title",$title)
@section("content")
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Absences</li>
            </ul>

        </div>
    </section>
    <section id="container">


    <table class="w-full border-collapse">
        <thead>
        <tr>
            <th class="border border-gray-400 px-4 py-2">Employee</th>
            @for($i=1;$i<=$daysInCurrentMonth;$i++)
            <th class="border border-gray-400 px-4 py-2">{{$i}}</th>
            @endfor

        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
            <td class="border border-gray-400 px-4 py-2">{{$employee->user->getFirstName()}} {{$employee->user->getLastName()}}</td>
                @for($i=1;$i<=$daysInCurrentMonth;$i++)
                    <th class="{{$i==\Carbon\Carbon::today()->day?"bg-sky-200":""}} {{$i>\Carbon\Carbon::today()->day?"bg-sky-400":""}} border border-gray-400 px-4 py-2">

                    </th>
                @endfor
        </tr>
        @endforeach
        </tbody>

    </table>
    </section>
{{--    <div class="w-6 h-6 rounded-full flex justify-center items-center bg-green-500 text-white">--}}
{{--        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">--}}
{{--            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--    --}}
{{--    <div class="w-6 h-6 rounded-full flex justify-center items-center bg-red-500 text-white">--}}
{{--        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">--}}
{{--            <path d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0zm5.7 12.3l-.7.7L10 10.7l-4.3 4.3-.7-.7L9.3 10 4.7 5.4l.7-.7L10 9.3l4.3-4.3.7.7L10.7 10l4.6 4.6z"/>--}}
{{--        </svg>--}}
{{--    </div>--}}
@endsection


 @section("script")
     <script>
         $('#container').css({
             overflowY:scroll
         })
     </script>
 @endsection
