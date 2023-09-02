<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts/index');
    }

    public function update(StoreProfileRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('image')) {
            $path = Storage::putFile('avatars', $request->file('image'));
            auth()->user()->update(['thumbnail' => $path]);
        }

        auth()->user()->update([
            'name' => $validated['name'],
        ]);
        Session::flash('message', "Ton profil a bien été mis à jour !");
        return redirect(route('accounts.index'));
    }
}
