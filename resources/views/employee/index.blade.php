@extends("layouts.admin")
@section('title',$title)
@section("content")





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
                <div class="w-1/3">
                    <button id="download_list" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>Download</span>
                    </button>
                </div>
              </div>




            <div class="card-content" id="content">
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Social number</th>
                        <th>nom</th>
                        <th>post</th>
                        <th>salaire</th>
                        <th>date d'embauch</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employer)
                        <tr>
                        <td class="image-cell">
                            <div class="image">
                                <img src={{"https://avatars.dicebear.com/v2/initials/{$employer->user->getFirstName()}-{$employer->user->getLastName()}.svg"}} class="rounded-full">
                            </div>
                        </td>
                            <td data-label="social number">{{$employer->getSocialNumber()}}</td>
                            <td data-label="nom">{{$employer->user->getFirstName()}} {{$employer->user->getLastName()}} </td>
                            <td data-label="post">{{$employer->post->getName()}}</td>
                            <td data-label="Progress" class="progress-cell">{{$employer->getSalary()."  DH"}}</td>
                        <td data-label="Created">
                            <small class="text-gray-500" title="Oct 25, 2021">{{$employer->getHiringDate()}}</small>
                        </td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </button>
                                <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
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
    let content = $('#content')

    $(postField).change(()=>
    {
        $.get(`http://localhost:8000/api/employers/post/${postField.val()}`,(data,status)=>{
            console.log(data)
            const table = $(`<table>`);
            const thead = $(`<thead><tr><th></th><th>Social number</th><th>nom</th><th>post</th><th>salaire</th><th>date d'embauch</th><th></th></tr></thead>`)
    table.append(thead)
    let tbody =$("<tbody>")
            data.employers.forEach(item=>{
                let tr = $(`<tr>`)
                tr.append(`<td class="image-cell"><div class="image"><img src="https://avatars.dicebear.com/v2/initials/${item.first_name}-${item.last_name}.svg" class="rounded-full"></div></td>
          `)
                tr.append(`<td data-label="social number">${item.social_number}</td>`)
                tr.append(`<td data-label="nom">${item.first_name} ${item.last_name}</td>`)
                tr.append(`<td data-label="post">${item.post_name}</td>`)
                tr.append(`<td data-label="Progress" class="progress-cell">${item.salary} DH</td>`)
                tr.append(`
                  <td data-label="Created">
                            <small class="text-gray-500" title="Oct 25, 2021">${item.hiring_date}</small>
                        </td>
                `)
                tr.append(`
                          <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <button class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </button>
                                <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </button>
                            </div>
                        </td>`)
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
