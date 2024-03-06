<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterfaces;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected CustomerRepositoryInterfaces $customerRepository;

    public function __construct(CustomerRepositoryInterfaces $customerRepository)
    {
        $this->customerRepository = $customerRepository;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->customerRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
//        return $request;
       DB::beginTransaction();
       $result = [
           'status' => 200,
       ];

        try {

            $this->customerRepository->store($request);
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customerOne = $this->customerRepository->get($id);
        return $customerOne;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, $id)
    {

        DB::beginTransaction();
        $result = [
            'status' => 200,
        ];

        try {

            $this->customerRepository->update($request, $id);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $result = [
            'status' => 200,
        ];

        try {

            $this->customerRepository->delete($id);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }
}
