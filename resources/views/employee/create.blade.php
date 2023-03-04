@extends("layouts.admin")

@section("content")
    <h1>Ajouter un Employer</h1>
    <form class="w-full max-w-lg m-auto border-white">
        <div class="grid md:grid-cols-4 gap- m-4">
            <div class=" md:col-span-2 mb-4">
                <label class="block text-white-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">First Name</label>
                <input type="text"  class="bg-orange-100 text-sky-800 border-solid border-2">
            </div>
            <div class="md:col-span-2 mb-4" >
                <label class="block text-white-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">Last Name</label>
                <input type="text"  class="bg-orange-100 text-sky-800 border-solid border-2 focus:border-green-400">
            </div>
        </div>
    </form>
@endsection
