<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use View;
use Redirect;
use Validator;
use DB;
use File;
use App\Models\Customer;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $pets = Pet::withTrashed() -> orderBy('id','DESC')->paginate(10);
        // // dd($customers);
        // // $customers = Customer::withTrashed() -> get();
        // // $customers = Customer::all() -> sortByDesc('id')->paginate(10);
        
        // //dd($customers);
        // return View::make('pet.index', compact('pets'));
        
        $pets = DB::table('pet')
            ->join('customer','customer.id','pet.customer_id')
            ->select('pet.id', 'customer.fname','customer.lname', 'pet.pet_name', 'pet.age',  'pet.img_path', 'pet.deleted_at')
            // ->toSql();
            ->paginate(10);
        return View::make('pet.index',compact('pets')) ;
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return View::make('pet.create', compact('customers'));
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
        $validator = Validator::make($request->all(), Pet::$rules);
        if ($validator->passes()) {
            // Customer::create($request->all());
            if($file = $request -> hasFile('image')) {
                $file = $request->file('image');
                //$fileName = uniqid().'_'.$file->getClientOriginalName();
                //$fileName = $file->getClientOriginalName();
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
    
                $destinationPath = public_path().'/images/pet';
    
                $input['img_path'] = $fileName;
    
                $file->move($destinationPath, $fileName);
            }
            
            Pet::create($input);
            return Redirect::to('pet')->with('success','New Pet added!');
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
        $pets = DB::table('pet')
        ->join('customer','customer.id','pet.customer_id')
        ->select('pet.id', 'customer.fname','customer.lname', 'pet.pet_name', 'pet.age',  'pet.img_path', 'pet.deleted_at')
        // ->toSql();
        ->where('pet.id', $id)
        ->first();
        return View::make('pet.modal.show',compact('pets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pets = Pet::find($id);
        // dd(compact('customer'));
        $customers = Customer::pluck('lname','id' );
        return View::make('pet.edit',compact('pets', 'customers'));
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
        $pet = Pet::find($id);
        $pet->pet_name = $request->input('pet_name');
        $pet->age = $request->input('age');
        $pet->customer_id = $request->input('customer_id');
        
        if($request->hasfile('image'))
        {
            $destinationPath = public_path().'/images/pet';
            if(File::exists($destinationPath))
            {
                File::delete($destinationPath);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $pet->img_path = $fileName;
        }

        $pet->update();
        return Redirect::to('pet')->with('success','Pet Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $pets = Pet::findOrFail($id)->delete();
        // $customer->delete();
        return Redirect::to('pet')->with('success',' Pet deleted');
    }

    public function restore($id) 
    {
        Pet::withTrashed()->where('id',$id)->restore();
        return  Redirect::route('pet.index')->with('success','Pet Restored Successfully!');
    }
}
