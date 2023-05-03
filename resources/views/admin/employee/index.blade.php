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
        <div class="fixed bottom-0 right-0 m-4 ">
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
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Employés</li>
            </ul>

        </div>
    </section>

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Employés
            </p>

        </header>
    </div>





    <div class="card-content" id="content">


        <div class=" mx-auto bg-white shadow-lg rounded-sm border border-gray-200">

            <div class="p-3">
                <div class="overflow-x-auto resp" id="container">
                    <table id="myTable" class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nom Compléte</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Postes</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Etat</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Salaire</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Date D'embauche</div>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($employees as $employer)
                                <tr>
                                    <td data-label="NOM COMPLETE" class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full"
                                                    src={{ "https://avatars.dicebear.com/v2/initials/{$employer->user->getFirstName()[0]}-{$employer->user->getLastName()[0]}.svg" }}>
                                            </div>
                                            <div class="font-medium text-gray-800">{{ $employer->user->getFirstName() }}
                                                {{ $employer->user->getLastName() }}</div>
                                        </div>
                                    </td>
                                    <td data-label="le post" class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $employer->post->getName() }}</div>
                                    </td>
                                    <td data-label="etat" class="p-2 whitespace-nowrap">
                                        <div class="text-center font-medium text-green-500">
                                            @if ($employer->inHoliday())
                                                <span
                                                    class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full">
                                                    Congée </span>
                                            @else
                                                <span
                                                    class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full">
                                                    Disponible </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td data-label="SALAIRE" class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">{{ $employer->getSalary() . '  DH' }} </div>
                                    </td>
                                    <td data-label="DATE D'EMBAUCH" class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">{{ $employer->getHiringDate() }}</div>
                                    </td>
                                    <td data-label="actions" class="p-2 whitespace-nowrap ">
                                        <div class="flex items-center text-center">

                                            <form id="del_stg" method="post"
                                                action="{{ route('admin.employee.delete', $employer->getId()) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="icon-delete ">
                                                    <i class="fa fa-trash text-red-500 text-xl"></i>
                                                </button>

                                            </form>



                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="table-pagination">
                        <div class="buttons">
                            <div id="pagination">
                                <div class="flex justify-center items-center">
                                    <button id="prev"
                                        class="mr-6 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-lg font-bold text-gray-700 hover:bg-gray-200 transition duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.293 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 111.414 1.414L5.414 9H17a1 1 0 010 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <span id="page"></span>
                                    <button id="next"
                                        class=" ml-6 flex items-center justify-center w-10 h-10 bg-white rounded-full shadow-lg font-bold text-gray-700 hover:bg-gray-200 transition duration-300 ease-in-out mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9.707 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 010-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
  
            const table = document.getElementById('myTable');
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');
            const pageSpan = document.getElementById('page');

            let currentPage = 1;
            const rowsPerPage = 10;
            const numRows = table.rows.length - 1;

            // Calculate total number of pages
            const numPages = Math.ceil(numRows / rowsPerPage);

            // Function to display rows for the current page
            function displayRows() {
                // Calculate start and end indices for current page
                const start = (currentPage - 1) * rowsPerPage + 1;
                const end = Math.min(start + rowsPerPage - 1, numRows);

                // Loop through all rows in table and hide/show based on page
                for (let i = 1; i <= numRows; i++) {
                    if (i >= start && i <= end) {
                        table.rows[i].style.display = '';
                    } else {
                        table.rows[i].style.display = 'none';
                    }
                }

                // Update page number display
                pageSpan.innerHTML = `<span class="flex items-center"> <i class="flex items-center mr-5 justify-center w-10 h-10 bg-white rounded-full shadow-lg font-bold text-gray-700 hover:bg-gray-200 transition duration-300 ease-in-out mr-2"> ${currentPage}</i> of <i class="flex ml-5 items-center justify-center w-10 h-10 bg-white rounded-full shadow-lg font-bold text-gray-700 hover:bg-gray-200 transition duration-300 ease-in-out mr-2"> ${numPages}</i></span>
`;
            }

            // Initial display of rows
            displayRows();

            // Event listeners for previous/next buttons
            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayRows();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentPage < numPages) {
                    currentPage++;
                    displayRows();
                }
            });
            $(".icon-delete").click(function(e) {
            e.preventDefault()
            const form = $(this).parent()
            console.log(form)
            Swal.fire({
                text: "confirmer la supprission!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimer Le projet!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                    Swal.fire(
                        'Supprime!',
                        'Votre Projet est supprime avec success',
                        'success'
                    )
                }
            })

        })
        </script>

    @endsection
