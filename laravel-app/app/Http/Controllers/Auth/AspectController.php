<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ElementFolder;
use App\Models\Life;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class AspectController extends Controller
{
    public function index($lifeId = null, $folderId = null)
    {
        $user = Auth::user();
        $lifeId = $lifeId ?? $user->current_life;
        $life = Life::find($lifeId);


        if (!$life || !$life->isValidForCurrentUser()) {
            $lifeId = $user->current_life ?? $user->lives->first()->id;
            return redirect()->route('life', ['lifeId' => $lifeId]);
        }
        $lifeIds = Life::getIdNamePairsByUser($user->id);
        $user->current_life = $lifeId;
        $user->save();
        $life->folderId = $folderId;
        $life->currentBackgroundImage = $folderId
            ? ElementFolder::find($folderId)->background_image
            : $life->background_image;
        session(['lifeId' => $lifeId, 'folderId' => $folderId]);

        return view("life", ['life' => $life, 'lifeIds' => $lifeIds]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'background_image' => [File::image()->max(10000)],
        ]);

        $user = auth()->user();
        $title = $data['title'];
        $image = request('background_image');

        $life = Life::create([
            'user_id' => $user->id,
            'title' => $title
        ]);

        if ($image) {
            $life->addNewBackgroundImage($image);
        }

        return redirect()->route('life', ['lifeId' => $life->id]);
    }
}
