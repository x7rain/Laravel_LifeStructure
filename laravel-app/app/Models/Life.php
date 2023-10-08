<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class Life extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'background_image',
        'title',
        'sort_order',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function elements()
    {
        return $this->hasMany(LifeElement::class);
    }

    public static function getIdNamePairsByUser(int $userId): array
    {
        $user = User::find($userId);
        $lives = $user->lives;
        $Ids = [];
        foreach ($lives as $life) {
            $Ids[$life->id] = $life->title;
        }
        return $Ids;
    }

    public function isValidForCurrentUser(): bool
    {
        $user = Auth::user();

        return $user->lives->contains($this);
    }

    public function addNewBackgroundImage(UploadedFile $image): void
    {
        $userId = $this->user->id;
        $path ="/images/users/$userId/lives/$this->id";
        $url = '/storage/' . $image->store($path, 'public');
        $this->background_image = $url;
        $this->save();
    }
}
