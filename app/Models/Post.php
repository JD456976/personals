<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Post extends Model implements HasMedia, Viewable
{
    use HasFactory, InteractsWithMedia, HasUploader, InteractsWithViews;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public static function filteredPosts($query)
    {
        return Post::where('cat_id', $query)->get();
    }

    public function scopePostcount($query, $id)
    {
        $query->where('user_id',$id)->count();
    }
}
