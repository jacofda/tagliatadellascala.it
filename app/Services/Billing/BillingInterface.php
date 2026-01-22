<?php

namespace App\Services\Billing;

interface BillingInterface {

	public function charge(array $data);
}