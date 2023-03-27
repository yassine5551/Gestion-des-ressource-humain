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
    <div class="my-2 flex sm:flex-row flex-col">
        <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <option value="{{$current_year}}" selected>{{$current_year}}</option>
                    <option value="{{$current_year-1}}" >{{$current_year-1}}</option>
                    <option value="{{$current_year-2}}" >{{$current_year-2}}</option>
                </select>
                <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <section id="container " class="m-2">
        <table class="table-auto w-full" style="border: 2px black solid">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
        <tr>
            <th class="border border-gray-400 px-4 py-2">Employee</th>
            @for($i=1;$i<=$daysInCurrentMonth;$i++)
            <th class="border border-gray-400 px-4 py-2">{{$i}}</th>
            @endfor

        </tr>
        </thead>
        <tbody class="text-xs font-semibold uppercase text-gray-400 bg-gray-50" >
        @foreach($employees as $employee)
            <tr>
            <td class="border border-gray-400 px-4 py-2">{{$employee->user->getFirstName()}} {{$employee->user->getLastName()}}</td>
                @for($i=1;$i<=$daysInCurrentMonth;$i++)
                    <th class="{{$i==\Carbon\Carbon::today()->day?"bg-sky-200":""}} {{$i>\Carbon\Carbon::today()->day?"bg-sky-400":""}}
                        {{$employee->getHiringDate()>$createDate($current_year."-".$current_month."-".$i)? "bg-gray-300":""}}
                        border border-gray-400 px-4 py-2">
                        @if($createDate(now()->format("Y-m-d"))<=$createDate($current_year."-".$current_month."-".$i))
                        @else
                            @if($employee->isAbsentInThisDay($current_year."-".$current_month."-".$i))
                                <div class="w-6 h-6 rounded-full flex justify-center items-center bg-red-500 text-white">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0zm5.7 12.3l-.7.7L10 10.7l-4.3 4.3-.7-.7L9.3 10 4.7 5.4l.7-.7L10 9.3l4.3-4.3.7.7L10.7 10l4.6 4.6z"/>
                                    </svg>
                                </div>
                            @elseif($employee->getHiringDate()>$createDate($current_year."-".$current_month."-".$i))
                            @else
                                <div class="w-6 h-6 rounded-full flex justify-center items-center bg-green-500 text-white">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </div>
                            @endif
                       @endif

                    </th>
                @endfor
        </tr>
        @endforeach
        </tbody>

    </table>
    </section>


@endsection


 @section("script")
     <script>
         $('#container').css({
             overflowY:scroll
         })
     </script>
 @endsection
