@extends('layouts.admin')
@section("title",$title)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $title }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create New Absence
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" action="{{ route('admin.absence.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Employee</label>
                                <select class="form-control" name="employee_number">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->social_number }}">{{ $employee->user->name }} ({{ $employee->social_number }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control" type="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>Reason</label>
                                <select class="form-control" name="reason" required>
                                    @foreach ($raisons as $raison)
                                        <option value="{{ $raison }}">{{ $raison }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Absence</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
@section("script")
<script>
    $('#container').css({
        overflowY:scroll
    })
</script>
@endsection