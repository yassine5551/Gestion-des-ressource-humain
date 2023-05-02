@extends('layouts.admin')
@section('title', $title)
@section('content')
    @if (session('success_msg'))
        <div class="fixed bottom-0 right-0 m-4 z-50">
            <div id="success-alert"
                class="bg-green-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
                <span>{{ session('success_msg') }}</span>
                <button id="close-alert"
                    class="text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="fixed bottom-0 right-0 m-4">
            <div id="fail-alert"
                class=" relative bg-red-500 text-white font-bold rounded-lg px-4 py-3 shadow-md flex items-center justify-between">
                <div class="flex flex-col p-3 ">

                    @foreach ($errors->all() as $err)
                        <span>{{ $err }}</span>
                    @endforeach
                </div>

                <button id="close-alert"
                    class=" absolute top-0 right-0 text-white hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-400 rounded-full">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <section class="is-title-bar relative">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Congés</li>
            </ul>

            <button
                class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                data-modal-target="#modal">
                Ajouter un congé
            </button>
        </div>
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true" id="modal">

            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- Modal content -->
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form id="add_leave" method="post" class="px-4 py-6" action="{{ route('admin.leave.store') }}">
                        @csrf

                        <!-- Form title -->
                        <div class="mb-6">
                            <button id="close" type="button"
                                class=" absolute  top-0 right-0 text-gray-500 hover:text-gray-800 hover:bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none"
                                aria-label="Close modal" data-modal-close>
                                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M15.707 4.293a1 1 0 0 0-1.414-1.414L10 8.586 5.707 4.293A1 1 0 1 0 4.293 5.707L8.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L10 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L11.414 10l4.293-4.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="employee_id">
                                Employee
                            </label>
                            <select name="employee_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="employee_id">
                                @foreach ($employees as $emp)
                                    <option {{ $emp->inHoliday() ? 'disabled' : '' }} value="{{ $emp->getId() }}">
                                        {{ $emp->user->getFirstName() }} {{ $emp->user->getLastName() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Form inputs -->
                        <div class="flex">

                            <div class="mb-4 m-2 md:w-1/2">
                                <label class="block text-gray-700 font-bold mb-2" for="name-input">
                                    Date Début
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="start_at" type="date" name="start_at">
                            </div>
                            <div class="mb-4 m-2 md:w-1/2">
                                <label class="block text-gray-700 font-bold mb-2" for="email-input">
                                    Date Fin
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="end_at" type="date" name="end_at">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="employee_id">
                                Type de Congé
                            </label>
                            <select name="type"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="type">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Form actions -->
                        <div class="flex justify-end">
                            <button
                                class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                type="submit">
                                Enregister
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>


        </div>
    </section>

    <div class="card-content" id="content">
        <div class=" mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="p-3">
                <div class="overflow-x-auto resp">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nom compléte</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">date début</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">date Fin</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Totale des Jours</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Le Reste</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td data-label="nom complet" class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                                    src={{ "https://avatars.dicebear.com/v2/initials/{$leave->employee->user->getFirstName()[0]}-{$leave->employee->user->getLastName()[0]}.svg" }}>
                                            </div>
                                            <div class="font-medium text-gray-800">
                                                {{ $leave->employee->user->getFirstName() }}
                                                {{ $leave->employee->user->getLastName() }}</div>
                                        </div>
                                    </td>
                                    <td data-label="date debut" class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $leave->getStartAt() }}</div>
                                    </td>
                                    <td data-label="date fin" class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500">{{ $leave->getEndAt() }}</div>
                                    </td>
                                    <td data-label="Totale des Jours" class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">{{ $leave->Days() + 1 }} jours</div>
                                    </td>
                                    <td data-label="le rest" class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">{{ $leave->RestDays() }} jours</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let employees = {{ \Illuminate\Support\Js::from($ids) }};
        const ids = employees.map(item => item.id)
        let employee_id = $('#employee_id');
        let start_at = $('#start_at');
        let end_at = $("#end_at");
        $("#submit_form").click(function(e) {
            e.preventDefault()
            let clean = true;
            if (!ids.includes(social_number.val())) {
                clean = false;
                social_number.addClass('border-2 border-rose-500')
            }
            if (start_at.val() == "") {
                clean = false;
                start_at.addClass('border-2 border-rose-500')
            }
            if (end_at.val() == "") {
                clean = false;
                end_at.addClass('border-2 border-rose-500')
            }
            if (clean) {
                $('#add_leave').submit()
            }
        })
        start_at.change(() => {
            start_at.removeClass('border-2 border-rose-500')
        })
        end_at.change(() => {
            end_at.removeClass('border-2 border-rose-500')
        })
    </script>
@endsection
