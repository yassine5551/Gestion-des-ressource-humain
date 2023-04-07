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

               
    @endif
    <section class="is-title-bar relative">
    <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Les Demandes du Congee</li>
        </ul>
    </div>
    </section>
@endsection