@extends('layouts.admin')
@section('title', $title)
@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Dashboard</li>
            </ul>

        </div>
    </section>
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 m-6">

        <!--Metric Card-->
        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-pink-600">
                        <i class="fas fa-users fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">
                        Total Employees
                    </h2>
                    <p class="font-bold text-3xl">
                        {{ $employees_count }}
                        <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-yellow-600">
                        <i class="fas fa-user-plus fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">
                        Stagiaire
                    </h2>
                    <p class="font-bold text-3xl">
                        {{$stagiaire_count}}
                        <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-blue-600">
                        <i class="fas fa-server fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">
                        Projects
                    </h2>
                    <p class="font-bold text-3xl">{{$project_count}}</p>
                </div>
            </div>
        </div>

    </div>

        {{-- <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-red-600">
                        <i class="fas fa-inbox fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">Issues</h2>
                    <p class="font-bold text-3xl">
                        3
                        <span class="text-red-500"><i class="fas fa-caret-up"></i></span>
                    </p>
                </div>
            </div>
        </div> --}}

        <hr class="my-4">

        <canvas id="myChart"></canvas>
        <hr class="my-4">
        <div class="p-4">
            <h3 class="text-sky-800 font-bold m-2 ">les absence de ce mois</h3>
        <table class="table scroll " style="border-radius: 10px;max-height:500px">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th>Nom </th>
                    <th>prenom </th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @foreach($this_month_absences as $absence)
                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">
                        {{$absence->employee->user->getFirstName()}}</div></td>
                    <td class="p-2 whitespace-nowrap"> <div class="text-left">
                        {{$absence->employee->user->getLastName()}}</div></td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{$absence->date}}</div></td>


                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="p-4" >
            <h3 class="text-sky-800 font-bold m-2 ">les Congees de ce mois</h3>
        <table class="table scroll " style="border-radius: 10px;max-height:500px">
            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <th>Nom </th>
                    <th>prenom </th>
                    <th>date debut</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                @foreach($this_month_leaves as $leave)
                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">
                        {{$leave->employee->user->getFirstName()}}</div></td>
                    <td class="p-2 whitespace-nowrap"> <div class="text-left">
                        {{$leave->employee->user->getLastName()}}</div></td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="text-left">{{$leave->start_at}}</div>
                    </td>
                    <td>
                        @if($leave->employee->hasLeaveInThisDay($leave->end_at))
                        <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        @else
                        <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                          </svg>
                        @endif
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        </div>








@endsection

@section('script')
<script>
    const datachart = {{ Illuminate\Support\Js::from($chartData) }}
    labels = datachart.map(item=>item.name)
    lbls2 = []
    labels.forEach(element => {
        lbls2.push(element.replace(" ",""))
    });
    const bgs = []
    for (let i=0;i<=lbls2.length;i++){
        bgs.push(`rgba(255, 99, ${i}, 0.2)`)
    }

    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: lbls2,
        datasets: [{
            label: 'Nombre des employés',
            data: datachart.map(item=>item.count),
            backgroundColor:bgs,
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,

        plugins: {
            legend: {
                position: 'top',
            },

        }
    },
});


</script>


@endsection







