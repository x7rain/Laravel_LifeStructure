<?php

namespace App\Models;

use App\Interfaces\AspectInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect extends Model implements AspectInterface
{
    use HasFactory;

    protected $fillable = [
        'life_element_id',
        'type'
    ];

    public function element()
    {
        return $this->belongsTo(LifeElement::class, 'life_element_id');
    }
}
