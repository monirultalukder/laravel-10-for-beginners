<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvartarRequest;
use Illuminate\Support\Facades\Storage;

class AvartarController extends Controller
{

    public function update(UpdateAvartarRequest $request)
    {
        //return response()->redirectTo('/profile');
        //return response()->redirectTo('profile.edit');
        // return back()->with('message' , 'Avaratar is changed');

        // $path = $request->file('avartar')->store('avartars', 'public');

        $path = Storage::disk('public')->put('avartars', $request->file('avartar'));

        if($odlavartar = $request->user()->avartar) {
            Storage::disk('public')->delete($odlavartar);

        }
        auth()->user()->update(['avartar' => $path]);
        return redirect(route('profile.edit'))->with('message','Avartar has updated');
    }
}
