<?php

class PictureController extends BaseController
{
    public function postUpload()
    {
        $input = Input::all();
        
        $input['description'] = filter_var($input['description'], FILTER_SANITIZE_STRING);
        
        $rules = array(
		'picture' => 'required|image|max:2000',
        'description' => 'required'
        );

        $valid = Validator::make($input, $rules);

        if ($valid->fails())
        {
            return Redirect::to('photopage')->withErrors($valid);
        }

        $picture = Input::file('picture');

        $extension = $picture->getClientOriginalExtension();        

        $directory = public_path().'/pictures/'.sha1(Auth::user()->id);
            
        $filename = sha1(Auth::user()->id.time()).".{$extension}";
 
        $upload_success = Input::hasFile('picture');
         
        if( $upload_success ) {
            
            if (!File::exists($directory))
            {
                File::makeDirectory($directory, 0775);
            }
            
            Input::file('picture')->move($directory, $filename);
            $picture = new Picture;
            $picture->location = '/pictures/'.sha1(Auth::user()->id).'/'.$filename;
            $picture->description = $input['description'];
            $picture->user_id = Auth::user()->id;
            $picture->save();
        }
         
        return Redirect::to('photopage');
    }
    
    public function deletePicture($id)
    {
        $picture = Picture::find($id);
        $picture->delete();
        
        return Redirect::to('photopage')->with('success', 'Picture deleted');
    }
}
