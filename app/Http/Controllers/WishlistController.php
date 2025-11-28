<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request, $spotId)
    {
        $user = Auth::user();
        $spot = Spot::findOrFail($spotId);

        // attach if not exists
        if (!$user->savedSpots()->where('spot_id', $spotId)->exists()) {
            $user->savedSpots()->attach($spotId);

            Activity::create([
                'user_id'=>$user->id,
                'type'=>'save_spot',
                'meta'=>['spot_id'=>$spotId,'spot_name'=>$spot->name]
            ]);

            return back()->with('success','Spot saved.');
        }

        return back()->with('info','Spot already saved.');
    }

    public function destroy(Request $request, $spotId)
    {
        $user = Auth::user();
        $spot = Spot::findOrFail($spotId);
        $user->savedSpots()->detach($spotId);

        Activity::create([
            'user_id'=>$user->id,
            'type'=>'unsave_spot',
            'meta'=>['spot_id'=>$spotId,'spot_name'=>$spot->name]
        ]);

        return back()->with('success','Removed from saved spots.');
    }
}
