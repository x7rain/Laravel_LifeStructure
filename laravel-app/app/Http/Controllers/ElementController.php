<?php

namespace App\Http\Controllers;

use App\Models\Aspect;
use App\Models\ElementFolder;
use App\Models\Life;
use Illuminate\Support\Facades\Auth;
use App\Models\LifeElement;

class ElementController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => [],
            'folderId' => []
        ]);

        $user = auth()->user();
        $lifeId = $user->current_life;

        $lifeElement = LifeElement::create([
            'life_id' => $lifeId,
            'type' => $data['type'],
            'title' => $data['title'],
            'element_folder_id' => $folderId = session('folderId')
        ]);

        if ($data['type'] == 'folder') {
            ElementFolder::create([
                'life_element_id' => $lifeElement->id,
                //todo: add background image
            ]);
        }
        if ($data['type'] == 'aspect') {
            Aspect::create([
                'life_element_id' => $lifeElement->id,
                'type' => 'notes' //todo: should be optional from request
            ]);
        }

        return redirect()->route('life', ['lifeId'=> $lifeId, 'folderId' => $folderId]);
    }
}
