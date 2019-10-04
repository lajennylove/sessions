<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Band;
use App\Vote;
use App\State;
use App\Profile;




class PageController extends Controller
{
    public function login()
    {
        $states = State::all();
        return view('login', compact('states'));
    }
    public function index()
    {
        return view('index');
    }
    
    public function bandas()
    {
        $bands_last = Band::orderBy('id', 'desc')->take(3)->get();
        $bands = Band::inRandomOrder()->paginate(32);
        $find = null;
        foreach($bands as $band)
        {
            $short = implode(' ', array_slice(explode(' ', $band->description), 0, 30));
            $band['short'] = $short;
        }
        return view('bandas', compact('bands_last', 'bands', 'find'));
    }
    
    public function findBandas(Request $request)
    {
        $bands_last = Band::orderBy('id', 'desc')->take(3)->get();
        $bands = Band::where('name', 'like', '%'.$request->find.'%')->orWhere('username', 'like', '%'.$request->find.'%')->paginate(32);
        $find = $request->find;
        foreach($bands as $band)
        {
            $short = implode(' ', array_slice(explode(' ', $band->description), 0, 30));
            $band['short'] = $short;
        }
        return view('bandas', compact('bands_last', 'bands', 'find'));
    }
    
    
    
    public function generos($gender)
    {
        if($gender == "all")
        {
            $bands = Band::inRandomOrder()->paginate(32);
        } else {
            $bands = Band::where('gender', $gender)->inRandomOrder()->paginate(32);
        }
        foreach($bands as $band)
        {
            $short = implode(' ', array_slice(explode(' ', $band->description), 0, 30));
            $band['short'] = $short;
        }
        return view('generos', compact('bands', 'gender'));
    }
    
    
    
    public function band($username)
    {
        $band = Band::where('username', $username)->first();
        $array_youtube = explode('/', $band->youtube);
        $size_youtube = sizeof($array_youtube) -1;
        if(sizeof($array_youtube) <= 1)
        {
            $band['youtube'] = "https://www.youtube.com/user/".$array_youtube[$size_youtube];
            $band['short'] = $array_youtube[$size_youtube];
        } else {
            $band['short'] = $array_youtube[$size_youtube];
        }
//        dd($band);
        $votes = Vote::where('band_id', $band->id)->count();
        $bands_one = Band::whereNotIn('id', [$band->id])->inRandomOrder()->take(2)->get();
        $bands_ids = array_map(function($item){return $item['id']; }, $bands_one->toArray());
        $bands_two = Band::whereNotIn('id', [$band->id])->whereNotIn('id', $bands_ids)->inRandomOrder()->take(2)->get();
        $user = \Auth::user();
        if($user != null)
        {
            $vote = Vote::where('band_id', $band->id)->where('user_id', $user->id)->first();
            if($vote != null)
            {
                $exist = "yes";
            } else {
                $exist = "no";
            }
        }else{
            $exist = "no";
        }
        return view('band', compact('band', 'votes', 'bands_one', 'user', 'bands_two', 'exist'));
    }
    
    public function profileBand()
    {
        $user_id = \Auth::id();
        $user = User::where('id', $user_id)->first();
        $band = Band::where('user_id', $user->id)->first();
        $cont = Vote::where('band_id', $band->id)->count();
        return view('profile_band', compact('user', 'band', 'cont'));
        
    }
    
    public function register(Request $request)
    {
        $messages = [
            'required'=>'Este campo es obligatorio',
            'email'=>"Debe ser un correo valido",
            'unique'=>"Lo sentimos este :attribute ya existe, intenta con otro",
            'numeric'=>"El id de tu album debe ser un numero, checalo bien",
            'url'=>"El link no es valido",
            'profanity'=>"No puede contener groserias",
            "accepted" => "Debes aceptar este campo"
        ];
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:bands,username',
            'cover'=>'required',
            'password'=>'required',
            'youtube_url'=>'required|url',
            'name'=>'required',
            'gender'=>'required',
            'ciudad'=>'required',
            'description'=>'required',
            'facebook'=>'required',
            'youtube'=>'required',
            'bandcamp'=>'required|numeric',
            'accept'=>'accepted',
            'review'=>'accepted',
            
        ], $messages);
//        $array_link = explode("/embed/", $request->youtube_url);
//        if(sizeof($array_link) <= 1)
//        {
//            $messages = ["accepted" => "El link del video no es valido"];
//            $this->validate($request, [
//                'youtube_url' => 'accepted',
//            ], $messages);
//        }
        
        $data_user = $request->only('email');
        $password = bcrypt($request->password);
        $data_user['password'] = $password;
        $data_user['role'] = "band";
        $user = User::create($data_user);
        
        $data = $request->except('email', 'password', 'cover', 'name', 'description', 'facebook', 'youtube_url');
        $data['user_id'] = $user->id;
        $description = app('profanityFilter')->filter($request->description);
        $name = app('profanityFilter')->filter($request->name);
        $array_facebook = explode('/', $request->facebook);
        $size_facebook = sizeof($array_facebook) -1;
        $data['facebook'] = $array_facebook[$size_facebook];
        
        $array_youtube_url = explode('/', $request->youtube_url);
        $position_youtube_url = sizeof($array_youtube_url) -1;
        $data['youtube_url'] = "https://www.youtube.com/embed/".$array_youtube_url[$position_youtube_url];
        
        $data['name'] = $name;
        $data['description'] = $description;
        $band = Band::create($data);
