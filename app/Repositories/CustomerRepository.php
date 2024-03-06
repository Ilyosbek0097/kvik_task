<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterfaces;

class CustomerRepository implements Interfaces\CustomerRepositoryInterfaces
{
    protected Customer $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

    }

    /**
     * @inheritDoc
     */
    public function all()
    {
        return $this->customer->all();
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        return $this->customer->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function store($data)
    {
        $requestAll = $data->all();
        return $this->customer->create($requestAll);
    }

    /**
     * @inheritDoc
     */
    public function update($data, $id)
    {
       $customerOne = $this->customer->find($id);
       return $customerOne->update($data->all());
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        if(!empty($id))
        {
            return $this->customer->destroy($id);
        }
    }
}
