<?php

namespace App\Models;

use App\Traits\HasDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @method static inRandomOrder()
 */
class Post extends Model
{
    use HasFactory, HasDate;

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'category_id',
    ];

    /**
     * Relation to Author of post
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    /**
     * Relation to Category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class, foreignKey: 'category_id');
    }

    /**
     * Relation to Tags
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(related: Tag::class, table: 'post_tag', foreignPivotKey: 'post_id', relatedPivotKey: 'tag_id');
    }

    /**
     * Relation to Comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(related: Comment::class, foreignKey: 'commentable_id');
    }

    /**
     * Relation to Images
     *
     * @return morphOne
     */
    public function image(): morphOne
    {
        return $this->morphOne(related: Image::class, name: 'imageable');
    }
}
