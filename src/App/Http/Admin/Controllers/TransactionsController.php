<?php

namespace App\Http\Admin\Controllers;

use App\Http\BaseController as Controller;
use Illuminate\Http\Request;
use Domain\Transactions\Models\Transaction;

class TransactionsController extends Controller
{
    public function index(Request $r)
    {
        $transactions = Transaction::orderBy('created_at', 'desc')
                        ->when($r->state, fn ($q, $v) => $q->whereState($v))
                        ->orderBy('order')
                        ->paginate();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function viewTransaction(Request $r)
    {
        $transaction = Transaction::with('client')
                        ->where('transactions.id', $r->id)
                        ->when($r->payment_uuid, fn ($q, $v) => $q->wherePaymentUuid($v))
                        ->firstOrFail();

        return view('admin.transactions.view', compact('transaction'));
    }
}
