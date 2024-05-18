<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function index () {
     $orders = Invoice::withCount('orders')->paginate(20);
    return view('order.index',compact('orders'));
  }

  public function edit($id) {
    $invoice = Invoice::where('id',$id)->with('orders')->firstOrFail();
    return view('order.edit',compact('invoice'));
  }

  public function update(Request $request, $id) {

  }

  public function destroy(Request $request)
  {
      $order = Invoice::where('id',$request->id)->firstOrFail();
      Order::where('order_no',$order->order_no)->delete();
      $order->delete();
      return response(['error'=>false,'message'=>'Deleted.']);
  }

  public function status(Request $request) {
      $update = $request->status;
      $updatecheck = $update == "false" ? '0' : '1';
      Invoice::where('id',$request->id)->update(['status'=> $updatecheck]);
      return response(['error'=>false,'status'=>$update]);
  }
}