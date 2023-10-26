<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBlog;
use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{


    public function home()
    {
        $blogs=Blog::all();
        return view('blog.allblogs',compact('blogs'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::all();

        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBlog $request)
    {




    try {

        $validated = $request->validated();


        $blog = new Blog();
        $blog->title =$request->title;
        $blog->content =$request->conten ;
        $blog->published_at	=$request->published_at;

        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.', $imageName)[0];
            $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/images/' . $fileExtention);

            Image::make($image)->resize(500,250)->save($location);


            $blog->image = $fileExtention;
        };

             $blog->save();

                    return response()->json([
                        'status' => true,

                    ]);

          } catch (\Exception $e) {
                 return redirect()->back()->with(['error' => $e->getMessage()]);
                    }

    //    ++++++++++++++++++++++++++++++
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

    }


    public function edit($id)
    {

        $blog=Blog::FindOrFail($id);

        return view('blog.edit',compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {


        try {

            // $validated = $request->validated();

            $blog =Blog::findorFail($request->id);

            $blog->title=$request->title;
            $blog->content=$request->content;

            if ($request->hasFile('image')) {

                // $destination = 'storage/app/public/images/'.$blog->image;
                // if($destination)
                //     {
                        Storage::disk('blog')->delete('images/'.$blog->image);
                    // }
                $image          = $request->file('image');
                $imageName      = $image->getClientOriginalName();
                $imageNewName   = explode('.', $imageName)[0];
                $fileExtention  = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
                $location       = storage_path('app/public/images/' . $fileExtention);

                Image::make($image)->resize(500,250)->save($location);


                $blog->image = $fileExtention;
            };


            $blog->save();

            return response()->json([
                'status' => true,
                'id' =>$request->id,


            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
                // ++++++++++++++++
                try {
                    $blog= Blog::findOrFail($request->id);

                   if($blog){

                   $blogimage= $blog->images;

                    if($blogimage) {

                    Storage::disk('blog')->delete('images/'.$blog->image);


                   }

                  blog::destroy($request->id);

                    return response()->json([
                        'status' => true,
                        'id' =>$request->id,

                    ]);

                  }

                }
                catch (\Exception $e) {
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }

                // +++++++++++++++++
    }
}
