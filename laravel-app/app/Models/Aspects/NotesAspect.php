<?php

namespace App\Models\Aspects;

use App\Models\Aspect;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotesAspect extends Aspect
{
    use HasFactory;

    const TYPE = 'notes';

    const DEFAULT_ICON = "/storage/images/icons/aspects/notes/default.png";
}
