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

    <div class="flex-column">
        <div id="chartContainer" class="md:w-1/2 bg-white"></div>

    </div>



@endsection
@section("script")

    <script>
        const chart_data =  {{\Illuminate\Support\Js::from($chartData)}}
            dark =  localStorage.getItem('dark');
        console.log(dark)
        $("#dark_toggle_btn").click((ez)=>{
            dark2 =  localStorage.getItem('dark');
            console.log(dark2)
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: dark2!=="true"?"dark2":"light2",
                title: {
                    text: "Les Employees"
                },
                axisY: {
                    title: "nombre des employee",
                },


                data: [{
                    type: "column",
                    dataPoints:chart_data.map(item=>{return {label: item.name, y: item.count }} )
                }]
            });
            chart.render()
        })
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: dark=="true"?"dark2":"light2",
                title: {
                    text: "Les Employees"
                },
                axisY: {
                    title: "nombre des employee",
                },


                data: [{
                    type: "column",
                    dataPoints:chart_data.map(item=>{return {label: item.name, y: item.count }} )
                }]
            });

            chart.render();



        }

    </script>

@endsection
