@extends("layouts.admin")
@section("title",$title)
@section("content")
    <section class="is-title-bar relative">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Absences</li>
            </ul>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                data-modal-target="#modal"
            >
                declarer une absence
            </button>
        </div>
    </section>

    @if(session('success_msg'))
        <div class="fixed bottom-0 right-0 m-4 z-50">
            <div id="success-alert" class="bg-green-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
                <span>{{session('success_msg')}}</span>
                <button id="close-alert" class="text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="fixed bottom-0 right-0 m-4 ">
            <div id="fail-alert" class=" relative bg-red-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
                <div class="flex flex-col p-3 ">

                    @foreach($errors->all() as $err)
                        <span>{{$err}}</span>
                    @endforeach
                </div>

                <button id="close-alert" class=" absolute top-0 right-0 text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div
        class="fixed z-50 inset-0 m-6 overflow-y-auto hidden"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        id="modal"
    >

        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Modal overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal content -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form  id="add_leave" method="post" action="{{route("admin.absence.store")}}" class="px-4 py-6">
                    @csrf
                    <!-- Form title -->
                    <div class="mb-6">
                        <button
                            id="close"
                            type="button"
                            class=" absolute  top-0 right-0 text-gray-500 hover:text-gray-800 hover:bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none"
                            aria-label="Close modal"
                            data-modal-close
                        >
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M15.707 4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293A1 1 0 1 0 4.293 5.707L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293z" clip-rule="evenodd" />
                            </svg>
                        </button>


                    </div>

                    <!-- Form inputs -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="employee_number">
                            Employee
                        </label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="employee_number" name="employee_number">
                            @foreach($employees as $emp)
                                <option {{$emp->inHoliday()?'disabled':''}} value="{{$emp->getSocialNumber()}}">{{$emp->user->getFirstName()}} {{$emp->user->getLastName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="date">
                            Date
                        </label>
                        <input type="date"  name="date"  id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="raison">
                            Motif
                        </label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="raison" name="raison">
                            @foreach ($raisons as $raison)
                                <option value="{{$raison}}">{{$raison}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="description">
                            Description
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Enter your la description "></textarea>
                    </div>

                    <!-- Form actions -->
                    <div class="flex justify-end">
                        <button class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="submit">
                            Enregister
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <section id="scroll-content" class="m-2 overflow-x-auto" style="width: 98%;border-radius: 10px;box-shadow:2px 2px 10px orange; max-height: 450px;border: 2px black solid">
        <table class="table-auto w-full">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
        <tr>
            <th class="sticky left-0 z-10 bg-gray-500 text-white px-6 py-4">Employee</th>
            @for($i=1;$i<=$daysInCurrentMonth;$i++)
            <th class="bg-gray-500 text-white px-6 py-4">{{$i}}</th>
            @endfor
{{--  --}}
        </tr>
        </thead>
        <tbody class="text-xs font-semibold uppercase text-gray-400 bg-gray-50" >
        @foreach($employees as $employee)
            <tr>
            <td class="sticky left-0 z-10 bg-gray-500 text-white px-6 py-4">{{$employee->user->getFirstName()}} {{$employee->user->getLastName()}}</td>
                @for($i=1;$i<=$daysInCurrentMonth;$i++)
                    <th class="{{$i==\Carbon\Carbon::today()->day?"bg-sky-200":""}} {{$i>\Carbon\Carbon::today()->day?"bg-sky-400":""}}
                        {{($employee->getHiringDate()>$createDate($current_year."-".$current_month."-".$i)||\Carbon\Carbon::parse($current_year."-".$current_month."-".$i)->format('l')=="Sunday")? "bg-gray-300 border-y-0":""}}
                        border border-gray-400 px-4 py-2">
                        @if(\Carbon\Carbon::parse($current_year."-".$current_month."-".$i)->format('l')=="Sunday")
                        @elseif($employee->hasLeaveInThisDay($current_year."-".$current_month."-".$i))
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3a1 1 0 0 0-1 1v4H7a1 1 0 1 0 0 2h2v6a1 1 0 1 0 2 0v-6h2a1 1 0 1 0 0-2h-2V4a1 1 0 0 0-1-1z" />
                                </svg>
                            </div>

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

@section("script")
    <script>
        const columns = $('.bg-sky-200')
        columns[0].scrollIntoView({ behavior: "smooth", block: "center" })

    </script>
@endsection
