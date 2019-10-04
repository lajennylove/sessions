<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Band;
use  App\User;
use  App\Vote;
use  App\State;
use  App\Click;

use Excel;

class BandController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $bands = Band::where('name', 'LIKE', "%$keyword%")->orWhere('username', 'LIKE', "%$keyword%")
                ->paginate(20);
        } else {
            $bands = Band::paginate(20);
        }
        $total = Band::count();
        foreach($bands as $band)
        {
            $clicks = Click::where('band_id', $band->id)->count();
            $votes = Vote::where('band_id', $band->id)->count();
            $band['clicks'] = $clicks;
            $band['votes'] = $votes;
        }
        
        return view('admin.users.index', compact('bands', 'total'));
    }
    
    public function show($band_id)
    {
        $band = Band::where('id', $band_id)->first();
        $user = User::where('id', $band->user_id)->first();
        $band['email'] = $user->email;
        $clicks = Click::where('band_id', $band->id)->count();
        $votes = Vote::where('band_id', $band->id)->count();
        $band['clicks'] = $clicks;
        $band['votes'] = $votes;
        return view('admin.users.show', compact('band'));
    }
    
    public function download()
    {
        Excel::create('Historial de Bandas', function($excel)  {
            $excel->sheet('Usuarios', function($sheet){
               $bands = Band::all();
                foreach($bands as $band)
                {
                    $clicks = Click::where('band_id', $band->id)->count();
                    $votes = Vote::where('band_id', $band->id)->count();
                    $user = User::where('id', $band->user_id)->first();
                    $band['email'] = $user->email;
                    $band['clicks'] = $clicks;
                    $band['votes'] = $votes;
                }
                $sheet->loadView('excel.bandas', array('bands' => $bands ));
            });
//
        })->export('xls');
        
        return back();
    }
    
    public function edit($band_id)
    {
        $states = State::all();
        $band = Band::where('id', $band_id)->first();
        return view('admin.users.edit', compact('states', 'band'));
    }
    
    public function update(Request $request, $band_id)
    {
        $band = Band::where('id', $band_id)->first();
        $data = $request->all();
        $band->update($data);
        
        return redirect('admin/band/'.$band_id)->with('flash_message', 'Banda Actualizada!');
    }
    
    public function orederByVotes()
    {
        $bands = Vote::join('bands', 'votes.band_id', '=', 'bands.id')
                    ->select(\DB::raw('COUNT(band_id) as votes'), 'band_id', 'bands.*')
                    ->groupBy('band_id')
                    ->orderBy('votes', 'desc')
                    ->paginate(20);
        $total = Band::count();
        foreach($bands as $band)
        {
            $clicks = Click::where('band_id', $band->id)->count();
            $band['clicks'] = $clicks;
        }
        return view('admin.users.index', compact('bands', 'total'));
    }
    
    public function orederByClicks()
    {
        $bands = Click::join('bands', 'clicks.band_id', '=', 'bands.id')
                    ->select(\DB::raw('COUNT(band_id) as clicks'), 'band_id', 'bands.*')
                    ->groupBy('band_id')
                    ->orderBy('clicks', 'desc')
                    ->paginate(20);
        $total = Band::count();
        foreach($bands as $band)
        {
            $votes = Vote::where('band_id', $band->id)->count();
            $band['votes'] = $votes;
        }
        return view('admin.users.index', compact('bands', 'total'));
    }
    
    
    
}
