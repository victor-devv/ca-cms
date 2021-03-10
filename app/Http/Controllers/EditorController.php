<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                // $imageName = time().'.'.$banner->extension();
                // $ban = $banner->move(public_path('images'), $imageName);
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

        session([
            'layout' => $layout,
            'currentTime' => $currentTime,
            'banners' => $pubbanners,
            'logos' => $publogos,
            'videos' => $pubvideos,
            'images' => $pubimages,
            'mycontent' => $mycontent,
            'rsscontent' => $rsscontent
        ]);

        if ($layout == 1) {
            return view('home', [
                'layout' => $layout,
                'currentTime' => $currentTime,
                'banners' => $pubbanners,
                'logos' => $publogos,
                'videos' => $pubvideos,
                'images' => $pubimages,
                'mycontent' => $mycontent,
                'rsscontent' => $rsscontent
            ]);
        } else if ($layout == 2) {
            return view('ltwo', [
                'layout' => $layout,
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

    public function download(Request $request)
    {
        // dd($request);
        $logos = session('logo');
        $banners = session('videos');
        $videos = session('videos');
        $images = session('images');
        $layout = session('layout');
        $mycontent = session('my_content');
        $rsscontent = session('rss_content');
        $currentTime = session('currentTime');

        // $view = View::make('home', [
        //     'currentTime' => $currentTime,
        //     'banners' => $pubbanners,
        //     'logos' => $publogos,
        //     'videos' => $pubvideos,
        //     'images' => $pubimages,
        //     'mycontent' => $mycontent,
        //     'rsscontent' => $rsscontent
        // ]);

        // $html = $view->render();
        if ($layout == 1) {
            $html = view('one', [
                'currentTime' => $currentTime,
                'banners' => $banners,
                'logos' => $logos,
                'videos' => $videos,
                'images' => $images,
                'mycontent' => $mycontent,
                'rsscontent' => $rsscontent
            ])->render();
        } else if ($layout == 2) {
            $html = view('ltwo', [
                'currentTime' => $currentTime,
                'banners' => $banners,
                'logos' => $logos,
                'videos' => $videos,
                'images' => $images,
                'mycontent' => $mycontent,
                'rsscontent' => $rsscontent
            ])->render();
        } else if ($layout == 3) {
            $html = view('lthree', [
                'currentTime' => $currentTime,
                'banners' => $banners,
                'logos' => $logos,
                'videos' => $videos,
                'images' => $images,
                'mycontent' => $mycontent,
                'rsscontent' => $rsscontent
            ])->render();
        }

        $html = view('home', [
            'currentTime' => $currentTime,
            'banners' => $banners,
            'logos' => $logos,
            'videos' => $videos,
            'images' => $images,
            'mycontent' => $mycontent,
            'rsscontent' => $rsscontent
        ])->render();

        $file = Storage::put('published.html', $html);

        return redirect('/form');
    }

}
