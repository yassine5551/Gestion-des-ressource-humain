@extends("layouts.admin")
@section('title',$title)
@section("content")



    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Employees</li>
            </ul>

        </div>
    </section>

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Employees
            </p>

        </header>
    </div>

            <div class="flex justify-center">
                <div class="w-1/2">
                    <label for="underline_select" class="sr-only">Underline select</label>
                    <select id="filter_by_post" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="-1" selected>Choisi le post</option>
                        @foreach($posts as $post)
                            <option value="{{$post->getId()}}" >{{$post->getName()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/3">

                </div>
{{--                <div class="w-1/3">--}}
{{--                    <button id="download_list" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">--}}
{{--                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>--}}
{{--                        <span>Download</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
              </div>




            <div class="card-content" id="content">


                <div class=" mx-auto bg-white shadow-lg rounded-sm border border-gray-200">

                    <div class="p-3">
                        <div class="overflow-x-auto" id="container">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Post</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Status</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Salaire</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Date D'embauch</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                @foreach($employees as $employer)


                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src={{"https://avatars.dicebear.com/v2/initials/{$employer->user->getFirstName()[0]}-{$employer->user->getLastName()[0]}.svg"}}></div>
                                                <div class="font-medium text-gray-800">{{$employer->user->getFirstName()}} {{$employer->user->getLastName()}}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{$employer->post->getName()}}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">
                                                @if($employer->inHoliday())
                                                    <span style="width: 250px!important;" class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">Congée</span>
                                                @else
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">Disponible</span>


                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$employer->getSalary()."  DH"}} </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">{{$employer->getHiringDate()}}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>





                <div class="table-pagination">
                    <div class="flex items-center justify-between">
                        <div class="buttons">
                            <button type="button" class="button active">1</button>
                            <button type="button" class="button">2</button>
                            <button type="button" class="button">3</button>
                        </div>
                        <small>Page 1 of 3</small>
                    </div>
                </div>
            </div>

@endsection

@section("script")
<script>
    let postField = $("#filter_by_post");
    let content = $('#container')

    $(postField).change(()=>
    {
        $.get(`http://localhost:8000/api/employers/post/${postField.val()}`,(data,status)=>{
            console.log(data)
            const table = $(`<table class="table-auto w-full">`);
            // language=HTML
            const thead = $(`<thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Post</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Status</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Salaire</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Date D'embauch</div>
                                    </th>
                                </tr>
                                </thead>`)
    table.append(thead)
    let tbody =$("<tbody>")
            data.employers.forEach(item=>{
                let tr = $(`
 <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://avatars.dicebear.com/v2/initials/${item.first_name[0]}-${item.last_name[0]}.svg"></div>
                                                <div class="font-medium text-gray-800">${item.first_name} ${item.last_name}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">${item.post_name}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left font-medium text-green-500">
${item.inHoliday?'<span style="width: 250px!important;" class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">Congée</span>':'<span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">Disponible</span>'}






                </div>
            </td>
            <td class="p-2 whitespace-nowrap">
                <div class="text-lg text-center">${item.salary} </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg text-center">${item.hiring_date}</div>
                                        </td>
                                    </tr>
`)


                tbody.append(tr)
            })

            table.append(tbody)
            content.html(table)
        })
    })
    const downloadButton = $("#download_list")
    downloadButton.click((e)=>{
        window.location.replace("employees/download")
    })


</script>

@endsection
