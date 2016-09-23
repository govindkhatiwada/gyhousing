<?php

namespace App\Http\Controllers;

use App\flats;
use Illuminate\Http\Request;
use Session;

class FlatsController extends Controller
{
    public function AllFlats()
    {
        $flats = Flats::orderBy('created_at', 'desc')->get();

        return view('pages.list_flats', ['flats' => $flats]);
    }

    public function CreateFlats(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'space' => 'required',
            'number_of_rooms' => 'required',
            'description' => 'required',
            'number_of_toilets' => 'required',
            'number_of_bathroom' => 'required',
            'image' => 'required',
            'number_of_attached_bathroom' => 'required',
            'number_of_living_rooms' => 'required',
            'number_of_kitchen' => 'required',
            'parking' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $flat = new Flats();
        //dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/flat';
        //dd($uploadPath);
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $flat->title = $request['title'];
        $flat->space = $request['space'];
        $flat->number_of_rooms = $request['number_of_rooms'];
        $flat->description = $request['description'];
        $flat->number_of_toilet = $request['number_of_toilets'];
        $flat->number_of_bathroom = $request['number_of_bathroom'];
        $flat->number_of_attached_bathroom = $request['number_of_attached_bathroom'];
        $flat->number_of_living_room = $request['number_of_living_rooms'];
        $flat->number_of_kitchen = $request['number_of_kitchen'];
        $flat->parking = $request['parking'];
        $flat->location = $request['location'];
        // $flat->image_path = url('/flat') . '/' . $fileName;
        $flat->image_path = $fileName;
        $flat->price = $request['price'];
        $flat->access_to_road = $request['access_to_road'];
        $flat->status = $request['status'];
//        $flat->user_id = 3;
        $request->User()->flats()->save($flat);

        return redirect()->route('flats')->with(['message' => 'Flats Successfully Added!' . "  " . $flat->title]);
    }

    public function FlatsEdit($flat_id)
    {
        $flat = Flats::WHERE('id', $flat_id)->get();
        return view('edit-pages.edit_flats', ['flats' => $flat]);
    }

    public function FlatsDelete($flat_id)
    {
        $flat = Flats::WHERE('id', $flat_id)->first();

        if (!(empty($flat->image_path))) {
            unlink(public_path() . '/images/flat/' . $flat->image_path);
            $flat->delete();
            return redirect()->route('flats')->with(['message' => 'Successfully Deleted  ! ' . " " . $flat->title]);
        } else {
            return redirect()->route('flats')->with(['message' => 'Sorry Something bad happened  ! ']);
        }

    }

    public function FlatUpdate(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:20',
            'space' => 'required',
            'number_of_rooms' => 'required',
            'description' => 'required',
            'number_of_toilet' => 'required',
            'number_of_bathroom' => 'required',
            'number_of_attached_bathroom' => 'required',
            'number_of_living_rooms' => 'required',
            'number_of_kitchen' => 'required',
            'parking' => 'required',
            'location' => 'required',
            'price' => 'required',
            'access_to_road' => 'required'
        ]);

        $flat = Flats::find($request['flat_id']);
        $flat->title = $request['title'];
        $flat->space = $request['space'];
        $flat->number_of_rooms = $request['number_of_rooms'];
        $flat->description = $request['description'];
        $flat->number_of_toilet = $request['number_of_toilet'];
        $flat->number_of_bathroom = $request['number_of_bathroom'];
        $flat->number_of_attached_bathroom = $request['number_of_attached_bathroom'];
        $flat->number_of_living_room = $request['number_of_living_rooms'];
        $flat->number_of_kitchen = $request['number_of_kitchen'];
        $flat->parking = $request['parking'];
        $flat->location = $request['location'];
        $flat->price = $request['price'];
        $flat->access_to_road = $request['access_to_road'];
        $flat->status = $request['status'];

        $file = $request->file("image");
        $old = $flat->image_path;
        if ($request->hasFile('image')) {
            if (!(empty($flat->image_path))) {
                unlink(public_path() . '/images/flat/' . $flat->image_path);
            }
            $uploadPath = public_path() . '/images/flat';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $flat->image_path = $fileName;
        } else {
            $flat->image_path = $old;
        }
//        $flat->user_id = 4;
        $flat->update();

        return redirect()->route('flats')->with(['message' => 'Flats Successfully updated with necessary changes!' . "  " . $flat->title]);
    }
}
