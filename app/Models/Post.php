<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image'];

    /**
     * Get the image URL for this post
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    /**
     * Check if post has image
     */
    public function hasImage()
    {
        return !empty($this->image);
    }

    /**
     * Get image URL or default placeholder
     */
    public function getImageUrl($fallback = null)
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return $fallback ?? 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100"%3E%3Crect fill="%23e9ecef" width="100" height="100"/%3E%3Ctext x="50%" y="50%" text-anchor="middle" dy=".3em" fill="%236c757d" font-size="12" font-family="Arial"%3ENo Image%3C/text%3E%3C/svg%3E';
    }
}
