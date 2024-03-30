<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\EmployeeClientGroup;
use App\Models\Status;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function index()
    {
        $customers = $this->customerRepository->showAll();
        return view('employee.allCustomers',compact('customers'));
    }
    public function create()
    {
        return view('employee.addCustomer');
    }
    public function store(AddRequest $request)
    {
        $this->customerRepository->store($request->validated());
        return back();
    }
    public function show(string $id)
    {
        //
    }
    public function customerAssignedToMe()
    {
        
        $customers = EmployeeClientGroup::where('employeeId' , Auth::user()->id)->with('customer')->get() ;
        return view('employee.customersAssignedToMe',compact('customers'));
    }
    public function edit($id)
    {
        $customer = $this->customerRepository->getCustomerById($id);
        return view('employee.editCustomer',compact('customer'));
    }
    public function employeeEditCustomerstatus($status , $id)
    {
        //update customer status
        $customer = $this->customerRepository->getCustomerById($id);
        $customer->update(['status' => $status]);
        $this->storeCustomerStatus($status, $id);
        return redirect()->route('Employee.customerAssignedToMe');
    }
    function storeCustomerStatus($status, $id) {
        return Status::create([
            'status' => $status ,
            'customerId' => $id ,
            'employeeId' => Auth::user()->id
        ]);
    }
    function employeeUpdateCustomer(UpdateRequest $request, $id)
    {
        $this->customerRepository->update($request->validated(), $id);
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        //
    }
}
