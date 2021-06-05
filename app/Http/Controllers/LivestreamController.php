<?php

namespace App\Http\Controllers;

use App\Livestream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivestreamController extends Controller
{
    public function start(Request $request)
    {
        $id = $request->id;
        Livestream::where('id','!=',$id)->where('status', 'started')->update(['status' => 'ended']);
        $update_stream = Livestream::where('id',$id)->update(['status'=>'started']);
        if($update_stream){
            $notification = array(
                'message' => "Stream Started Successfully.",
                'alert-type' => 'success'
            );
            return true;
        }
        return false;
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $delete_stream = Livestream::where('id',$id)->delete();
        if($delete_stream){
            $notification = array(
                'message' => "Stream Deleted Successfully.",
                'alert-type' => 'success'
            );
            return true;
        }
        return false;
    }

    public function end(Request $request)
    {
        $id = $request->id;
        $updatestream = Livestream::where('id',$id)->update(['status'=>'ended']);
        if($updatestream){
            $notification = array(
                'message' => "Stream Ended Successfully.",
                'alert-type' => 'success'
            );
            return true;
        }
        return false;
    }

    public function store(Request $request)
    {
        $validate  = Validator::make($request->all(), [
            'event_name' => 'required',
            'url' => 'required',
            'type' => 'required',
            'cover_image'=> 'file|image|mimes:jpeg,png,gif,webp',
        ]);
        if($validate->fails()){
            $notification = array(
                'message' => $validate->messages()->first(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        $data = $request->only(['event_name', 'url', 'type', 'description']);

        if($request->hasFile('cover_image')){
            $cover_image = $request->file('cover_image');
            $data['cover_image'] = $filename = time() . '.' . $cover_image->getClientOriginalExtension();
            $cover_image->move(public_path().'/images/livestream/',$filename);
        }
        $livestream = new Livestream($data);
        if($livestream->save()){
            $notification = array(
                'message' => "Stream Added Successfully.",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
