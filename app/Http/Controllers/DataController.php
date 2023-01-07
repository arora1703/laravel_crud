<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Excel;


class DataController extends Controller
{
    public function index()
    {
        $data= Data::all();
        return view('dashboard',compact('data'));
    }
    
    public function add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data= new Data();
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->password=Hash::make($request->input('password'));
            
        if($request->hasFile('image')) 
        {        
        $destinationPath = 'uploads/profile_image'; 
        $image = $request->file('image');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $data->image = $profileImage;   
        }  
        $data->save();
        return redirect('/')->with('success','Record has been added');
    }
    public function edit($id)
    {
        $data = Data::where('id','=',$id)->first();
        return view('edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data = Data::find($id);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->password=Hash::make($request->input('password'));
    
        if($request->hasFile('image')) 
        {        
        $oldfile = 'uploads/profile_image/'.$data->image; 
        if(File::exists($oldfile))
        {
            File::delete($oldfile);
        }
        $destinationPath = 'uploads/profile_image/';
        $image = $request->file('image');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $data->image = $profileImage;   
        }  
        $data->update();
        return redirect('/')->with('success','Record has been updated');

        return view('edit',compact('data'));
    }
    public function export()
    {
        // return (new DataExport)->download('data.xlxs', \Maatwebsite\Excel\Excel::XLXS);

        return Excel::download(new DataExport, 'data.csv');

    }
}
