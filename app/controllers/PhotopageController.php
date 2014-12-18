<?php

class PhotopageController extends BaseController
{
    public function showMain()
    {
        $pictures = Picture::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return View::make('photopage.index', array('pictures' => $pictures));
    }
}
