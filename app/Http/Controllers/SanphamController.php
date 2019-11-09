<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
class TrangchuController extends Controller
{
    public function index(Request $request){
        $category_product= Category::where('category_type','=','0')->get();
        $category_post= Category::where('category_type','=','1')->get();
        return view('home', compact('category_product','category_post'));
    }

    // Xóa
    // public function deletePost($id){
    //     $post= Category::find($id);
    //     $post->delete();
    //     return redirect(route('homehome'));
    // }
}