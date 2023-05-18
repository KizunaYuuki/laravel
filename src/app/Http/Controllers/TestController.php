<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
   public function index(Request $request) {
        echo "<br>Test Controller.";
        echo '<br>';

        // Usage of path method
        $path = $request->path();
        echo 'Path Method: '.$path;
        echo '<br>';
        
        // Usage of is method
        $pattern = $request->is('foo/*');
        echo 'is Method: '.$pattern;
        echo '<br>';
        
        // Usage of url method
        $url = $request->url();
        echo 'URL method: '.$url;
   }

    public function productStore(Request $request)
    {

        $description = $request->input('description');

        // Kiểm tra xem người dùng có upload file không
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            echo "File upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        // Retrieving Uploaded Files
        $file = $request->file('image');
        // echo $file;

        // dd($request);
        DB::insert('insert into users (description, imagePath) values (?, ?)', ["$description", "$storedPath"]);
        // return upload image
        // return;
    }

    public function login(Request $request): RedirectResponse
    {

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        dd($request);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
