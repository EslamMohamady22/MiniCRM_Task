<?php

namespace App\Interfaces;

interface CustomerInterface
{
    public function store($request);
    public function update($request, $id);
    public function showAll();
    public function getCustomerById($id);
}