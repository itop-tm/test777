<?php

namespace App\Http\Admin\Controllers;

use App\Http\BaseController as Controller;
use Illuminate\Http\Request;
use Domain\Payments\Models\Payment;

class PaymentsController extends Controller
{
    public function index(Request $r)
    {
        $payments = Payment::with('client')
            ->when($r->state, fn ($q, $v) => $q->whereState($v))
            ->paginate();

        return view('admin.payments.index', compact('payments'));
    }

    public function viewPayment(Request $r)
    {
        $payment = Payment::where('payments.uuid', $r->uuid)
                    // ->with('transaction')
                    ->with('client')
                    ->firstOrFail();

        return view('admin.payments.view', compact('payment'));
    }
}
