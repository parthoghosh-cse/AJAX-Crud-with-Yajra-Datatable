<?php

namespace App\Http\Controllers;

use datatables;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return datatables()->of(Staff::all())
            ->addcolumn('action',function($data){
               $output='';
               $output .= '<a style="width:70px;height:40px;" class="btn btn-info data-veiw" view_id="'.$data->id.'" href="">View</a>';
               $output .= '<a style="width:70px;height:40px;" class="btn btn-warning data-edit" edit_id="'.$data->id.'" href="">Edit</a>';
               $output .= '<a style="width:70px;height:40px;" class="btn btn-danger data-delete" delete_id="'.$data->id.'" href="">Delete</a>';

               return $output;
          

            })
            ->rawcolumns(['action'])->make();

        }
        return view('staff.index');
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
        $file_name="";
        if($request->hasFile("photo")){
           $img = $request->file("photo");
           $file_name= md5(time().rand()).".".$img->getClientOriginalExtension();
           $img->move(storage_path("app/public/staff"),$file_name);


        }


        Staff::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'cell'       => $request->cell,
            'edu'        => $request->edu,
            'gender'     => $request->gender,
            'username'   => $request->username,
            'photo'      => $file_name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show( $staff)
    {
        $staff_data = Staff::find($staff);

        $gender_data=' <input type="radio" '.($staff_data->gender =="Male" ? "checked" : "") .' name="gender" value="Male" id="Male">
        <label for="Male">Male</label>

        <input type="radio" '.($staff_data->gender =="Female" ? "checked" :"").' name="gender" value="Female" id="Female">
        <label for="Female">Female</label>';


        $edu_type= ['PSC','JSC','SSC','HSC','BSC'];

        $edu_data = '<label for="">Education</label>';
        $edu_data .='<select class="form-control" name="edu" id="">';
        $edu_data .='<option value="">-SELECT-</option>';

        foreach($edu_type as $edu){
            $edu_data .='<option '.($edu == $staff_data->edu ? "selected" : "").' value="'.$edu.'">'.$edu.'</option>';

        }



        $edu_data .='</select>';
     

        

        return [
            'id'       =>$staff_data->id,
            'name'     => $staff_data->name,
            'email'    => $staff_data->email,
            'cell'     => $staff_data->cell,
            'username' => $staff_data->username,
            'gender'   => $gender_data,
            'edu'      => $edu_data
            
          

        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }

   /**
    * staff data delete
    */

    public function staffDel($id)
    {
       $delete_data= Staff::find($id);
       $delete_data->delete();
    }


    /**
     * staff update
     */

     public function staffUpdate(Request $request)
     {
        $staff_data = Staff::find($request->update_id);
        
        $staff_data ->name =$request->name;
        $staff_data ->email =$request->email;
        $staff_data ->cell =$request->cell;
        $staff_data ->username =$request->username;
        $staff_data ->edu =$request->edu;
        $staff_data ->gender =$request->gender;
        $staff_data ->update();

     }


}
