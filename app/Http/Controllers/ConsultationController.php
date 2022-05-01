<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Pet;
use App\Models\Employee;
use App\Models\Disease;
use Illuminate\Http\Request;
use View;
use File;
use DB;
use Redirect;
use Validator;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // return View::make('consultation.index', compact('consultations')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $pets = Pet::all();
        $diseases = Disease::all();
        
        return View::make('consultation.create', compact('employees', 'pets', 'diseases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $input = $request -> all();
            Consultation::create($input);
        }
        catch(\Exception $e) {
            DB::rollback();
            return Redirect::to('consultation/create')->with('error',$e->getMessage());
        }

        DB::commit();
        return Redirect::to('consultation/create')->with('success','Consultation success');
        
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
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
