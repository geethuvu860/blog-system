<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class Blogcontroller extends Controller
{   
    //list the blog
    function bloglist()
    {   
        $blogs=Blog::all();
        return view('blog.list',compact('blogs'));
    }
    //store blog details
    public function blogstore(Request $request)
    {
    
    $title = $request->title;
    $content = $request->content;

    
    Blog::create([
        'title' => $title,
        'content' => $content
    ]);
    

    return response()->json([
        'status' => true,
        'message' => 'Blog added successfully',
        
        
    ]);
   
}
public function blogshow($id)
{
$blog = Blog::where('blog_id', $id)->firstOrFail();
 
return response()->json([
    'blog' => $blog
]);
}
}