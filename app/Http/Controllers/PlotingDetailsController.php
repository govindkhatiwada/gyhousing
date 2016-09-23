<?php

namespace App\Http\Controllers;

use App\ploting_details;
use Illuminate\Http\Request;
use Session;

class PlotingDetailsController extends Controller
{

    public function AllPlotings()
    {
        $ploting = Ploting_details::orderBy('created_at', 'desc')->get();

        return view('pages.list_ploting_details', ['ploting' => $ploting]);
    }

    public function CreatePlotings(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'area' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $ploting = new ploting_details();
        $ploting->plot = $request['name'];
        $ploting->area = $request['area'];
        $ploting->price = $request['price'];
        $ploting->status = $request['status'];
        $ploting->plot_status = $request['plot_status'];
        $ploting->plotings_id = $request['ploting_id'];
        $request->User()->ploting_details()->save($ploting);

        return redirect()->route('ploting_details')->with(['message' => 'Ploting Successfully Added!' . "  " . $ploting->plot]);
    }

    public function PlotingsEdit($ploting_id)
    {
        $ploting = Ploting_details::WHERE('id', $ploting_id)->get();
        return view('edit-pages.edit_plotings', ['plots' => $ploting]);
    }

    public function PlotingsDelete($ploting_id)
    {
        $ploting = Ploting_details::WHERE('id', $ploting_id)->first();
        $ploting->delete();

        return redirect()->route('ploting_details')->with(['message' => 'Successfully Deleted  ! ' . $ploting->plot]);
    }

    public function PlotingsUpdate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'location' => 'required',
            'area' => 'required',
            'price' => 'required'
        ]);

        $ploting = Ploting_details::find($request['$ploting_id']);
        $ploting->plot = $request['name'];
        $ploting->location = $request['location'];
        $ploting->price = $request['price'];
        $ploting->area = $request['area'];
        $ploting->status = $request['status'];
//        $ploting->user_id = 4;
        $ploting->update();

        return redirect()->route('ploting_details')->with(['message' => 'Successfully updated with necessary changes!' . "  " . $ploting->plot]);
    }
}
