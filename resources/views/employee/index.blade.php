@extends("layouts.admin")
@section('title',$title)
@section("content")
<table>
    <thead>
    <tr>
        <th class="border-1 border-solid border-gray-800">
            <label for="underline_select" class="sr-only">Underline select</label>
            <select id="filter_by_post" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="-1" selected>Choisi le post</option>
                @foreach($posts as $post)
                    <option value="{{$post->getId()}}" >{{$post->getName()}}</option>
                @endforeach
            </select>
        </th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>

</table>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <h1 class="m-4">Employes</h1>

        <div id="content">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            </thead>
            <tbody>
            @foreach($employees as $employer)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-orange-200">

                <td class="px-6 py-4">
                    {{$employer->getSocialNumber()}}
                </td>
                <td class="px-6 py-4">
                    {{$employer->user->getFirstName()}} {{$employer->user->getLastName()}}
                </td>
                <td class="px-6 py-4">
                    {{$employer->post->getName()}}
                </td>
                <td class="px-6 py-4">
                    {{$employer->getSalary()}} DH
                </td>
                <td class="px-6 py-4">
                    {{$employer->getHiringDate()}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
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

</script>
@endsection
