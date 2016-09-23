<?php

namespace App\Http\Controllers;

use App\banners;
use Illuminate\Http\Request;
use Session;
use Storage;

class BannerController extends Controller
{

    public function AllBanners()
    {
        $banner = Banners::orderBy('created_at', 'desc')->get();

        return view('pages.list_banners', ['banners' => $banner]);
    }

    public function CreateBanners(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
//            'link' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $banner = new Banners();

        //dd($request->file("image"));
        $file = $request->file("image");
        $uploadPath = public_path() . '/images/banners';
        //dd($uploadPath);
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);

        $banner->title = $request['name'];
//        $banner->link = $request['link'];
        $banner->description = $request['description'];
        //$banner->image_link = url('/images/banners') . '/' . $fileName;
        $banner->image_link = $fileName;
        $banner->status = $request['status'];
//        $banner->user_id = 4;
        $request->User()->banners()->save($banner);

        return redirect()->route('banners')->with(['message' => 'Banner Successfully Added!' . "  " . $banner->title]);
    }

    public function BannersEdit($banner_id)
    {
        $banner = Banners::WHERE('id', $banner_id)->get();

        return view('edit-pages.edit_banners', ['banners' => $banner]);
    }

    public function BannersDelete($banner_id)
    {
        $banner = Banners::WHERE('id', $banner_id)->first();
        // dd($banner->image_link);
        if (!(empty($banner->image_link))) {
            unlink(public_path() . '/images/banners/' . $banner->image_link);
            $banner->delete();
            return redirect()->route('banners')->with(['message' => 'Successfully Deleted  ! ' . " " . $banner->title]);
        } else {
            return redirect()->route('banners')->with(['message' => 'Sorry Something bad happned  ! ']);
        }


    }

    public function BannersUpdate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'link' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);


        $file = $request->file("image");
        $banner = banners::find($request['banner_id']);
        $banner->title = $request['name'];
        $banner->description = $request['description'];
        $banner->link = $request['link'];
        $old = $banner->image_link;

        $banner->status = $request['status'];
        if ($request->hasFile('image')) {
            if (!(empty($banner->image_link))) {
                unlink(public_path() . '/images/banners/' . $banner->image_link);
            }
            $uploadPath = public_path() . '/images/banners';
            //dd($uploadPath);
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $banner->image_link = $fileName;
        } else {
            $banner->image_link = $old;
        }
        $banner->update();
        return redirect()->route('banners')->with(['message' => 'Successfully updated with necessary changes!' . "  " . $banner->title]);
    }

}
