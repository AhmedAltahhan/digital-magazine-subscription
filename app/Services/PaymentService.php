<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public function all()
    {
        $payments = Payment::paginate(request()->input('per_page', 10));
        return $payments;
    }

    public function store(array $data)
    {
        return Payment::updateOrCreate([], $data);
    }

    public function show(string $id)
    {
        $subscription = Payment::findOrFail($id);
        return $subscription;
    }

    public function destroy(string $id)
    {
        Payment::whereId($id)->delete();
    }


}
