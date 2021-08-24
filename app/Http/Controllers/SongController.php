<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $draw = $request->draw;
        $order = $request->order;
        $start = $request->start;
        $length = $request->length;
        $search = $request->search;

        $columns = [
            0 => "id",
            1 => "title",
            2 => "artist",
            3 => "created_at"
        ];

        $data= [];
        $query = DB::table('songs');
        $songs = "";

        if($search["value"] != NULL) {
            $query = $query->where('title', 'like'. '%'.$search["value"].'%')
                ->orWhere('artist', 'like', '%' . $search["value"] .'%');
        }
        
        $count = $query->count();

        $songs = $query->select('id','title','artist','created_at')
            ->offset($start)
            ->limit($length)
            ->orderBy($columns[$order[0]['column']], $order[0]['dir'])
            ->get();

        foreach($songs as $song) {
            $tmpSong = [];
            $tmpSong['id'] = $song->id;
            $tmpSong['title']= $song->title;
            $tmpSong['artist'] = $song->artist;
            $tmpSong['created_at'] = $song->created_at;
            $tmpSong['action'] = '
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-danger btn-sm" onClick="deleteSong('.$song->id.')"><i class="fas fa-trash"></i></button>                    
                    </div>
                    
                </div>
            ';

            $data[] = $tmpSong;
        }

        $datatableResponse = [
            "draw" => $draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data
        ]; 

        return response()->json($datatableResponse);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $song = new Song;
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->lyrics = $request->lyrics;
        $song->added_by_id = $id;
        $resp = $song->save();
        
        $response = "";
        if($resp == 1) {
            $response = "OK";
        }

        return $response;
    }

    public function show($id)
    {
        $song = DB::table('songs')->find($id);
        
        return response()->json($song);
    }

    public function update($id, Request $request)
    {
        $toUpdate = $request->all();

        DB::table('songs')
            ->where('id', $id)
            ->update($toUpdate);

        return 'DONE';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return String
     */
    public function destroy($id)
    {
        DB::table('songs')->where('id', $id)->delete();

        return 'DONE';
    }
}
