@extends("layouts.admin")
@section('title',$title)
@section("content")



    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Stagiaires</li>
            </ul>

        </div>
    </section>
    @if(session('success_msg'))
        <div id="toast-success" class="flex fixed top-20 right-0 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{session('success_msg')}}.</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @endif

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Stagiaires
            </p>

        </header>
    </div>

    <div class="" id="content">


        <div class=" bg-white shadow-lg rounded-sm border border-gray-200">

            <div class="p-3">
                <div class="overflow-x-auto resp" id="container">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th>#</th>
                            <th class="p-2 whitespace-nowrap uppercase">
                                <div class="font-semibold  text-left">Nom complet</div>
                            </th>

                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">Status</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Date debut</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Date fin</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center">Project</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-center"></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                        @foreach($stagiaires as $key=>$stagiaire)


                            <tr>
                                <td data-label="#" class="p-2 whitespace-nowrap">
                                    {{$key+1}}
                                </td>
                                <td data-label="NOM COMPLET" class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src={{"https://avatars.dicebear.com/v2/initials/{$stagiaire->getFirstName()[0]}-{$stagiaire->getLastName()[0]}.svg"}}></div>
                                        <div class="font-medium text-gray-800">{{$stagiaire->getFirstName()}} {{$stagiaire->getLastName()}}</div>
                                    </div>
                                </td>

                                <td data-label="STATUS" class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">
                                        @if($stagiaire->getStatus())
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-500 text-white">
                                                    Terminé
                                                </span>

                                        @else
                                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-500 text-white">
                                                 En cours
                                            </span>

                                        @endif
                                    </div>
                                </td>

                                <td data-label="Date debut" class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$stagiaire->getDateDebut()}}</div>
                                </td>

                                <td data-label="date fin" class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$stagiaire->getDateFin()}}</div>
                                </td>
                                <td data-label="projet" class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center">{{$stagiaire->project->getName()}}</div>
                                </td>
                                <td data-label="actions" class="p-2 whitespace-nowrap ">
                                    <div class="flex items-center text-center">

                                    <form id="del_stg" method="post" action="{{route("admin.stagiaire.delete",$stagiaire->getId())}}" >
                                        @csrf
                                        @method('delete')
                                    </form>


                                        <button onclick="document.getElementById('del_stg').submit()" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full text-center m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>

                                            <button  data-data-attribute="{{$stagiaire->getStatus()}}" type="submit" class="btn-download bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full text-center m-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                                    <path d="M10 3v9a1 1 0 0 0 2 0V3a1 1 0 1 0-2 0zM4 10a1 1 0 0 0-1 1v4a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-4a1 1 0 1 0-2 0v4a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4a1 1 0 0 0-1-1z" stroke-width="1" />
                                                </svg>
                                            </button>

                                        </div>

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
@section("script")
    <script>
        let btnsdownload  = document.getElementsByClassName("btn-download")
        for (item of btnsdownload){
            if(item.dataset.dataAttribute==0){
                item.setAttribute('disabled',true)
                item.style.backgroundColor = "gray"
            }
        }
    </script>
@endsection
