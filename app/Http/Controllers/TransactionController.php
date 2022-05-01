<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroomService;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Pet;
use View;
use Redirect;
use File;
use Validator;

use Auth;
use DB;
use App\Cart;
use Session;
use Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::table('transactioninfo')
            ->join('transactionline','transactionline.transac_id','transactioninfo.id')
            ->join('pet','pet.id','transactionline.pet_id')
            ->join('groom_service','groom_service.id','transactionline.service_id')     
            ->join('customer','customer.id','transactioninfo.customer_id')
            ->select('transactioninfo.id','customer.id','fname', 'lname', 'pet.id',
                    'pet.pet_name','groom_service.id', 'groom_name', 'price','quantity', 'transacation_date', 'status')
            // ->toSql();
            ->paginate();
        return View::make('transaction.index',compact('transactions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        // dd($order -> all());
        $transactions = DB::table('transactioninfo')
            ->join('transactionline','transactionline.transac_id','transactioninfo.id')
            ->join('pet','pet.id','transactionline.pet_id')
            ->join('groom_service','groom_service.id','transactionline.service_id')     
            ->join('customer','customer.id','transactioninfo.customer_id')
            ->select('transactioninfo.id','transactionline.id as tlID','customer.id as c_id','fname', 'lname', 'pet_id',
                    'pet.pet_name','groom_service.id as g_id', 'groom_name', 'price','quantity', 'transacation_date', 'status')
            // ->toSql();
            ->where('transactionline.id', $id)
            ->first();
            $order = Order::find($transactions->id);
          $pets = Pet::where('customer_id', $transactions -> c_id) -> pluck('pet_name', 'id');
        //  $pets = Pet:: ->  ->get();
        $groomservices = GroomService::pluck('groom_name', 'id');
        // $groomservices = GroomService::where('id', $transactions -> g_id) -> pluck('groom_name', 'id') ;
        
        
        // dd(compact('customer'));
        return View::make('transaction.edit',compact('order','transactions', 'pets', 'groomservices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            DB::beginTransaction();
            DB::table('transactionline')
            -> where('id', $id,)
            -> update(
                ['service_id' => $request -> service_id, 
                 'pet_id' => $request -> pet_id,
                 'quantity' => $request -> quantity
                ]
            );
    
            $transactions = DB::table('transactioninfo')
                ->join('transactionline','transactionline.transac_id','transactioninfo.id')
                ->select('transactioninfo.id','transactionline.id as tlID',
                        'quantity', 'transacation_date', 'status')
                // ->toSql();
                ->where('transactionline.id', $id)
                ->first();
 
            $order = Order::find($transactions -> id);
            // dd($order);
            $order -> transacation_date = $request -> transacation_date;
            $order -> status = $request -> status;
            // dd($request->all(), $id, $order);
            $order -> save();
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(throw $e);
        }
        // dd($request->all());
        DB::commit();

        return redirect() -> route('transaction.search') ->with('success','Transaction updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DB::table('transactionline') -> where('id', $id)->delete();
        }
        catch(\Exception $e) {
            DB::rollback();
            return redirect() -> route('transaction.search') ->with('failed','Transaction delete failed');
        }

        DB::commit();
        return redirect() -> back() ->with('success','Transaction deleted');


    }

    // Cart functions
    public function getIndex(){
        $services= GroomService::all();
        return view('shop.index', compact('services'));
    }

    public function getAddToCart(Request $request , $id){
        $item = GroomService::find($id);
        $oldCart = Session::has('cart') ? $request->session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);
        $request->session()->put('cart', $cart);
        Session::put('cart', $cart);
        $request->session()->save();
        // dd(Session::all());
        return redirect()->route('item.index');
     }

     public function getSelect() {
        $customers = Customer::all();
        return view('shop.select', compact('customers'));
     }
     
     public function getCart(Request $request) {
        if (!Session::has('cart')) {
            return redirect() -> route('item.index');
        }

        $pets = Pet::where('customer_id', $request-> get('customer_id'))
                -> get();
        $oldCart = Session::get('cart');
        $request->session()->put('customer_id',  $request->get('customer_id'));
        $cart = new Cart($oldCart);
        // dd($cart);
        return view('shop.shopping-cart', ['items' => $cart->items, 'totalPrice' => $cart->totalPrice], compact('pets'));
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart',$cart);
            Session::save();
        }else{
            Session::forget('cart');
        }
        //  return redirect()->route('item.shoppingCart');
        return redirect()->back();
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
         if (count($cart->items) > 0) {
            Session::put('cart',$cart);
            Session::save();
        }else{
            Session::forget('cart');
        }        
        // return redirect()->route('item.shoppingCart');
        return redirect()->back();
    }

    public function postCheckout(Request $request){
        // dd(session()->all(), $request -> all());
        if (!Session::has('cart')) {
            return redirect()->route('item.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $input = $request -> all();
        // dd($cart);
        try {
            DB::beginTransaction();
            $order = new Order();
            // $customer =  Customer::where('user_id',Auth::id())->first();
            $order->customer_id = Session::get('customer_id');
            $order->transacation_date = Carbon::now();
            $order->status = 'Unpaid';
            $order->save();

            foreach($cart->items as $items){
                $id = $items['item']['id'];
                // dd($id);
                DB::table('transactionline')->insert(
                    ['service_id' => $id, 
                     'transac_id' => $order->id,
                     'pet_id' => $request -> get('pet_id'.$id),
                     'quantity' => $items['qty']
                    ]
                    );
            }
            // dd($order);
        }
        catch (\Exception $e) {
            // dd($e);
            DB::rollback();
            // dd($order);
            return redirect()->route('item.shoppingCart')->with(throw $e);
        }
        
       
        $purchases = DB::table('transactionline')
                    -> join('pet','pet.id','transactionline.pet_id')
                    ->join('groom_service','groom_service.id','transactionline.service_id')  
                    -> select('transactionline.id', 'transactionline.transac_id','pet_name','groom_name', 'price', 'quantity',)
                    -> where('transac_id', $order->id) ->get();
        $customer = DB::table('customer')->where('id', $order->customer_id) ->first(); 
        
        $totalPurchase = $cart -> totalPrice;
        DB::commit();
        // dd(compact('purchases', 'order', 'customer', 'totalPurchase'));
        Session::forget('cart');
        return View::make('shop.receipt', compact('purchases', 'order', 'customer', 'totalPurchase'));
    }

    public function search(Request $request) 
    {

        $search = $request->input('search');
        $transactions = DB::table('transactioninfo')
            ->join('transactionline','transactionline.transac_id','transactioninfo.id')
            ->join('pet','pet.id','transactionline.pet_id')
            ->join('groom_service','groom_service.id','transactionline.service_id')     
            ->join('customer','customer.id','transactioninfo.customer_id')
            ->select('transactioninfo.id', 'transactionline.id as tlID','fname', 'lname',
                    'pet.pet_name', 'groom_name', 'price','quantity', 'transacation_date', 'status')
            // ->toSql();
            ->where('fname','like', '' . $search . '')
            ->get();
        return View::make('shop.search',compact('transactions'));
    }

    public function getReceipt() {
        return View::make('shop.receipt');
    }

}
