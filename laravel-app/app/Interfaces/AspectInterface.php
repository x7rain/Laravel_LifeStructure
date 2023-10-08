<?php

namespace App\Interfaces;

use App\Models\Aspects\NotesAspect;

interface AspectInterface
{
    const ASPECT_TYPES = [
        NotesAspect::TYPE => NotesAspect::class
    ];
}
