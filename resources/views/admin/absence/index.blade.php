@extends("layouts.admin")
@section("title",$title)
@section("content")
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Absences</li>
            </ul>
            <button class="sm:my-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-modal-toggle="default-modal">
                declarer une absence
            </button>
        </div>
                    <div id="default-modal" data-modal-show="false" aria-hidden="true" class=" hidden  absolute  h-modal md:h-full left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <form id="add_leave" method="post" action="{{route("admin.absence.store")}}">
                        @csrf
                    <div class="p-6 bg-gray-200 rounded-lg shadow relative">
                        <!-- Modal header -->

                            <div class="mb-6">
                                <label for="employee_number" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                                <select id="employee_number" name="employee_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                    @foreach($employees as $emp)
                                        <option {{$emp->inHoliday()?'disabled':''}} value="{{$emp->getSocialNumber()}}">{{$emp->user->getFirstName()}} {{$emp->user->getLastName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 ">date</label>
                                <input type="date"  name="date"  id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
                            </div>
                        <div class="mb-6">
                            <label for="raison" class="block mb-2 text-sm font-medium text-gray-900 ">Motif</label>
                            <select name="raison" id="raison"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                @foreach ($raisons as $raison)
                                <option value="{{$raison}}">{{$raison}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-6">
                                <label for="raison" class="block mb-2 text-sm font-medium text-gray-900 ">Commentaire</label>
                            <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  id="" cols="30" rows="10"></textarea>
                                    </div>

                        <!-- Modal footer -->
                        <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b">
                            <button id="submit_form" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>
                            <button data-modal-toggle="default-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
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
    <section  class="m-2 overflow-x-auto" style="width: 98%;height: 380px;border: 2px black solid">
        <table class="table-auto w-full">
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
                        {{($employee->getHiringDate()>$createDate($current_year."-".$current_month."-".$i)||\Carbon\Carbon::parse($current_year."-".$current_month."-".$i)->format('l')=="Sunday")? "bg-gray-300":""}}
                        border border-gray-400 px-4 py-2">
                        @if(\Carbon\Carbon::parse($current_year."-".$current_month."-".$i)->format('l')=="Sunday")
                        @elseif($employee->hasLeaveInThisDay($current_year."-".$current_month."-".$i))
                            <span style="width: 250px!important;" class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">C</span>

                        @else
                        @if($createDate(now()->format("Y-m-d"))<$createDate($current_year."-".$current_month."-".$i))
                        @else

                            @if($employee->getHiringDate()>$createDate($current_year."-".$current_month."-".$i))
                            @elseif($employee->isAbsentInThisDay($current_year."-".$current_month."-".$i))
                                <div class="w-6 h-6 rounded-full flex justify-center items-center bg-red-500 text-white">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0zm5.7 12.3l-.7.7L10 10.7l-4.3 4.3-.7-.7L9.3 10 4.7 5.4l.7-.7L10 9.3l4.3-4.3.7.7L10.7 10l4.6 4.6z"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-6 h-6 rounded-full flex justify-center items-center bg-green-500 text-white">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </div>
                            @endif
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


