@extends('layouts.admin')

@section('content')
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
<section class="is-title-bar ">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Posts</li>
        </ul>
        <button class="sm:my-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-modal-toggle="default-modal">
            Ajouter un  nouveau Post
        </button>
    </div>
    <div class="relative">
        <!-- Main modal -->
        <div id="default-modal" data-modal-show="false" aria-hidden="true" class=" hidden  absolute h-modal md:h-full   left-0 right-0 md:inset-0 z-50 justify-center items-center scale-90">
            <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                <!-- Modal content -->
                <form id="add_post" method="post" action="{{route("admin.post.store")}}">
                    @csrf
                <div class="p-6 bg-gray-200 rounded-lg shadow relative">
                    <!-- Modal header -->

                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nom</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
                    </div>

                    <!-- Modal footer -->
                    <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b">
                        <button id="submit_form" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>
                        <button data-modal-toggle="default-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                    </div>
                </div>
                    </form>
                </div>
            </div>
    </div>
        </div>
    </div>
</section>
<div class=" mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
    <div class="p-3">
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">#</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Nom de post</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Nombre des employer</div>
                    </th>

                </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                @foreach($posts as $key => $post)
                <tr>

                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{$key+1 }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium">{{$post->name}}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left font-medium">{{$post->employees->count()}}</div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
