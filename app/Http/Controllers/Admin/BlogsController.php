<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Image,File,Str;

class BlogsController extends Controller
{
    private $upload_path;
    private $thumb_path;
    // private $width;
    // private $height;
    private $thumb_width;
    private $thumb_height;
    private $default_pagination;

    public function __construct(){
        $this->upload_path = public_path("images/blogs/");
        $this->thumb_path = public_path("images/blogs/thumb/");
        // $this->width = 856;
        // $this->height = 500;
        $this->thumb_width = 416;
        $this->thumb_height = 205;
        $this->default_pagination = 25;
        $this->middleware(["XssSanitizer"]);
    }

     public function index()
    {
        $title = "Blogs List";
        $blogs = Blogs::orderBy("created_at","DESC")->get();
        return view("backend.pages.blogs.index", compact("title","blogs"));
    }

    public function create()
    {
        $title = "Create Blog";
        return view("backend.pages.blogs.create", compact("title"));
    }

    public function store(Request $request)
    {
        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }

        if (!File::isDirectory($this->thumb_path)) {
            File::makeDirectory($this->thumb_path, 0777, true, true);
        }

        $request->validate(
            [
                "blog_title" => "required",
                "blog_image" => "mimes:jpeg,png,jpg,gif,svg",
                "blog_description" => "required",
                //"blog_status" => "required",
            ],
            [
                "blog_title.required" => "Blog title is required",
                "blog_image.required" => "Blog image is required",
                "blog_image.mimes" =>
                    "Blog image should have following extension:jpeg,png,jpg,gif,svg",
                "blog_description.required" => "Blog description is required",
                //"blog_status.required" => "Blog status is required",
            ]
        );

        $input = $request->all();

        if(isset($input['blog_status']))
            $input['blog_status'] = $input['blog_status'];
        else 
            $input['blog_status'] = 0;

        if ($request->hasFile("blog_image")) {
            $img_tmp = $request->file("blog_image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                // ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            Image::make($img_tmp->getRealPath())
                ->resize($this->thumb_width, $this->thumb_height)
                ->save($this->thumb_path . $filename);

            $input["blog_image"] = $filename;
        } else {
            $input["blog_image"] = "";
        }

        Blogs::create($input);
        return redirect()
            ->route("admin.blogs.index")
            ->with("success_msg", "Blog added successfully.");
    }

    public function edit($id)
    {
        $title = "Edit Blog";
        $blog = Blogs::findOrFail($id);
        return view("backend.pages.blogs.edit", compact("blog","title"));
    }

    public function update(Request $request, $id)
    {
        if (!File::isDirectory($this->upload_path)) {
            File::makeDirectory($this->upload_path, 0777, true, true);
        }

        if (!File::isDirectory($this->thumb_path)) {
            File::makeDirectory($this->thumb_path, 0777, true, true);
        }

        $request->validate(
            [
                "blog_title" => "required",
                "blog_image" => "mimes:jpeg,png,jpg,gif,svg",
                "blog_description" => "required",
                //"blog_status" => "required",
            ],
            [
                "blog_title.required" => "Blog title is required",
                "blog_image.mimes" =>
                    "Blog image should have following extension:jpeg,png,jpg,gif,svg",
                "blog_description.required" => "Blog description is required",
                //"blog_status.required" => "Blog status is required",
            ]
        );

        $input = $request->all();

        if(isset($input['blog_status']))
            $input['blog_status'] = $input['blog_status'];
        else 
            $input['blog_status'] = 0;

        $blogs = Blogs::findOrFail($id);

        if ($request->hasFile("blog_image")) {

            File::delete($this->upload_path.$blogs->blog_image);
            File::delete($this->thumb_path.$blogs->blog_image);

            $img_tmp = $request->file("blog_image");
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;

            Image::make($img_tmp->getRealPath())
                // ->resize($this->width, $this->height)
                ->save($this->upload_path . $filename);

            Image::make($img_tmp->getRealPath())
                ->resize($this->thumb_width, $this->thumb_height)
                ->save($this->thumb_path . $filename);

            $input["blog_image"] = $filename;

        }

        $blogs->update($input);
        return redirect()
            ->route("admin.blogs.index")
            ->with("success_msg", "Blog updated successfully.");
    }

    public function destroy($id)
    {
        $blogs = Blogs::findOrFail($id);

        File::delete($this->upload_path.$blogs->blog_image);
        File::delete($this->thumb_path.$blogs->blog_image);

        $blogs->delete();
        return redirect()
            ->back()
            ->with("success_msg", "Blog deleted successfully");
    }

}
