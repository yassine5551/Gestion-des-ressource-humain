@extends('layouts.admin')

@section('content')

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
    <div class="fixed bottom-0 right-0 m-4">
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


<section class="is-title-bar relative">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Projets</li>
        </ul>
            <button
            class="m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"

            data-modal-target="#modal"
            >
                Ajouter un  nouveau Projet
            </button>
    </div>
    <!-- Modal trigger button -->


    <!-- Modal backdrop -->
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
                <form id="add_project" method="post" action="{{route("admin.project.store")}}" class="px-4 py-6">
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
                        <label class="block text-gray-700 font-bold mb-2" for="name">
                            Nom De Projet
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Entrer le nom ici">
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

   </section>
<div class=" mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
    <div class="p-3">
        <div class="overflow-x-auto resp">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">#</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Nom de projet</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">status</div>
                    </th>

                </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                @foreach($projects as $key => $project)
                <tr>

                    <td data-label="#" class="p-2 whitespace-nowrap">
                        <div class="text-left">{{$key+1 }}</div>
                    </td>
                    <td data-label="Nom de projet" class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium">{{$project->getName()}}</div>
                    </td>
                    <td data-label="status" class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium"></div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>

    </script>
@endsection
