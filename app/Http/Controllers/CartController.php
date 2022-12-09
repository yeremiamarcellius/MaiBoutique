<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\CartHeader;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function store(Request $request, $id){
        $validatedData = $request->validate([
            'quantity' => 'integer|min:1|required'
        ]);

        $cartHeader = CartHeader::where('user_id', '=', auth()->user()->id)->first();

        CartDetail::updateOrCreate(
           [
              'cart_id' => $cartHeader->id,
              'item_id' => $id,
           ],
           [
              'quantity' => $request->quantity
           ]
        );

        return redirect(route('showCart'));

    }

    public function show(){
        $cartHeader = CartHeader::where('user_id', '=', auth()->user()->id)->firstOrFail();

        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cartHeader->cartDetails as $cartDetail) {
            if ($cartDetail->item != null) {
                $totalPrice += $cartDetail->quantity * $cartDetail->item->price;
                $totalQuantity += $cartDetail->quantity;
            }
        }

        // dd($cartHeader);

        Return view('showCart', compact('cartHeader', 'totalPrice', 'totalQuantity'));
    }
    public function editPage($id){
        $cartDetail = CartDetail::findOrFail($id);

        return view('EditCart', compact('cartDetail'));
    }

    public function delete($id){
        CartDetail::destroy($id);

        return back();
    }
}
