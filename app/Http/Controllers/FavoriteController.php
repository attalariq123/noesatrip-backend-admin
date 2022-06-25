<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display the user favorite.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFavoriteDestination()
    {
        $user = User::find(auth()->user()->id);

        $fav = $user->favorite()->get();

        $dest = [];
        foreach ($fav as $f) {
            if ($f['isFavorite'] == 1) {
                array_push($dest, Destination::find($f['destination_id']));
            }
        }

        return $dest;
    }

    public function getFavoriteStatus(Request $r)
    {
        // $user = User::find(auth()->user()->id);
        $user = User::find($r->user_id);
        $fav = $user->favorite()->get();

        $data = [];
        foreach ($fav as $f) {
            $data[$f['destination_id']] = $f['isFavorite'] == 1 ? true : false ?? false;
        }

        if ($data != null) {
            return response()->json($data);
        } else {
            return response([
                "error" => "favorite data empty"
            ]);
        }
    }

    /**
     * change status favorite.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        $user = User::find($r->user_id);
        $fav = Favorite::where('destination_id', $r->destination_id)->where('user_id', $r->user_id)->get();

        if ($fav->isEmpty()) {

            $newFav = Favorite::create([
                'user_id' => $r->user_id,
                'destination_id' => $r->destination_id,
                'isFavorite' => true,
            ]);

            return $newFav;
        } else {

            Favorite::where('destination_id', $r->destination_id)->where('user_id', $r->user_id)->update([
                'isFavorite' => $r->isFavorite,
            ]);

            return [
                'message' => 'update status success'
            ];
        }

        $response = ['message' => 'Could not update status'];


        return response($response, 401);
    }
}
