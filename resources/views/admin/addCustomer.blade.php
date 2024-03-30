@extends('layouts.layout')
@section('body')
    <div class="card" style="width: 80%;margin-left:10%;">
        <div class="card-body">
            <h2>Add New Customer</h2>
        </div>
        <div class="card-body ">
            <form action="{{ route('admin.StoreCustomer') }}" method="POST" >
                @csrf
                <div class="form-group col-md-8 ">
                    <label for="name">Customer Name</label>
                    <input name="name" type="text" class="form-control bg-light bg-gradient form-control-lg "  id="name" placeholder="name" required>
                    <input name="addedBy" type="hidden"  value="{{ auth()->id() }}">
                    <input name="type" type="hidden" value="customer" >
                </div>
                <div class="form-group col-md-8 ">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control bg-light bg-gradient form-control-lg "  id="email" placeholder="email" required>
                </div>
                <div class="form-group col-md-8 ">
                    <label for="phone"> Phone Number</label>
                    <input name="phoneNumber" type="number" class="form-control bg-light bg-gradient form-control-lg "  id="phone" placeholder="Phone Number" required>
                </div>
                <div class="form-group col-md-8 ">
                    <label for="address"> Address</label>
                    <input name="address" type="text" class="form-control bg-light bg-gradient form-control-lg "  id="address" placeholder="Address" required>
                </div>
                <div class="form-group col-md-8 ">
                    <label for="password"> Password</label>
                    <input name="password" type="password" class="form-control bg-light bg-gradient form-control-lg "  id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Add New Customer</button>
            </form>
        </div>
    </div>
@endsection