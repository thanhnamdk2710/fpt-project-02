<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\User;
use App\Order;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $items = Cart::session($userId)->getContent();
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('frontend.cart', [
            'items' => $items,
            'orders' => $orders
        ]);
    }

    public function add(Request $request)
    {
        $userId = Auth::user()->id;

        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity;
        $customAttributes = [
            'color' => $request->color,
            'size' => $request->size,
            'image' => $request->image,
        ];

        Cart::session($userId)->add($id, $name, $price, $quantity, $customAttributes);

        return redirect(route('cart.index'))->with('success', 'Thêm sản phẩm thành công');
    }

    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;

        $quantity = $request->quantity;

        if($quantity <= 0)
        {
            Cart::session($userId)->update($id, ['quantity' => [
                'relative' => false,
                'value' => 1
            ]]);

            return redirect(route('cart.index'))->with('success', 'Cập nhật giỏ hàng thành công');
        }

        Cart::session($userId)->update($id, ['quantity' => [
            'relative' => false,
            'value' => $quantity
        ]]);

        return redirect(route('cart.index'))->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function delete($id)
    {
        $userId = Auth::user()->id;

        Cart::session($userId)->remove($id);

        return redirect(route('cart.index'))->with('success', 'Xoá sản phẩm thành công');
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        $order->status = 3;
        $order->save();

        return redirect(route('cart.index'))->with('success', 'Huỷ đơn hàng thành công');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(0)+([0-9]{9})\b/',
            'address' => 'required'
        ]);

        $userId = Auth::user()->id;

        $user = User::find($userId);

        if($user->phone == null || $user->phone == null)
        {
            $user->update(['phone' => $request->phone, 'address' => $request->address]);
        }

        $order = new Order;
        $order->user_id = $userId;
        $order->total = Cart::session($userId)->getSubTotal();
        $order->save();

        $items = Cart::session($userId)->getContent();

        foreach($items as $item)
        {
            $order->order_details()->create([
                'product_id' => $item->id,
                'quantity' => $item->quantity
            ]);
        }


        Cart::session($userId)->clear();

        return redirect(route('cart.index'))->with('success', 'Đặt hàng thành công');
    }
}
