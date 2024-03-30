@extends('layouts.layout')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@section('body')
    <div class="card" style="width: 80%;margin-left:10%;">
        <div class="card-body ">
            <form action="{{ route('admin.UpdateEmployee',$employee->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group col-md-8 ">
                    <label for="name">Employee Name</label>
                    <input name="name" value="{{ $employee->name }}" type="text" class="form-control bg-light bg-gradient form-control-lg "  id="name" placeholder="name"  >
                </div>
                <div class="form-group col-md-8 ">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $employee->email }}" type="email" class="form-control bg-light bg-gradient form-control-lg "  id="email" placeholder="email"  >
                </div>
                <div class="form-group col-md-8 ">
                    <label for="phone"> Phone Number</label>
                    <input name="phoneNumber" value="{{ $employee->phoneNumber }}" type="number" class="form-control bg-light bg-gradient form-control-lg "  id="phone" placeholder="Phone Number"  >
                </div>
                <div class="form-group col-md-8 ">
                    <label for="address"> Address</label>
                    <input name="address" value="{{ $employee->address }}" type="text" class="form-control bg-light bg-gradient form-control-lg "  id="address" placeholder="Address"  >
                </div>
                <div class="form-group col-md-8 ">
                    <label for="password"> Password</label>
                    <input name="password" value="{{ $employee->password }}" type="password" class="form-control bg-light bg-gradient form-control-lg "  id="password" placeholder="Password"  >
                </div>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </form>
        </div>
    </div>
@endsection
