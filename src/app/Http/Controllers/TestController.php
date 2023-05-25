<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use Illuminate\View\View;


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

        $urlAction = action([TestController::class, 'index'], ['id' => 1]);
        echo $urlAction;
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
        // dd($request->all());

        DB::insert('insert into image (description, imagePath) values (?, ?)', ["$description", "$storedPath"]);
        // return upload image
        // return;
    }

    // not complete
    public function login(Request $request)
    {

        $credentials = [
            "email" => $request->input('email'),
            "password" => $request->input('password'),
        ];
        // dd(bcrypt($request->password));
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/dfsdfdsf');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('login');
    }

    public function formvalidate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 
            Rule::in(['admin', 'user'])
        ],
            'email' => 'required',
            'password' => 'required_if:name,admin',
            'randomnumber' => 'numeric|min:18',

            // image validation
            'image' => 'dimensions:min_width=10000,min_height=200',
            // 'birthdate' => 'before:' . now()->toDateString(),
            // 'birthdate' => 'before:today',

        ]);

        // ?
        // Validator::make($data, [
        //     'image' => [
        //         'required',
        //         Rule::dimensions()->maxWidth(1000)->maxHeight(500)->ratio(3 / 2),
        //     ],
        // ]);
    
        // The blog post is valid...
    
        return to_route('/');
    }

    public function testDataBase(): View
    {
        $users = DB::select('select * from users where active = ?', [1]);
 
        return view('user.index', ['users' => $users]);
    }
}
