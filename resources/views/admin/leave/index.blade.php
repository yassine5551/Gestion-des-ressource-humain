@extends("layouts.admin")

@section("content")

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Congée</li>
            </ul>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-modal-toggle="default-modal">
                Ajouter un congee
            </button>
        </div>
            <!-- Main modal -->
            <div id="default-modal" data-modal-show="false" aria-hidden="true" class=" hidden  sticky h-modal md:h-full left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <form id="add_leave" method="post" action="{{route("admin.leave.store")}}">
                        @csrf
                    <div class="p-6 bg-gray-200 rounded-lg shadow relative">
                        <!-- Modal header -->

                            <div class="mb-6">
                                <label for="social_number" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                                <select id="social_number" name="social_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->social_number}}">{{$emp->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="start_at" class="block mb-2 text-sm font-medium text-gray-900 ">Debut</label>
                                <input type="date"  name="start_at"  id="start_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
                            </div>
                        <div class="mb-6">
                            <label for="end_at" class="block mb-2 text-sm font-medium text-gray-900 ">Fin</label>
                            <input type="date" name="end_at" id="end_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " >
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

        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
    </section>
@endsection
@section("script")
    <script>
        let employees = {{\Illuminate\Support\Js::from($employees)}};
        const social_numbers = employees.map(item=>item.social_number)
        let social_number = $('#social_number');
        let start_at = $('#start_at');
        let end_at = $("#end_at");
        $("#submit_form").click(function (e)
        {
            e.preventDefault()
            let clean = true;
            if(!social_numbers.includes(social_number.val()))
            {
                clean = false;
                social_number.addClass('border-2 border-rose-500')
            }
            if(start_at.val() == "")
            {
                clean = false;
                start_at.addClass('border-2 border-rose-500')
            }
            if(end_at.val() == "")
            {
                clean = false;
                end_at.addClass('border-2 border-rose-500')
            }
            if(clean)
            {
                $('#add_leave').submit()
            }
        })
        start_at.change(()=>{
            start_at.removeClass('border-2 border-rose-500')
        })
        end_at.change(()=>{
            end_at.removeClass('border-2 border-rose-500')
        })
    </script>
@endsection
