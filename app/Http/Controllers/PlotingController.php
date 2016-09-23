<?php

namespace App\Http\Controllers;

use App\plotings;
use Illuminate\Http\Request;
use Session;

class PlotingController extends Controller
{

    public function AllPlots()
    {
        $ploting = Plotings::orderBy('created_at', 'desc')->get();

        return view('pages.list_plotings', ['plots' => $ploting]);
    }

    public function CreatePlots(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);

        $ploting = new Plotings();
        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/plotings';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $ploting->plot = $request['name'];
        $ploting->description = $request['description'];
        $ploting->location = $request['location'];
        //$ploting->image_link = url('/images/plotings') . '/' . $fileName;
        $ploting->image_link = $fileName;
        $ploting->status = $request['status'];
//        $ploting->user_id = 4;
        $request->User()->plotings()->save($ploting);

        return redirect()->route('plots')->with(['message' => 'Plots Successfully Added!' . "  " . $ploting->plot]);
    }

    public function PlotsEdit($plot_id)
    {
        $plot = Plotings::WHERE('id', $plot_id)->get();
        return view('edit-pages.edit_plots', ['plots' => $plot]);
    }

    public function PlotsDelete($plot_id)
    {
        $plot = Plotings::WHERE('id', $plot_id)->first();

        if (!(empty($plot->image_link))) {
            unlink(public_path() . '/images/plotings/' . $plot->image_link);
            $plot->delete();
            return redirect()->route('plots')->with(['message' => 'Successfully Deleted  ! ' . " " . $plot->title]);
        } else {
            return redirect()->route('plots')->with(['message' => 'Sorry Something bad happened  ! ']);
        }
    }

    public function PlotsUpdate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required',
            'location' => 'required',
        ]);

        $plot = Plotings::find($request['plot_id']);
        $plot->plot = $request['name'];
        $plot->description = $request['description'];
        $plot->location = $request['location'];
        $plot->status = $request['status'];
        $file = $request->file("image");
        $old = $plot->image_link;
        if ($request->hasFile('image')) {
            if (!(empty($plot->image_link))) {
                unlink(public_path() . '/images/plotings/' . $plot->image_link);
            }
            $uploadPath = public_path() . '/images/plotings';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $plot->image_link = $fileName;
        } else {
            $plot->image_link = $old;
        }
//        $plot->user_id = 4;
        $plot->update();

        return redirect()->route('plots')->with(['message' => 'Successfully updated with necessary changes!' . "  " . $plot->plot]);
    }
}
