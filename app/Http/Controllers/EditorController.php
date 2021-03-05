<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form editor.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function form()
    {

        return view('form');
    }

    public function publish(Request $request)
    {
        // dd($request);
        // ->store('banners')

        $pubbanners = [];
        $publogos = [];
        $pubvideos = [];
        $pubimages = [];

        if ($request->has('banners')) {
            $banners = $request->banners;

            foreach($banners as $banner) {
                $ban = $banner->store('banners');
                array_push($pubbanners,$ban);
            }    
        }

        if ($request->has('logos')) {
            $logos = $request->logos;

            foreach($logos as $logo) {
                $log = $logo->store('logos');
                array_push($publogos,$log);
            }    
        }

        if ($request->has('videos')) {
            $videos = $request->videos;

            foreach($videos as $video) {
                $vid = $video->store('videos');
                array_push($pubvideos,$vid);
            }    
        }

        if ($request->has('images')) {
            $images = $request->images;
            foreach($images as $image) {
                $img = $image->store('images');
                array_push($pubimages,$img);
            }    
        }

        $layout = $request->layout;
        $mycontent = $request->my_content;
        $rsscontent = $request->rss_content;

        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();

        return view('home', [
            'currentTime' => $currentTime,
            'banners' => $pubbanners,
            'logos' => $publogos,
            'videos' => $pubvideos,
            'images' => $pubimages,
            'mycontent' => $mycontent,
            'rsscontent' => $rsscontent
        ]);

    }

}
