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

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Stagiaires
            </p>

        </header>
    </div>

    <div class="card-content" id="content">

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
    </div>
@endsection
@section("script")

@endsection
