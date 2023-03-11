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
                    <button class="download-button transform active:scale-95 bg-blue-500 hover:bg-blue-400 text-white px-6 py-4 rounded-lg font-bold tracking-widest w-full">
                        <div class="flex justify-center items-center relative">
                          <div class="svg-container">
                            <!-- Download Icon -->
                            <svg class="download-icon" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path class="download-arrow" d="M13 9L9 13M9 13L5 9M9 13V1" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M1 17V18C1 18.7956 1.31607 19.5587 1.87868 20.1213C2.44129 20.6839 3.20435 21 4 21H14C14.7956 21 15.5587 20.6839 16.1213 20.1213C16.6839 19.5587 17 18.7956 17 18V17" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="download-loader text-white hidden"></div>
                            <!-- Checked Icon -->
                            <svg class="check-svg hidden" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20ZM15.1071 7.9071C15.4976 7.51658 15.4976 6.88341 15.1071 6.49289C14.7165 6.10237 14.0834 6.10237 13.6929 6.49289L8.68568 11.5001L7.10707 9.92146C6.71655 9.53094 6.08338 9.53094 5.69286 9.92146C5.30233 10.312 5.30233 10.9452 5.69286 11.3357L7.97857 13.6214C8.3691 14.0119 9.00226 14.0119 9.39279 13.6214L15.1071 7.9071Z" fill="white"/>
                            </svg>
                          </div>
                          <div class="button-copy pl-2 leading-none uppercase">DOWNLOAD</div>
                        </div>
                      </button>
                </div>
              </div>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <h1 class="m-4">Employes</h1>


</div>

            <div class="card-content">
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
            const table = $(`<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">`);
                const thead = $(`<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    numero social
                </th>
                <th scope="col" class="px-6 py-3">
                    nom complet
                </th>
                <th scope="col" class="px-6 py-3">
                    post
                </th>
                <th scope="col" class="px-6 py-3">
                    salaire
                </th>
                <th scope="col" class="px-6 py-3">
                    date d'embauch
                </th>
            </tr>
            </thead>`)
    table.append(thead)
    let tbody =$("<tbody>")
            data.employers.forEach(item=>{


                let tr = $(`<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-orange-200">`)
                let td_social_nbr = $(`<td class="px-6 py-4">`)
                td_social_nbr.text(item.social_number)
                tr.append(td_social_nbr)
                let td_fullname = $(`<td class="px-6 py-4">`)
                td_fullname.text(item.full_name)
                tr.append(td_fullname)
                let td_post = $(`<td class="px-6 py-4">`)
                td_post.text(item.post_name)
                tr.append(td_post)
                let td_salary = $(`<td class="px-6 py-4">`)
                td_salary.text(item.salary)
                tr.append(td_salary)
                let td_hiting_date = $(`<td class="px-6 py-4">`)
                td_hiting_date.text(item.hiring_date)
                tr.append(td_hiting_date)
                tbody.append(tr)
            })

            table.append(tbody)
            content.html(table)
        })
    })

    const downloadButton = document.querySelector(`.download-button`)
const downloadIcon = document.querySelector(`.download-icon`)
const downloadLoader = document.querySelector(`.download-loader`)
const downloadCheckMark = document.querySelector(`.check-svg`)
const downloadText = document.querySelector(`.button-copy`)

downloadButton.addEventListener('click', () => {
    downloadIcon.classList.add(`hidden`)
    downloadLoader.classList.remove(`hidden`)
    downloadText.innerHTML = "DOWNLOADING";
}, { once: true })

downloadLoader.addEventListener('animationend', () => {
    downloadLoader.classList.add(`hidden`)
    downloadCheckMark.classList.remove(`hidden`)
    downloadText.innerHTML = "DOWNLOADED";
    window.location.replace("employees/download")
})


</script>

@endsection