//        $photo = $request->cover;
//        $photoName = "sessions_" . time() .".".$photo->guessExtension();
//        $s3 = \Storage::disk('s3');
//        $filePath = $photo->store('files_user');
//        $s3->put($photoName, fopen($photo, 'r+'));
//        $s3->setVisibility($photoName, 'public');
        $file = $request->file("cover");
        $photoName = "sessions_".time() . "." . $request->file('cover')->guessExtension();
//            $photoName = $file->getClientOriginalName();
        $file->move('bandas/', $photoName);
        $band->cover_url = $photoName;
        $band->update();
        \Auth::login($user);
        $redirect = url("/band/".$band->username);
        return redirect($redirect);
    }
    
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
    public function bases()
    {
        return view('bases');
    }
    
    public function loginView()
    {
        return view('log');
    }
    
    public function registerView()
    {
        return view('register_user');
    }
    
    public function registerUser(Request $request)
    {
        $messages = [
            'required'=>'Este campo es obligatorio',
            'email'=>"Debe ser un correo valido",
            'unique'=>"Lo sentimos este :attribute ya existe, intenta con otro",
            'numeric'=>"El id de tu album debe ser un numero, checalo bien",
            'url'=>"Recuerda solo debes meter el link que te da Youtube en incorporar",
            "accepted" => "Debes aceptar los términos y condiciones"
        ];
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password'=>'required',
            'name'=>'required',
        ], $messages);
        
        
        $data_profile = $request->only('name');
        $data_user = $request->only('email');
        
        $password = bcrypt($request->password);
        $data_user['password'] = $password;
        $data_user['role'] = "user";
        $user = User::create($data_user);
        $data_profile['user_id'] = $user->id;
        $profile = Profile::create($data_profile);
        \Auth::login($user);
        return redirect('/profile_user');
    }
    
    public function profileView()
    {
        $user = User::where('role', 'band')->first();
        $band = Band::where('user_id', $user->id)->first();
        $cont = Vote::where('band_id', $band->id)->count();
        return view('profile_band', compact('user', 'band', 'cont'));
    }
    
    public function profileUser()
    {
        $user_id = \Auth::id();
        $user = User::where('id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        return view('profile_user', compact('user', 'profile'));
    }
    
    public function profileuserexample()
    {
        $user= User::where('role', 'user')->first();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('profile_user', compact('user', 'profile'));
    }
    
    
    
    public function loginPost(Request $request)
    {
        $messages = [
            'required' => 'Este campo :attribute es obligatorio',
        ];
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], $messages);
        $user = User::where('email', $request->email)->first();
        if($user == null)
        {
            return back()->withErrors(['password', 'El usuario o la contraseña no coinciden']);
        }
        if (Hash::check($request->password, $user->password)) 
        {} else {
            return back()->withErrors(['password', 'El usuario o la contraseña no coinciden']);
        }
        \Auth::login($user);
        if($user->role == "band")
        {
            $user_id = \Auth::id();
            $user = User::where('id', $user_id)->first();
            $band = Band::where('user_id', $user->id)->first();
            $cont = Vote::where('band_id', $band->id)->count();
            return view('profile_band', compact('user', 'band', 'cont'));
        } else if($user->role == "user") {
            $user_id = \Auth::id();
            $user = User::where('id', $user_id)->first();
            $profile = Profile::where('user_id', $user_id)->first();
            return view('profile_user', compact('user', 'profile')); 
        } else if($user->role == "admin"){
            return redirect('admin');
        }
        return redirect('bandas');
    }
    
    public function comoparticipar()
    {
        return view('comoparticipar');
    }
    
    public function edit($username)
    {
        $states = State::all();
        $user_id = \Auth::id();
        $band = Band::where('user_id', $user_id)->first();
        return view('edit', compact('band', 'states'));
    }
    
    public function update(Request $request, $username)
    {
        $user_id = \Auth::id();
        $band = Band::where('user_id', $user_id)->first();
        $data= $request->except('name', 'description');
        $description = app('profanityFilter')->filter($request->description);
        $name = app('profanityFilter')->filter($request->name);
        $data['name'] = $name;
        $data['description'] = $description;
        $band->update($data);
        return redirect('profile_band');
    }
    
}
