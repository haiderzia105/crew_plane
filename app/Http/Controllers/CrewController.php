<?php

namespace App\Http\Controllers;


use App\Models\Crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CrewController extends Controller
{

    public function index()
    {
    $crew['crews']=Crew::orderBy('id','desc')->paginate(5);
    return view('screens.result', $crew);
    }

    public function create()
    {
      
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
      
        $path = $request->file('image')->store('public/images');
        $crew = new Crew();
        $crew->name = $request->name;
        $crew->price = $request->price;
        $crew->description = $request->description;
        $crew->image = $path;
        $crew->save();
        
        return redirect()->route('crews.index')->with('success', 'Post has been created succesfully.');
    }


    public function show($id)
    {
       
    }


    public function edit(crew $crew)
    {
        return view('screens.update', compact('crew'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
        'name'=>'required',
        'price'=>'required',
        'description'=>'required',
        ]);
        $crew =Crew::find('$id');
        if($request->hasfile('image')){
        $request->validate([
        'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $path = $request->file('image')->store('public/images');
        $crew->image = $path;
        }
        $crew->name  = $request->name;
        $crew->price = $request->price;
        $crew->description = $request->description;
        $crew->save();
        return redirect->route('crews.index')->with('Success', 'Data Updated successfully.');
    }

    public function destroy($id)
    {
        $crew->delete();
        return redirect()->route('crews.index')->with('success','Post has been deleted successfully');
    }
}
