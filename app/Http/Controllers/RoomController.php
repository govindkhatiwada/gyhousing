<?php

namespace App\Http\Controllers;

use App\rooms;
use Illuminate\Http\Request;
use Session;

class RoomController extends Controller
{
    public function AllRooms()
    {
        $room = Rooms::orderBy('created_at', 'desc')->get();

        return view('pages.list_rooms', ['rooms' => $room]);
    }

    public function CreateRooms(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'location' => 'required',
            'price' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);

        $room = new Rooms();

        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/rooms';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);

        $room->title = $request['name'];
        $room->price = $request['price'];
        $room->location = $request['location'];
        $room->image_path = $fileName;
        $room->status = $request['status'];
//        $room->user_id = 4;
        $room->save();

        return redirect()->route('room_details')->with(['message' => 'Room Successfully Added!' . "  " . $room->title]);
    }

    public function RoomsEdit($room_id)
    {
        $room = Rooms::WHERE('id', $room_id)->get();
        return view('edit-pages.edit_rooms', ['rooms' => $room]);
    }

    public function RoomsDelete($room_id)
    {
        $room = Rooms::WHERE('id', $room_id)->first();
        $room->delete();

        return redirect()->route('room_details')->with(['message' => 'Successfully Deleted  ! ' . $room->title]);
    }

    public function RoomsUpdate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'location' => 'required',
            'image' => 'required',
            'price' => 'required'
        ]);

        $room = Rooms::find($request['room_id']);
        $room->title = $request['name'];
        $room->location = $request['location'];
        $room->price = $request['price'];
        $room->status = $request['status'];
        $file = $request->file("image");
        $old = $room->image_path;
        if ($request->hasFile('image')) {
            if (!(empty($room->image_path))) {
                unlink(public_path() . '/images/room/' . $room->image_path);
            }
            $uploadPath = public_path() . '/images/room';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $room->image_path = $fileName;
        } else {
            $room->image_path = $old;
        }
//        $room->user_id = 4;
        $room->update();

        return redirect()->route('room_details')->with(['message' => 'Successfully updated with necessary changes!' . "  " . $room->title]);
    }
}
