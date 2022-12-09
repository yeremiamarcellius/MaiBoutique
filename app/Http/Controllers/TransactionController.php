<?php

namespace App\Http\Controllers;

use App\Models\CartHeader;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store($totalprice){
        $cartHeader = CartHeader::where('user_id', '=', auth()->user()->id)->first();

        // if ($cartHeader->cartDetails->isEmpty()) {
        //     return redirect()->route('home');
        // }
        // return $cartHeader;

        if($totalprice == 0){
            return redirect(route('home'));
        }

        $transactionHeader = TransactionHeader::create([
            'user_id' => auth()->user()->id,
            'totalprice' => $totalprice
        ]);

        foreach ($cartHeader->cartDetails as $cartDetail) {
            if ($cartDetail->item != null) {
                TransactionDetail::Create(
                    [
                        'transaction_id' => $transactionHeader->id,
                        'item_id' => $cartDetail->item_id,
                        'quantity' => $cartDetail->quantity
                    ]
                );
            }
        }

        CartHeader::destroy($cartHeader->id);
        CartHeader::create([
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('showTransaction'));
    }

    public function show(){
        $transactionHeaders = TransactionHeader::where('user_id', '=', auth()->user()->id)->get();

        // dd($cartHeader);

        Return view('showTransaction', compact('transactionHeaders'));
    }
}
