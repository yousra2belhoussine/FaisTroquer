<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'category_photo',
        'count',
        'parent_id',
        'type_id'
    ];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function offer(): HasMany
    {
        return $this->hasMany(Offer::class, 'subcategory_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
