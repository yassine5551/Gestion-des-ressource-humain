@extends("layouts.admin")
@section("title",$title)
@section("content")
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Ajouter un Stagiaire</li>
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

    <div class="card-content">
        <form action="{{route("admin.stagiaire.store")}}" method="post">
            @csrf
            <hr class="border-b-1 border-blueGray-300">
            <h6 class="text-blueGray-400 text-sm  mb-6 font-bold uppercase">
                Information de stagiaire
            </h6>
            <div class="flex flex-wrap">


                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Nom
                        </label>
                        <input value="{{old("first_name")}}" type="text" name="first_name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                        @error('first_name')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Prénom
                        </label>
                        <input value="{{old("last_name")}}" name="last_name" type="text" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                        @error('last_name')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Date De Naissance
                        </label>
                        <input name="born_date" value="{{old("born_date")}}" type="date" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600">
                        @error('born_date')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>

            </div>
            <hr class="mt-6 border-b-1 border-blueGray-300">

            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                 Information du projet
            </h6>
                <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Date début
                        </label>
                        <input name="date_debut" value="{{old("date_debut")}}" type="date" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" >
                        @error('date_debut')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Date fin
                        </label>
                        <input name="date_fin" value="{{old("date_fin")}}" type="date" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" >
                        @error('date_fin')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>

            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                        Sujet de Project
                    </label>
                    <select name="project_id" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                        @foreach ($projects as $project )
                            <option value="{{$project->getId()}}">{{$project->getName()}}</option>
                        @endforeach
                    </select>
                    @error('project_id')

                    <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                        <span class="font-medium">{{$message}}</span>
                    </div>
                    @enderror
                </div>
            </div>

                </div>




            <hr class="mt-6 border-b-1 border-blueGray-300">

            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Contact Information
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Address
                        </label>
                        <textarea name="adress" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-5 text-gray-600 resize-none">{{old("adress")}}</textarea>
                    </div>
                    @error('adress')

                    <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                        <span class="font-medium">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Télephone
                        </label>
                        <input value="{{old("phone")}}" name="phone" type="text" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" placeholder="+212 XXX XXX XXX">
                        @error('phone')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Address Email
                        </label>
                        <input name="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" value="{{old("email")}}" placeholder="email@example.com">
                        @error('email')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class=" m-4 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Enregistrer</button>


            <hr class="mt-6 border-b-1 border-blueGray-300">

        </form>

</div>

@endsection
