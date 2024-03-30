@extends('layouts.layout')
@section('body')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Pages table</h6>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="deletePage" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employee Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th> --}}
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($employees as $employee)
                            <tr>
                                <input type="hidden" value="{{ $employee->id }}" data-id="{{ $employee->id }}" name="id" id="id">
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $employee->name }}</p>
                                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $employee->email }}</h6>
                                            {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $employee->phoneNumber }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $employee->address }}</span>
                                </td>
                                <td class="align-middle">
                                    {{-- <td class="align-middle text-center text-sm"> --}}
                                    <a href="{{ route('admin.EditEmployee',$employee->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="badge badge-sm bg-gradient-success">Edit</span>
                                    </a>

                                    <a class="text-secondary font-weight-bold text-xs"  >
                                        <span data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal" id="deletebtn" data-id="{{ $employee->id }}" class="badge badge-sm bg-gradient-danger">Delet</span>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.DeleteEmployee') }}" method="POST">
                <div class="modal-content">

                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <p>   Are You Sure To Delete ??</p>
                            @csrf
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">حذف </button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#deletePage tbody').on('click', '#deletebtn', function(argument) {
                var id = $(this).attr("data-id");
                console.log(id);
                $('#deletemodal #id').val(id);
        })
    </script>
@endsection
