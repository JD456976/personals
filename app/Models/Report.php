<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $reportable_type
 * @property int $reportable_id
 * @property string $reason
 * @property string $comment
 * @property bool $is_resolved
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'reportable_type',
        'reportable_id',
        'reason',
        'comment',
        'is_resolved',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'is_resolved' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function reportable()
    {
        return $this->morphTo();
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }

    public static function reported(Post $post)
    {
        return Report::where('reportable_id', $post->id)->count();
    }
}
