@extends('layouts.employee')


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
    <section class="is-title-bar relative">
        <div class="flex flex-col md:flex-row items-center justify-between mb-4  md:space-y-0">
            <ul>
                <li>Changer Mon Mot De Passe</li>
            </ul>
        </div>
    </section>
    <div class="mx-5">

        <form method="post" action="{{ route('employe.settings.changepassword_store') }}">
            @csrf
            @method('patch')
            <div class="mb-6">
                <label for="current_password" class="text-sm font-medium text-gray-900 block mb-2">Mot de pass
                    actuell</label>
                <input name="current_password" type="password" id="current_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required="">
            </div>
            <div class="mb-6">
                <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Nouveau Mot de passe</label>
                <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required="">
            </div>
            <div class="mb-6">
                <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Confirme nouveau mot de
                    passe</label>
                <input type="password" name="password_confirmation" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required="">
            </div>

            <button id="change_psd_btn" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Changer</button>
        </form>

    </div>
@endsection
@section('script')
    <script>
        $("#change_psd_btn").click(function(e) {
                e.preventDefault()
                const form = $(this).parent()
                Swal.fire({
                    title: 'Confirmer La Modification ?',
                    showDenyButton: true,
                    confirmButtonText: 'accepter',
                    confirmButtonColor: 'green',
                    denyButtonText: `Annuler`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $(form).submit()

                    } else if (result.isDenied) {

                    }
                })
            }


        )
    </script>
@endsection
