<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vote;
use App\Band;
use App\Click;

class APIWebController extends Controller
{
    public function vote(Request $request)
    {
        $vote = Vote::where('user_id', $request->user_id)->where('band_id', $request->band_id)->first();
        if($vote == null)
        {
            $data = $request->only('band_id', 'user_id');
            Vote::create($data);
        } else {
            return response()->json(["status"=>"ya"])->withCallback($request->input('callback'));
        }
        
        $count = Vote::where('band_id', $request->band_id)->count();
        return response()->json(["status"=>"success", 'count'=>$count])->withCallback($request->input('callback'));
    }
    public function click(Request $request)
    {
        $click = Click::create([
            'band_id'=>$request->band_id,
        ]);
        
        return response()->json(["status"=>"success"])->withCallback($request->input('callback'));
    }
    
    public function buscar(Request $request)
    {
        if($request->gender == "all")
        {
            $bands = Band::inRandomOrder()->get();
            foreach($bands as $band)
            {
                $short = implode(' ', array_slice(explode(' ', $band->description), 0, 30));
                $band['short'] = $short;
            }
        } else {
            $bands = Band::where('gender', $request->gender)->get();
            foreach($bands as $band)
            {
                $short = implode(' ', array_slice(explode(' ', $band->description), 0, 30));
                $band['short'] = $short;
            }
        }
        return response()->json(["status"=>"success", "bands"=>$bands, 'gender'=>$request->gender])->withCallback($request->input('callback'));
    }
    
    public function uploadImage(Request $request)
    {
        $band = Band::where('id', $request->band_id)->first();
        $data = $request->except('cover');
        $photo = $request->cover;
        $photoName = "sessions_" . time() .".".$photo->guessExtension();
//        $s3 = \Storage::disk('s3');
//        $filePath = $photo->store('files_user');
//        $s3->put($photoName, fopen($photo, 'r+'));
//        $s3->setVisibility($photoName, 'public');
//        $data['cover_url'] = $photoName;
        $band->update($data);
        return $band;
    }
    
    public function password(Request $request)
    {
        $password = bcrypt($request->password);
        return $password;
    }
    
    
}
