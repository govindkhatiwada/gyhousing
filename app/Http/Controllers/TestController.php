<?php

namespace App\Http\Controllers;

use App\testimonials;
use Illuminate\Http\Request;
use Session;

class TestController extends Controller
{
    /* testimonials CRUD */

    public function AllTestimonials()
    {
        $test = Testimonials::orderBy('created_at', 'desc')->get();

        return view('pages.list_testimonials', ['tests' => $test]);
    }

    public function CreateTestimonials(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'message' => 'required'
        ]);

        $test = new Testimonials();
        //  dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/test';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);


        $test->name = $request['name'];
        $test->message = $request['message'];
        $test->status = $request['status'];
        //$test->image_link =url('/test').'/'.$fileName;
        $test->image_link = $fileName;
//        $test->user_id = 4;
        $test->save();

        return redirect()->route('testimonials')->with(['message' => 'Testimonial Successfully Added!' . "  " . $test->name]);
    }

    public function TestEdit($test_id)
    {
        $test = Testimonials::WHERE('id', $test_id)->get();

        return view('edit-pages.edit_test', ['tests' => $test]);
    }

    public function TestDelete($test_id)
    {
        $test = Testimonials::WHERE('id', $test_id)->first();
        //dd($test->image_link);

        if (!(empty($test->image_link))) {
            unlink(public_path() . '/images/test/' . $test->image_link);
            $test->delete();
            return redirect()->route('testimonials')->with(['message' => 'Successfully Deleted  ! ' . " " . $test->title]);
        } else {
            return redirect()->route('testimonials')->with(['message' => 'Sorry Something bad happened  ! ']);
        }
    }

    public function TestUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required'
        ]);

        $test = Testimonials::find($request['test_id']);
        $test->name = $request['name'];
        $test->message = $request['message'];
        $file = $request->file("image");

        $old = $test->image_link;

        $test->status = $request['status'];
        if ($request->hasFile('image')) {
            if (!(empty($test->image_link))) {
                unlink(public_path() . '/images/test/' . $test->image_link);
            }
            $uploadPath = public_path() . '/images/test';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $test->image_link = $fileName;
        } else {
            $test->image_link = $old;
        }
        $test->update();
        $test->update();

        return redirect()->route('testimonials')->with(['message' => 'Successfully Updated  ! ' . $test->name]);
    }
}
