<?php

namespace App\Models;

use App\Enum\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Task extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast
     */
    protected $casts = [
        'status' => TaskStatus::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') // The column that will be used to generate the slug
            ->saveSlugsTo('slug'); // The column name to save the slug
    }

    /**
     * Get the user that owns the Task
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
