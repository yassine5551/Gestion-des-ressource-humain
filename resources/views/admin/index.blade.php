@extends("layouts.admin")
@section('title',$title)
@section("content")
    <div class="rounded-t  mb-0 px-6 py-6">
        <div class="text-center flex justify-between">
            <h6 class="text-blueGray-700 text-xl font-bold">
                Dashboard
            </h6>

        </div>
    </div>

    <div class="flex">
        <div  id="chart_div"></div>
        <div class="w-1/2" id="piechart" style="width: 400px; height: 200px;"></div>

    </div>



@endsection
@section("script")

    <script>
        const chart_data =  {{\Illuminate\Support\Js::from($chartData)}}
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
                colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
                is3D: true

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

    </script>

@endsection
