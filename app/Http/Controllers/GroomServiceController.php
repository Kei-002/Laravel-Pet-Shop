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

class GroomServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grooms = GroomService::withTrashed() -> orderBy('id','DESC')->paginate(10);
        // dd($customers);
        // $customers = Customer::withTrashed() -> get();
        // $customers = Customer::all() -> sortByDesc('id')->paginate(10);
        
        //dd($customers);
        return View::make('groomservice.index', compact('grooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('groomservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request -> all();
        $request -> validate([
            'image' => 'image|required'
        ]);
        $validator = Validator::make($request->all(), GroomService::$rules);
        if ($validator->passes()) {
            // Customer::create($request->all());
            if($file = $request -> hasFile('image')) {
                $file = $request->file('image');
                //$fileName = uniqid().'_'.$file->getClientOriginalName();
                //$fileName = $file->getClientOriginalName();
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
    
                $destinationPath = public_path().'/images/groom';
    
                $input['img_path'] = $fileName;
    
                $file->move($destinationPath, $fileName);
            }
    
            GroomService::create($input);
            return Redirect::to('groomservice')->with('success','New Service added!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('groomservice.show', ['groom'=> GroomService::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groom = GroomService::find($id);
        // dd(compact('customer'));
        return View::make('groomservice.edit',compact('groom'));
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
        $groom = GroomService::find($id);
        $groom->groom_name = $request->input('groom_name');
        $groom->price = $request->input('price');
 
        if($request->hasfile('image'))
        {
            $destinationPath = public_path().'/images/groom';
            if(File::exists($destinationPath))
            {
                File::delete($destinationPath);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $groom->img_path = $fileName;
        }

        $groom->update();
        return Redirect::to('groomservice')->with('success','Service Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groom = GroomService::findOrFail($id)->delete();
        // $customer->delete();
        return Redirect::to('groomservice')->with('success',' Groom Service deleted');
    }

    public function restore($id) 
    {
        GroomService::withTrashed()->where('id',$id)->restore();
        return  Redirect::route('groomservice.index')->with('success','Groom Service restored successfully!');
    }




    
   
}   
