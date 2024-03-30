@extends('layouts.layout')
@section('body')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">All Status Transactions </h6>
                </div>
                </div>
                <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="deletePage" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Castomer Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Added By</th> --}}
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Belongs To</th> --}}
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> --}}
                        <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($status as $status)
                            <tr>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $status->status }}</p>
                                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $status->customer->name }}</h6>
                                            {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $status->employee->name }}</span>
                                </td>
                                 <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $status->created_at }}</span>
                                </td>
                                <td class="align-middle">
                                    <a class="text-secondary font-weight-bold text-xs"  >
                                        <span data-bs-toggle="modal" data-original-title="test" data-bs-target="#deletemodal" id="deletebtn" data-id="{{ $status->id }}" class="badge badge-sm bg-gradient-danger">Delet</span>
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
            <form action="{{ route('admin.DeleteStatusTransaction') }}" method="POST">
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