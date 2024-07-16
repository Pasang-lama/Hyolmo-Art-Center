<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;
use File, Image;

class VideoController extends Controller
{
    private $upload_path;
    private $width;
    private $height;

    public function __construct()
    {
        $this->upload_path = public_path("images/video/");
        $this->width = 1903;
        $this->height = 683;
        $this->middleware(["XssSanitizer"]);
    }

    public function index()
    {
        $title = "Video";
        $video = Video::firstOrFail();
        return view("backend.pages.video.index", compact("video","title"));
    }

    public function store(Request $request)
    {
        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }

        $request->validate(
            [
                "video_url" => "nullable|url",
                "video_fallbackimage" => "nullable|mimes:jpeg,png,jpg,gif",
            ],
            [
                "video_url.required" =>
                    "About us description is required",
                "video_fallbackimage.mimes" =>
                    "About us image must have image with extension jpeg,png,jpg,gif"
            ]
        );

        $video = Video::firstOrFail();
        $video->update($request->all());

        if ($request->hasFile("video_fallbackimage")) {
            File::delete($this->upload_path . $video->video_fallbackimage);
            $img_tmp = $request->file("video_fallbackimage");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp)->save(
                $this->upload_path . $filename
            );

            Image::make($img_tmp->getRealPath())
                ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            $video->video_fallbackimage = $filename;
        }

        $video->save();
        return redirect()
            ->back()
            ->with("success_msg", "Video updated Successfully");
    }
}
