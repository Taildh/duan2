<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DangkiController extends Controller
{
    public function addNew(){
        $model = new User();
        $users = User::all();
        $category_product= Category::where('category_type','=','0')->get();
        $category_post= Category::where('category_type','=','1')->get();
        return view('dangki',compact('category_product','category_post'));
    }
    public function saveAddnew(Request $request){
        $model = new User();
        $category_product= Category::where('category_type','=','0')->get();
        $category_post= Category::where('category_type','=','1')->get();
        $model->fill($request->all());
        $model->save();
        return view('dangnhap',compact('category_product','category_post','model'));
    }
    public function Login(){
        $category_product= Category::where('category_type','=','0')->get();
        $category_post= Category::where('category_type','=','1')->get();
        return view('dangnhap',compact('category_product','category_post'));
    }
    public function postLogin(Request $request){
        $category_product= Category::where('category_type','=','0')->get();
        $category_post= Category::where('category_type','=','1')->get();
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){

            return redirect(route('trangchu',compact('category_product','category_post')));
        }
        return redirect(route('trangchu',compact('category_product','category_post')))->with('errmsg', 'Sai thông tin tài khoản/mật khẩu');
    }

    public function Logout(){

        Auth::logout();
        return redirect(route('trangchu'));
    }
}