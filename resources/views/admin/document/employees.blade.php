@extends("layouts.document")
@section("content")


<table class="table table-bordered">
    <thead>
        <tr>
            <th>numero social</th>
            <th>nom</th>
            <th>prenom</th>
            <th>date de naissance</th>
            <th>post</th>
            <th>salaire</th>
            <th>date d'embauche</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{$employee->social_number}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->born_date}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->hiring_date}}</td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
