<?php

namespace App\Http\Controllers;

use App\lands;
use Illuminate\Http\Request;
use Session;

class LandController extends Controller
{

    public function AllLands()
    {
        $lands = Lands::orderBy('created_at', 'desc')->get();

        return view('pages.list_lands', ['lands' => $lands]);
    }

    public function CreateLands(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'area' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $land = new Lands();
        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/land';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $land->title = $request['title'];
        $land->area = $request['area'];
        $land->description = $request['description'];
        $land->location = $request['location'];
        //$land->image_path = url('/images/land') . '/' . $fileName;
        $land->image_path = $fileName;
        $land->price = $request['price'];
        $land->access_to_road = $request['access_to_road'];
        $land->status = $request['status'];
//        $land->user_id = 4;
        $land->save();

        return redirect()->route('lands')->with(['message' => 'Successfully Added!' . "  " . $land->title]);
    }

    public function LandEdit($land_id)
    {
        $land = Lands::WHERE('id', $land_id)->get();
        return view('edit-pages.edit_lands', ['land' => $land]);
    }

    public function LandDelete($land_id)
    {
        $land = Lands::WHERE('id', $land_id)->first();
        if (!(empty($land->image_path))) {
            unlink(public_path() . '/images/land/' . $land->image_path);
            $land->delete();
            return redirect()->route('lands')->with(['message' => 'Successfully Deleted  ! ' . " " . $land->title]);
        } else {
            return redirect()->route('lands')->with(['message' => 'Sorry Something bad happened  ! ']);
        }
    }

    public function LandUpdate(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:20',
            'area' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $land = Lands::find($request['land_id']);
        $land->title = $request['title'];
        $land->area = $request['area'];
        $land->description = $request['description'];
        $land->location = $request['location'];
        $land->price = $request['price'];
        $land->access_to_road = $request['access_to_road'];
        $land->status = $request['status'];
        $file = $request->file("image");
        $old = $land->image_path;
        if ($request->hasFile('image')) {
            if (!(empty($land->image_path))) {
                unlink(public_path() . '/images/land/' . $land->image_path);
            }
            $uploadPath = public_path() . '/images/land';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $land->image_path = $fileName;
        } else {
            $land->image_path = $old;
        }
//        $land->user_id = 4;
        $land->update();

        return redirect()->route('lands')->with(['message' => 'Lands Successfully updated with necessary changes!' . "  " . $land->title]);
    }

}
