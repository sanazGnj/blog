<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use App\File;
use App\Picture;


class ImageController extends Controller
{
   public function show()
   {
   	$sanaz = Picture::all();
	 return view('index',compact('sanaz'));
   }


   public function add()
   {
   	return view ("add");
   }

   public function save(Request $request)
   {


   			$sanazImage = $request->file('featured_image');

			$fileName = $sanazImage->getClientOriginalName();

			$locationAx = public_path('images/'.$fileName);

			Image::make($sanazImage)->resize(800,500)->save($locationAx);


			$val = new Picture;
			$val ->img=$fileName;
			$val->name=$request->name;
			$val->save();
			return back();

	}

	public function edit($id)
    {
    	$val=Picture::find($id);
    	return view('add',compact('val'));
    }

	public function update($id,Request $request)
	{
		//id fieldi ke mikhahim edit konim ra be hamrahe kolieye fieldhayash migirad
		$img=Picture::find($id);

		//check mikonad ke az samte user file uploader por shode ast ya na?
        if ($request->hasFile('featured_image')) {
            //add new photo
            //mohtavaye file upload shode az file uploader ra mirizad tooye image
            $image=$request->file('featured_image');
            //name file upload shode ra be vasileye method getClientOriginalName migirad va dar fileName mirizad
            $fileName=$image->getClientOriginalName();
            // 1 moteghayer baraye addres dehi misazad ke file ra dar an phisiki zakhire mikonad
            $location=public_path("images/{$fileName}");
            //file upload shode ra daraddrese tarif shode phisiki zakhire miknim 
            Image::make($image)->save($location);
            //1 motagheyr misazim va esme ghadimie file dar table ra mirizim dar an
            $oldFilename=$img->img;
            //field image dar table ra ba esme jadide file upload shode por mikonim
            $img->img=$fileName; 
            $img->name=$request->name;
            //file ghabli ke upload shode bood ra ba method unlink phisiki delete mikonim   
            unlink('images/' . $oldFilename);

        }
        $img->save();
        return back();
	}

	public function delete($id)
    {
    	$val=Picture::find($id);
    	$val->delete();
    	unlink('images/' .$val->img);
    	return back();
    }

}
