<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Auth;
use DB;
use Session;
use Validator;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

     public function postSignup(Request $request){
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
         Auth::login($user);
        return redirect()->route('user.profile');
    }

    public function getProfile(){
        $employee = DB::table('employee')
        ->join('users','users.id','employee.user_id')
        // ->select('pet.id', 'customer.fname','customer.lname', 'pet.pet_name', 'pet.age',  'pet.img_path', 'pet.deleted_at')
        // ->toSql();
        ->where('employee.user_id', Auth::user() -> id)
        ->first();
        // $employee = Auth::user() ;
        return view('user.profile', compact('employee'));
    }
    
    public function getLogout(){
        Auth::logout();
        return redirect() -> route('customer.index');
    }

    public function getSignin(){
        return view('user.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
         if(Auth::attempt(['email' => $request->input('email'),'password' => $request->password])){
            return redirect()->route('user.profile');
        } else{
            return redirect()->back();
        };
     }

     public function search(Request $request) 
    {

        $search = $request->input('search');
        $consultations = DB::table('consultation')
            ->join('pet','pet.id','consultation.pet_id')
            ->join('disease','disease.id','consultation.disease_id')
            ->join('employee','employee.id','consultation.employee_id')
            ->select('consultation.id', 'pet.id', 'pet.pet_name', 'employee.id', 'employee.fname', 'employee.lname', 'disease.id',  'disease.disease_name', 'consultation.created_at', 'comments', 'fee')
            // ->toSql();
            ->where('pet_name', 'like', '' . $search . '')
            ->get();
        return View::make('consultation.index',compact('consultations'));

    }

}
