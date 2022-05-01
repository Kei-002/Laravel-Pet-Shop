<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use View;
use File;
use Redirect;
use Validator;
use Illuminate\Pagination\Paginator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::withTrashed() -> orderBy('id','DESC')->paginate(10);
        // dd($customers);
        // $customers = Customer::withTrashed() -> get();
        // $customers = Customer::all() -> sortByDesc('id')->paginate(10);
        
        //dd($customers);
        return View::make('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('customer.create');

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
        $input = $request -> all();
        $request -> validate([
            'image' => 'image|required'
        ]);
        $validator = Validator::make($request->all(), Customer::$rules);
        if ($validator->passes()) {
            // Customer::create($request->all());
            if($file = $request -> hasFile('image')) {
                $file = $request->file('image');
                //$fileName = uniqid().'_'.$file->getClientOriginalName();
                //$fileName = $file->getClientOriginalName();
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
    
                $destinationPath = public_path().'/images';
    
                $input['img_path'] = $fileName;
    
                $file->move($destinationPath, $fileName);
            }
    
            Customer::create($input);
            return Redirect::to('customer')->with('success','New customer added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);

        
        // return Redirect::to('customer')->with('success','New Customer Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('customer.show', ['customer'=> Customer::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->title = $request->input('title');
        $customer->fname = $request->input('fname');
        $customer->lname = $request->input('lname');
        $customer->addressline = $request->input('addressline');
        $customer->town = $request->input('town');
        $customer->zipcode = $request->input('zipcode');
        $customer->phone = $request->input('phone');
        
        if($request->hasfile('image'))
        {
            $destinationPath = public_path().'/images';
            if(File::exists($destinationPath))
            {
                File::delete($destinationPath);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $customer->img_path = $fileName;
        }

        $customer->update();
        return Redirect::to('customer')->with('success','Customer Updated Succesfully');
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
        $customer = Customer::findOrFail($id)->delete();
        // $customer->delete();
        return Redirect::to('/customer')->with('success',' customer deleted');

    }

    public function restore($id) 
    {
        Customer::withTrashed()->where('id',$id)->restore();
        return  Redirect::route('customer.index')->with('success','customer restored successfully!');
    }
}
