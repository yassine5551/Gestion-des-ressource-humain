@extends("layouts.admin")

@section("content")
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t  mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Crier Un Employee
                        </h6>

                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="{{route("admin.employee.store")}}" method="post">
                        @csrf
                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Information d'employee
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        numéro de sécurité sociale
                                    </label>
                                    <input type="text" id="disabled-input-2" name="social_number" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old("society_number",$society_number) }}" readonly>
                                    @error('social_number')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input name="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old("email")}}" placeholder="email@example.com">
                                    @error('email')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input value="{{old("first_name")}}" type="text" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('first_name')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input value="{{old("last_name")}}" name="last_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('last_name')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input name="born_date" value="{{old("born_date")}}" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('born_date')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
                                        <span class="font-medium">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">

                                    <label for="countries"  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Sélectionnez le poste</label>
                                    <select name="post_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                        @foreach($posts as $post)
                                            <option {{old("post_id")==$post->getId()?"selected":''}} value="{{$post->getId()}}">{{$post->getName()}}</option>
                                        @endforeach
                                    </select>
                                    @error('post_id')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input name="hiring_date" value="{{old("hiring_date")}}" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('hiring_date')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <input name="salary" value="{{old("salary")}}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @error('salary')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
                                    <textarea name="adress" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    {{old("adress")}}</textarea>
                                </div>
                                @error('adress')

                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
                                    <span class="font-medium">{{$message}}</span>
                                </div>
                                @enderror
                            </div>

                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Telephone
                                    </label>
                                    <input value="{{old("phone")}}" name="phone" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+212 XXX XXX XXX">
                                    @error('phone')

                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
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
            </div>

        </div>


@endsection
