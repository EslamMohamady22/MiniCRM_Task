@extends('layouts.layout')
@section('body')
    <div class="card" style="width: 80%;margin-left:10%;">
        <div class="card-body">
            <h2>Assign Customer To Employee </h2>
        </div>
        <div class="card-body ">


            <form method="POST" action="{{ route('admin.StoreAssignCustomersToEmployee') }}">
                @csrf
                <div class="form-group">
                    <label for="customers">Customers</label>
                    <select class="form-control bg-light bg-gradient form-control-lg " name="customer_ids[]" id="customers" class="form-control" multiple>
                        @foreach($customers as $customer)
                            <option  value="{{ $customer->id }}">{{ $customer->name }}</option>
                            <br>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="employee">Employee</label>
                    <select class="form-control bg-light bg-gradient form-control-lg " name="employee_id" id="employee" class="form-control">
                        @foreach($employees as $employee)
                            <option  value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign</button>
            </form>
        </div>
    </div>
@endsection