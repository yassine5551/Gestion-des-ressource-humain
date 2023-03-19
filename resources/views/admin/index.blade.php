@extends("layouts.admin")
@section('title',$title)
@section("content")
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Dashboard</li>
            </ul>

        </div>
    </section>
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Employees
                        </h3>
                        <h1>
                            {{$employees_count}}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                </div>
            </div>
        </div>
{{--        <div class="card">--}}
{{--            <div class="card-content">--}}
{{--                <div class="flex items-center justify-between">--}}
{{--                    <div class="widget-label">--}}
{{--                        <h3>--}}
{{--                            Sales--}}
{{--                        </h3>--}}
{{--                        <h1>--}}
{{--                            $7,770--}}
{{--                        </h1>--}}
{{--                    </div>--}}
{{--                    <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card">--}}
{{--            <div class="card-content">--}}
{{--                <div class="flex items-center justify-between">--}}
{{--                    <div class="widget-label">--}}
{{--                        <h3>--}}
{{--                            Performance--}}
{{--                        </h3>--}}
{{--                        <h1>--}}
{{--                            256%--}}
{{--                        </h1>--}}
{{--                    </div>--}}
{{--                    <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="card mb-6">

        <div class="card-content">
            <div class="chart-area">
                <div class="h-full">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div></div>
                        </div>
                    </div>
                    <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
                </div>
            </div>
        </div>
    </div>




@endsection
@section("script")

    <script>
        const chart_data =  {{\Illuminate\Support\Js::from($chartData)}}
            console.log(chart_data)
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            maindata = [['Task', 'Hours per Day']]
            chart_data.forEach(item=>maindata.push([item.name,item.count]))
            var data = google.visualization.arrayToDataTable(maindata  );

            var options = {
                title: 'My Daily Activities',
                theme: 'material',
                width: 400,
                backgroundColor:"",
                height: 240,
                is3D: true

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

    </script>

@endsection
