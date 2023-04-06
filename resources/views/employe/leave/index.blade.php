@extends('layouts.employee')


@section('content')




<section class="is-title-bar relative">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Employee</li>
            <li>Congée</li>
        </ul>

        <button
        class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"

        data-modal-target="#modal"
        >
            Ajouter un congee
        </button>
    </div>
    <div
        class="fixed z-10 inset-0 overflow-y-auto hidden"
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
                    <form id="add_leave" method="post" class="px-4 py-6" action="{{route("admin.leave.store")}}">
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
                    <div class="flex">

                        <div class="mb-4 m-2 md:w-1/2">
                            <label class="block text-gray-700 font-bold mb-2" for="name-input">
                                Date Debut
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_at" type="date" name="start_at">
                        </div>
                        <div class="mb-4 m-2 md:w-1/2">
                            <label class="block text-gray-700 font-bold mb-2" for="email-input">
                                Date Fin
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_at" type="date" name="end_at">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="type">
                            leaves
                        </label>
                        <select name="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type" >
                            @foreach($types as $type)
                                <option value={{$type}}>{{$type}}</option>
                            @endforeach
                        </select>
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


    </div>
</section>

@endsection

