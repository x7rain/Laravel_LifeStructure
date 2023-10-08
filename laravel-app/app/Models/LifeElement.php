<?php

namespace App\Models;

use App\Interfaces\AspectInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LifeElement extends Model
{
    use HasFactory;

    const LIFE_ELEMENT_STANDART_WIDTH = '100px';

    const LIFE_ELEMENT_STANDART_HEIGHT = '100px';

    protected $fillable = [
        'life_id',
        'type',
        'title',
        'element_folder_id'
    ];

    public function child(): HasOne
    {
        return $this->type == 'folder' ? $this->folder() : $this->aspect();
    }

    public function folder(): HasOne
    {
        return $this->hasOne(ElementFolder::class);
    }

    public function aspect(): HasOne
    {
        return $this->hasOne(Aspect::class);
    }

    public function getWidth(): string
    {
        return self::LIFE_ELEMENT_STANDART_WIDTH;
    }

    public function getHeight(): string
    {
        return self::LIFE_ELEMENT_STANDART_HEIGHT;
    }

    public function getIcon(): string
    {
        if (!$this->iconImage) {
            if ($this->type == 'folder') {
                return ElementFolder::DEFAULT_ICON;
            } elseif ($this->type == 'aspect') {
                return AspectInterface::ASPECT_TYPES[$this->aspect->type]::DEFAULT_ICON;
            }
        }

        return $this->iconImage;
    }
}
