<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Http\Requests\adminAssignRequest;
use App\Http\Requests\UpdateRequest;
use App\Interfaces\CustomerInterface;
use App\Models\EmployeeClientGroup;
use App\Models\Status;
use App\Models\User;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $customerRepository;
    public function __construct(CustomerRepository $customerInterface)
    {
        $this->customerRepository = $customerInterface;
    }
    function adminAddCustomer()
    {
        return view('admin.addCustomer');
    }
    function adminAddEmployee()
    {
        return view('admin.addEmployee');
    }
    function adminStoreEmployee(AddRequest $request)
    {
        $user = User::create($request->validated());
        return back();
    }
    function adminStoreCustomer(AddRequest $request)
    {
        $this->customerRepository->store($request->validated());
        return back();
    }
    function adminShowCustomers() {
        $customers = $this->customerRepository->showAll();
        return view('admin.allCustomers', compact('customers'));
    }
    function adminShowEmployees() {
        $employees = User::where('type' , 'employee')->with('customers')->get() ;
        // dd($employees);
        return view('admin.allEmployees',compact('employees'));
    }
    function adminEditCustomer($id){
        $customer = $this->customerRepository->getCustomerById($id);
        return view('admin.editCustomer',compact('customer'));
    }
    function adminEditEmployee($id){
        $employee = $this->customerRepository->getCustomerById($id);
        return view('admin.editEmployee', compact('employee'));
    }
    function adminUpdateEmployee(UpdateRequest $request , $id){
        $employee = User::findOrFail($id);
        $employee->update($request->validated());
        return redirect()->back();
    }
    function adminUpdateCustomer(UpdateRequest $request, $id)
    {
        $this->customerRepository->update($request->validated() , $id);
        return redirect()->back();
    }
    function adminDeleteCustomer(Request $request)
    {
        $this->customerRepository->getCustomerById($request->id)->delete();
        return redirect()->route('admin.ShowCustomers')->with('success' , 'Deleted Successfully');
    }
    function adminDeleteEmployee(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return redirect()->route('admin.ShowEmployees')->with('success', 'Deleted Successfully');
    }
    public function adminAssignCustomersToEmployee()
    {
        $customers = User::where('type', 'customer')
        ->whereNotIn('id', function ($query) {$query->select('customerId')->from('employee_client_groups');})
        ->get();
        $employees  = User::where('type', 'employee')->get();
        return view('admin.assignCustomersToEmployee', compact('customers', 'employees'));
    }
    public function adminShowStatusTransactions() {
        $status = Status::with('employee')->with('customer')->get();
        return view('admin.allStatusTransactions',compact('status'));
    }
    public function adminDeleteStatusTransaction(Request $request) {
        Status::findOrFail($request->id)->delete();
        return redirect()->route('admin.ShowStatusTransactions');
    }
    public function adminStoreAssignCustomersToEmployee(adminAssignRequest $request)
    {
        // $customer
        // dd($request->all());
        $customerIds = $request['customer_ids'];
        $employeeId = $request['employee_id'];
        foreach ($customerIds as $customerId) {
            EmployeeClientGroup::create(['customerId' => $customerId, 'employeeId' => $employeeId]);
        }
        return redirect()->route('admin.AssignCustomersToEmployee');
    }
}
