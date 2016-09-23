<?php

namespace App\Http\Controllers;

use App\houses;
use Illuminate\Http\Request;
use Session;

class HousesController extends Controller
{

    public function AllHouses()
    {
        $houses = Houses::orderBy('created_at', 'DESC')->get();

        return view('pages.list_houses', ['houses' => $houses]);
    }

    public function CreateHouses(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'space' => 'required',
            'storied' => 'required',
            'image' => 'required',
            'number_of_rooms' => 'required',
            'description' => 'required',
            'number_of_toilet' => 'required',
            'number_of_bathroom' => 'required',
            'number_of_attached_bathroom' => 'required',
            'number_of_living_room' => 'required',
            'number_of_kitchen' => 'required',
            'parking' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $house = new Houses();
        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/house';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $house->title = $request['title'];
        $house->space = $request['space'];
        $house->storied = $request['storied'];
        $house->number_of_rooms = $request['number_of_rooms'];
        $house->description = $request['description'];
        $house->number_of_toilet = $request['number_of_toilet'];
        $house->number_of_bathroom = $request['number_of_bathroom'];
        $house->number_of_attached_bathroom = $request['number_of_attached_bathroom'];
        $house->number_of_living_room = $request['number_of_living_room'];
        $house->number_of_kitchen = $request['number_of_kitchen'];
        $house->parking = $request['parking'];
        $house->location = $request['location'];
        //$house->image_path = url('/house') . '/' . $fileName;
        $house->image_path = $fileName;
        $house->price = $request['price'];
        $house->access_to_road = $request['access_to_road'];
        $house->status = $request['status'];
//        $house->user_id = 4;
        $house->save();

        return redirect()->route('houses')->with(['message' => 'Houses Successfully Added!' . "  " . $house->title]);
    }

    public function HousesEdit($house_id)
    {
        $houses = Houses::WHERE('id', $house_id)->get();
        return view('edit-pages.edit_houses', ['houses' => $houses]);
//        if (!(empty($house->image_path))) {
//            unlink(public_path() . '/images/house/' . $house->image_path);
//            $house->delete();
//            return redirect()->route('houses')->with(['message' => 'Successfully Deleted  ! ' . " " . $house->title]);
//        } else
//        {
//            return redirect()->route('houses')->with(['message' => 'Sorry Something bad happened  ! ']);
//        }

    }

    public function HousesDelete($house_id)
    {
        $house = Houses::WHERE('id', $house_id)->first();
        $house->delete();

        return redirect()->route('houses')->with(['message' => 'Successfully Deleted  ! ' . $house->title]);
    }

    public function HousesUpdate(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:20',
            'space' => 'required',
            'storied' => 'required',
            'number_of_rooms' => 'required',
            'description' => 'required',
            'number_of_toilet' => 'required',
            'number_of_bathroom' => 'required',
            'number_of_attached_bathroom' => 'required',
            'number_of_living_room' => 'required',
            'number_of_kitchen' => 'required',
            'parking' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $house = Houses::find($request['house_id']);
        $house->title = $request['title'];
        $house->space = $request['space'];
        $house->storied = $request['storied'];
        $house->number_of_rooms = $request['number_of_rooms'];
        $house->description = $request['description'];
        $house->number_of_toilet = $request['number_of_toilet'];
        $house->number_of_bathroom = $request['number_of_bathroom'];
        $house->number_of_attached_bathroom = $request['number_of_attached_bathroom'];
        $house->number_of_living_room = $request['number_of_living_room'];
        $house->number_of_kitchen = $request['number_of_kitchen'];
        $house->parking = $request['parking'];
        $house->location = $request['location'];
        $house->price = $request['price'];
        $house->access_to_road = $request['access_to_road'];
        $house->status = $request['status'];

        $file = $request->file("image");
        $old = $house->image_path;
        if ($request->hasFile('image')) {
            if (!(empty($house->image_path))) {
                unlink(public_path() . '/images/house/' . $house->image_path);
            }
            $uploadPath = public_path() . '/images/house';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $house->image_path = $fileName;
        } else {
            $house->image_path = $old;
        }
//        $house->user_id = 4;
        $house->update();

        return redirect()->route('houses')->with(['message' => 'Houses Successfully updated with necessary changes!' . "  " . $house->title]);
    }

}
