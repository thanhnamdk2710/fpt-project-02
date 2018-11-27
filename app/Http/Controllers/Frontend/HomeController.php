<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Slider;
use App\Product;
use App\Feedback;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->inRandomOrder()->limit(16)->get();
        $banners = Category::where('status', 1)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('status', 1)->get();
        $sliders = Slider::where('status', 1)->inRandomOrder()->get();

        return view('frontend.home', [
            'categories' => $categories,
            'banners' => $banners,
            'sliders' => $sliders,
            'products' => $products
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $products = Product::where('status', 1)->where('id', '<>', $id)->inRandomOrder()->limit(8)->get();

        return view('frontend.product', [
            'product' => $product,
            'products' => $products
        ]);
    }

    public function shop()
    {
        $products = Product::where('status', 1)->inRandomOrder()->limit(16)->get();
        $categories = Category::where('status', 1)->get();

        return view('frontend.shop', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function feedback(Request $request)
    {
        $data = $request->only('email', 'content');
        $request->validate([
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $feedback = new Feedback;
        $feedback->email = $data['email'];
        $feedback->content = $data['content'];
        $feedback->save();

        return redirect()->back()->with('success', 'Send Feedback Successfully!');
    }

    public function login(Request $request)
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }

        if($request->isMethod('post'))
        {
            $credentials = $request->only('email', 'password');

            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $email = $credentials['email'];
            $password = bcrypt($credentials['password']);

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1]))
            {
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', 'Account is wrong!');
            }
        }

        return view('frontend.login');
    }

    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

            $user = new User;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = 2;
            $user->save();
            $user->profile()->create(['name' => $request->name]);

            return redirect()->back()->with('success', 'Register Successfully');
        }

        return view('frontend.register');
    }

    public function profile(Request $request)
    {
        $data = $request->only('avatar', 'phone', 'name', 'address');

        $user = Auth::user();

        if($image = $request->file('avatar'))
        {
            if($user->profile->avatar){
                if(file_exists('images/users/' . $user->profile->avatar))
                {
                    unlink('images/users/' . $user->profile->avatar);
                }
            }

            $extension = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $extension;
            $image->move('images/users/', $imageName);
            $data['avatar'] = $imageName;
        }

        // $profile = new

        $user->profile()->update($data);

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
