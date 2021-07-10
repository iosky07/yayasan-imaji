<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_id
 * @property string $title
 * @property string $contents
 * @property integer $view
 * @property string $slug
 * @property string $thumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property ContentType $contentType
 * @property User $user
 * @property ContentTag[] $contentTags
 */
class Content extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['status','user_id', 'type_id', 'title', 'contents', 'view', 'slug', 'thumbnail', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contentType()
    {
        return $this->belongsTo('App\Models\ContentType', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contentTags()
    {
        return $this->hasMany('App\Models\ContentTag');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
