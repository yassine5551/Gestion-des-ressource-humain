@extends("layouts.admin")
@section("title",$title)
@section("content")
<h1>Crier Une Absence</h1>

<!-- component -->
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
      <form action="https://formbold.com/s/FORM_ID" method="POST">
        <div class="-mx-3 flex flex-wrap">
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
                <label for="countries"  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Sélectionnez l' employee</label>
                <select name="post_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    @foreach($employees as $employee)
                        <option  value="{{$employee->social_number}}">{{$employee->full_name}}</option>
                    @endforeach
                </select>
                @error('post_id')

                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
                    <span class="font-medium">{{$message}}</span>
                </div>
                @enderror
            </div>
          </div>

        </div>

        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
              <div class="mb-5">
                  <label for="countries"  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Date debut</label>
                  <input
                  type="date"
                  name="date"
                  id="date"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>


              </div>
            </div>

          </div>

        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
              <div class="mb-5">
                <label
                  for="date"
                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                  Date fin
                </label>
                <input
                  type="date"
                  name="date"
                  id="date"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            </div>
            </div>
          </div>

          <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
              <div class="mb-5">
                  <label for="countries"  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Raison</label>
                  <select name="post_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                      @foreach($raisons as $raison)
                          <option  value="{{$raison}}">{{$raison}}</option>
                      @endforeach
                  </select>
                  @error('post_id')

                  <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 bg-inherit dark:text-red-400" role="alert">
                      <span class="font-medium">{{$message}}</span>
                  </div>
                  @enderror
              </div>
            </div>

          </div>

          <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">
              <div class="mb-5">
                <label
                  for="date"
                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                  Description
                </label>
                <textarea id="message" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                </div>
          </div>





        <div>
          <button
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          >
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
