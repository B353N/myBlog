<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'extension', 'path'];

    /**
     * Relation to Image
     *
     * @return morphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
