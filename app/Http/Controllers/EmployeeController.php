<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use View;
use File;
use Redirect;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::withTrashed() -> orderBy('id','DESC')->paginate(10);
        // dd($customers);
        // $customers = Customer::withTrashed() -> get();
        // $customers = Customer::all() -> sortByDesc('id')->paginate(10);
        
        //dd($customers);
        return View::make('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'email| required| unique:users',
            'password' => 'required| min:4'
        ]);
         $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        $employee = new Employee;

        $input = $request -> all();
        $request -> validate([
            'image' => 'image|required'
        ]);
        $validator = Validator::make($request->all(), Employee::$rules);
        if ($validator->passes()) {
            // Customer::create($request->all());
            if($file = $request -> hasFile('image')) {
                $file = $request->file('image');
                //$fileName = uniqid().'_'.$file->getClientOriginalName();
                //$fileName = $file->getClientOriginalName();
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
    
                $destinationPath = public_path().'/images/employee';
    
                $input['img_path'] = $fileName;
    
                $file->move($destinationPath, $fileName);
            }
           
            $employee -> fname = $request->fname;
            $employee-> lname = $request->lname;
            $employee -> user_id = $user->id;
            $employee-> phone = $request->phone;
            $employee-> img_path = $input['img_path'];
            $employee -> save();
        }
        return Redirect::to('employee')->with('success','New Employee added!');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('employee.show', ['employee'=> Employee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->fname = $request->input('fname');
        $employee->lname = $request->input('lname');
        $employee->phone = $request->input('phone');
        
        if($request->hasfile('image'))
        {
            $destinationPath = public_path().'/images/employee';
            if(File::exists($destinationPath))
            {
                File::delete($destinationPath);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $employee->img_path = $fileName;
        }

        $employee->update();
        return Redirect::to('employee')->with('success','Employee Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id)->delete();
        // $customer->delete();
        return Redirect::to('/employee')->with('success',' Employee deleted');
    }

    public function restore($id) 
    {
        Employee::withTrashed()->where('id',$id)->restore();
        return  Redirect::route('employee.index')->with('success','Employee restored successfully!');
    }


    
}
