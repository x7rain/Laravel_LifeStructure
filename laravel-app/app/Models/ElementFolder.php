<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementFolder extends Model
{
    use HasFactory;

    const DEFAULT_ICON = "/storage/images/icons/folder/default.png";

    protected $fillable = [
        'life_element_id',
    ];

    public function element()
    {
        return $this->belongsTo(LifeElement::class, 'life_element_id');
    }

    public function elements()
    {
        return $this->hasMany(LifeElement::class);
    }


}
