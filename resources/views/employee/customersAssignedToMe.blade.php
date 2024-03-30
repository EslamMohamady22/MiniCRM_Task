@extends('layouts.layout')
@section('body')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Customers table</h6>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="deletePage" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Phone</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Belongs To</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($customers as $customerr)
                        @foreach ( $customerr->customer as $customer )
                            <tr>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $customer->name }}</p>
                                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $customer->email }}</h6>
                                            {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->phoneNumber }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->address }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $customer->status }}</span>
                                </td>
                                {{-- @foreach ($customers->employee as $group)
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $group->employee->name }}</span>
                                    </td>
                                @endforeach                              --}}
                                <td class="align-middle">
                                    {{-- <td class="align-middle text-center text-sm"> --}}
                                    <a href="{{ route('Employee.EditCustomerstatus',[ 'call' ,$customerr->customerId]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge badge-sm bg-gradient-success">Call</span>
                                    </a>
                                    <a href="{{ route('Employee.EditCustomerstatus',[ 'visit' ,$customerr->customerId]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge badge-sm bg-gradient-secondary">Visit</span>
                                    </a>
                                    <a href="{{ route('Employee.EditCustomerstatus',[ 'follow up' ,$customerr->customerId]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge badge-sm bg-gradient-primary">Follow Up</span>
                                    </a>
                                </td>

                            </tr>                        @endforeach
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection