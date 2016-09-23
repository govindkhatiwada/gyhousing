<?php

namespace App\Http\Controllers;

use App\bookings;
use App\flats;
use App\houses;
use App\lands;
use App\pages;
use App\plotings;
use App\rooms;
use App\Sell;
use Illuminate\Http\Request;
use Session;
use Storage;
use Validator;

class FrontendController extends Controller
{
//    public function ListHouses(){
//        $houses=Houses::paginate(2);
//        return view('frontendviews.listHouses',['houses'=>$houses]);
//    }
    //
    public function plotingDetails(plotings $plots)
    {

        return view('frontendviews.plotingDetails', compact('plots'));
    }

    public function HousesById($id)
    {
        $house = Houses::Where('id', $id)->get();
        $prop_id = $id;
        $prop_type = 'house';
        return view('frontendviews.housesProperties', ['houses' => $house, 'prop_id' => $prop_id, 'prop_type' => $prop_type]);
    }

    public function LandById($id)
    {
        $land = Lands::Where('id', $id)->get();
        $prop_id = $id;
        $prop_type = 'land';
        return view('frontendviews.landProperties', ['land' => $land, 'prop_id' => $prop_id, 'prop_type' => $prop_type]);
    }

    public function FlatById($id)
    {
        $flat = Flats::Where('id', $id)->get();
        $prop_id = $id;
        $prop_type = 'flat';
        return view('frontendviews.flatProperties', ['flat' => $flat, 'prop_id' => $prop_id, 'prop_type' => $prop_type]);
    }

    public function RoomById($id)
    {
        $room = Rooms::Where('id', $id)->get();
        $prop_id = $id;
        $prop_type = 'room';
        return view('frontendviews.roomProperties', ['room' => $room, 'prop_id' => $prop_id, 'prop_type' => $prop_type]);
    }

    public function search(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $type = $request->get('type');
        if ($type == 'house') {
            if (($keyword = $request->get('keyword'))) {
                $result = Houses::Where('title', 'like', '%' . $keyword . '%')->get();
                //dd($result);

            }
        } else if ($type == 'land') {
            if (($keyword = $request->get('keyword'))) {
                $result = Lands::Where('title', 'like', '%' . $keyword . '%')->get();
                //dd($result);

            }
        } else if ($type == 'flats') {
            if (($keyword = $request->get('keyword'))) {
                $result = Flats::Where('title', 'like', '%' . $keyword . '%')->get();
                //dd($result);

            }
        } else if ($type == 'room') {
            if (($keyword = $request->get('keyword'))) {
                $result = Rooms::Where('title', 'like', '%' . $keyword . '%')->get();
                //dd($result);

            }

        } else {
            $result = "";
        }
        return view('frontendviews.search', ['result' => $result]);
    }

    protected function validator(array $data)
    {
        //dd("uuu");
        return Validator::make($data, [
            'keyword' => 'required|max:255'
        ]);
    }

    public function BookProperty(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:50',
            'contact' => 'required|unique:bookings|numeric',
            'address' => 'required|max:50'
        ]);

        $book = new Bookings();
        $book->full_name = $request['fullname'];
        $book->contact = $request['contact'];
        $book->address = $request['address'];
        $book->booking_number = $request['plot'];
        $book->property_type = $request['property_type'];
        $book->save();

        return redirect()->back()->with(['success' => 'Thanks for Booking.. !! <br/> We will contact you AS SOON AS POSSIBLE!!! ']);
    }

    public function SellPost(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:20',
            'contact' => 'required',
            'description' => 'required',
            'price' => 'required',
            'address' => 'required'
        ]);

        $sell = new Sell();
        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/sell';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $sell->full_name = $request['fullname'];
        $sell->contact = $request['contact'];
        $sell->address = $request['address'];
        $sell->description = $request['description'];
        $sell->image_path = $fileName;
        $sell->price = $request['price'];

        $sell->save();

        return redirect()->back()->with(['message' => 'Post Successfully Added!']);
    }

    public function PageByTitle($title)
    {
        $page = Pages::Where('title', $title)->get();
        return view('frontendviews.pages', ['pages' => $page]);
    }

}

