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
                        New Users
                    </h2>
                    <p class="font-bold text-3xl">
                        2
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
                        Server Uptime
                    </h2>
                    <p class="font-bold text-3xl">152 days</p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-indigo-600">
                        <i class="fas fa-tasks fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">
                        To Do List
                    </h2>
                    <p class="font-bold text-3xl">7 tasks</p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
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
        </div>

        <!--/Metric Card-->
        {{--        <div class="card"> --}}
        {{--            <div class="card-content"> --}}
        {{--                <div class="flex items-center justify-between"> --}}
        {{--                    <div class="widget-label"> --}}
        {{--                        <h3> --}}
        {{--                            Sales --}}
        {{--                        </h3> --}}
        {{--                        <h1> --}}
        {{--                            $7,770 --}}
        {{--                        </h1> --}}
        {{--                    </div> --}}
        {{--                    <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        {{--        <div class="card"> --}}
        {{--            <div class="card-content"> --}}
        {{--                <div class="flex items-center justify-between"> --}}
        {{--                    <div class="widget-label"> --}}
        {{--                        <h3> --}}
        {{--                            Performance --}}
        {{--                        </h3> --}}
        {{--                        <h1> --}}
        {{--                            256% --}}
        {{--                        </h1> --}}
        {{--                    </div> --}}
        {{--                    <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}
    </div>

    {{--    <div class="card mb-6"> --}}

    {{--        <div class="card-content"> --}}
    {{--            <div class="chart-area"> --}}
    {{--                <div class="h-full"> --}}
    {{--                    <div class="chartjs-size-monitor"> --}}
    {{--                        <div class="chartjs-size-monitor-expand"> --}}
    {{--                            <div></div> --}}
    {{--                        </div> --}}
    {{--                        <div class="chartjs-size-monitor-shrink"> --}}
    {{--                            <div></div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <canvas id="column-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}




    {{--  <div class=" border  rounded shadow w-1/2 m-3">
        <div class=" p-3">
            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
        </div>
        <div class="p-5">
            <canvas id="my-chart" class="chartjs" width="undefined" height="undefined"></canvas>
        </div>
    </div> --}}
@endsection
@section('script')

    <script>
        const chart_data = {{ \Illuminate\Support\Js::from($chartData) }};
        console.log(chart_data)
        const bgs = []
        for (var i = 0; i < 50; i++) {
            bgs.push('rgba(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',' + Math.floor(
                Math.random() * 256) + ',0.7)');
        }
        new Chart(document.getElementById("my-chart"), {
            type: "doughnut",
            data: {
                labels: chart_data.map(item => item.name),
                datasets: [{
                    label: "Issues",
                    data: chart_data.map(item => item.count),
                    backgroundColor: bgs,
                }, ],
            },
        });
    </script>

@endsection
