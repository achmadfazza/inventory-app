<?php

namespace App\Http\Controllers\Landing;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->user()->carts()->count() >= 1) {
            $length = 8;
            $random = '';

            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            $invoice = 'INV-' . Str::upper($random);

            $transaction = Transaction::create([
                'invoice' => $invoice,
                'user_id' => Auth::id(),
            ]);

            //update user
            User::whereId(Auth::id())->update([
                'company' => $request->company,
                'telp' => $request->telp,
                'address' => $request->address,
            ]);

            $carts = Cart::where('user_id', Auth::id())->get();


            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                ]);
                Product::whereId($cart->product_id)->decrement('quantity', $cart->quantity);
            }

            Cart::where('user_id', Auth::id())->delete();

            return redirect(route('home'))->with('toast_success', 'Terimakasih pesanan anda akan diantar oleh pihak gudang');
        } else {
            return back()->with('toast_error', 'Item tidak boleh kosong');
        }
    }
}