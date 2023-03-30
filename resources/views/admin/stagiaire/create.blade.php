@extends("layouts.admin")
@section("title",$title)
@section("content")
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Crier des Stagiaires</li>
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
    <div class="card-content">
        <form action="{{route("admin.stagiaire.store")}}" method="post">
            @csrf
            <hr class="border-b-1 border-blueGray-300">
            <h6 class="text-blueGray-400 text-sm  mb-6 font-bold uppercase">
                Information d'employee
            </h6>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            numéro de sécurité sociale
                        </label>
                        <input type="text" name="social_number" class="cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" value="{{old("society_number",$society_number) }}" readonly>
                        @error('social_number')

                        <div class="p-4 mb-4 text-sm text-red-500 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            address Email
                        </label>
                        <input name="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" value="{{old("email")}}" placeholder="email@example.com">
                        @error('email')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
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
                            Prenom
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
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">

                        <label for="countries"  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Sélectionnez le poste</label>
                        <select name="post_id" id="countries" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" >
                            @foreach($posts as $post)
                                <option {{old("post_id")==$post->getId()?"selected":''}} value="{{$post->getId()}}">{{$post->getName()}}</option>
                            @endforeach
                        </select>
                        @error('post_id')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Date D'embauche
                        </label>
                        <input name="hiring_date" value="{{old("hiring_date")}}" type="date" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" >
                        @error('hiring_date')

                        <div class="p-4 text-sm text-red-500 rounded-lg  bg-inherit " role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Salaire
                        </label>
                        <input name="salary" value="{{old("salary")}}" type="text" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" >
                        @error('salary')

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

                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Telephone
                        </label>
                        <input value="{{old("phone")}}" name="phone" type="text" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-gray-600" placeholder="+212 XXX XXX XXX">
                        @error('phone')

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
