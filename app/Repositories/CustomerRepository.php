<?php
namespace App\Repositories;
use App\Interfaces\CustomerInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomerRepository implements CustomerInterface
{
    protected $userCustomer;
    public function __construct(User $userCustomer)
    {
        $this->userCustomer = $userCustomer;
    }
    public function showAll()
    {
        return $this->userCustomer->where('type', 'customer')
            ->where('addedBy', Auth::user()->id)
            ->with('addedBy')
            ->get();
    }
    public function update($request, $id)
    {
        return $this->userCustomer->findOrFail($id)->update($request);
    }
    public function store($request)
    {
        return $this->userCustomer->create($request);
    }
    public function getCustomerById($id)
    {
        return $this->userCustomer->findOrFail($id);
    }
}
