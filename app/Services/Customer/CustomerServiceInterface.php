<?php

namespace App\Services\Customer;

use App\Models\Customer;

interface CustomerServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Customer
     */
    public function createCustomer(array $data): Customer;

    /**
     * @param string $id
     * @return \App\Models\Customer
     */
    public function getCustomerById(string $id): Customer;

    /**
     * @param array $data
     * @param string $id
     * @return \App\Models\Customer
     */
    public function updateCustomer(array $data, string $id): Customer;

    /**
     * @param string $id
     * @return \App\Models\Customer
     * @throws \Exception
     */
    public function destroyCustomer(string $id): Customer;
}
