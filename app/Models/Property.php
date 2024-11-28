<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Usamamuneerchaudhary\Commentify\Traits\Commentable;


class Property extends Model
{
    use HasFactory;
    // use Commentable;

    protected $fillable = [
        'titre',
        'auteur',
        'contenu',
        'photo'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
}
