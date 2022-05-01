<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroomService;
use App\Models\Customer;
use View;
use Redirect;
use File;
use Validator;

use Auth;
use DB;
use App\Cart;
use App\Models\Comment;
use Session;
use Carbon;

class CommentController extends Controller
{
    public function viewService($id)
    {
        $service = GroomService::find($id);
        $customers = Customer::all();
        $allcomment = DB::table('comments')
            ->join('groom_service','groom_service.id','service_id')
            ->select('comments.id', 'service_id', 'name', 'comment','comments.created_at')
            // ->toSql();
            ->where('service_id', $id)
            ->get();
        return View::make('shop.view', compact('service', 'customers', 'allcomment'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $commentz = new Comment();
        $commentz ->service_id = $request -> service_id;
        $commentz ->name = $request -> customer_name;
        $commentz ->comment = $request -> comment;

        $commentz -> save();
        return redirect() -> back()->with('success','Review saved');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
