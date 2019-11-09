<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(Request $request){
        if(!$request->has('keyword') || empty($request->keyword) ){
            $products = Product::paginate(5);
        }else{
            $kw = $request->keyword;
            $products = Product::where('name', 'like', "%$kw%")
                            ->paginate(5);
            $products->withPath("?keyword=$kw");
        }
        return view('list-product', [
                        'sanpham' => $products
                    ]);
    }
    public function addNew(){
        $model = new Product();
        $products = Product::all();
        $cates = Category::all();
        return view('product.add-form',compact('model', 'products', 'cates'));
    }

    public function saveAddNew(ProductRequest $request){
        $model = new Product();
        if($request->hasFile('image')){
           
            $oriFileName = $request->image->getClientOriginalName();
            $filename = str_replace(' ', '-', $oriFileName);
            $filename = uniqid() . '-' . $filename;
            $path = $request->file('image')->storeAs('products', $filename);
            $model->image = '../images/'.$path;
        }
        $model->fill($request->all());
        //dd($model);
        $model->save();
        return redirect(route('home'));
    }

    public function editForm($id){
        $model = Product::find($id);
        if(!$model){
            return redirect()->route('home');
        }
        $products = Product::all();
        $cates = Category::all();
        return view('product.edit-form',compact('model', 'products', 'cates'));
    }
    public function saveEdit(ProductRequest $request){
        $model = Product::find($request->id);
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('products', 
            str_replace(' ', '-', uniqid() . '-' .$request->image->getClientOriginalName()));
            $model->image = '../images/'.$path;
        }
        if($request->status == null){
            $model->status = 0;
        }
        $model->fill($request->all());
        //dd($model);
        $model->save();
        return redirect(route('home'));
    }

    // Xóa
    public function deletePost($id){
        $post= Product::find($id);
        $post->delete();
        return redirect(route('home'));
    }
}