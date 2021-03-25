<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 */
class Instagram extends Model
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
    protected $fillable = ['title', 'link', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%')
                ->orWhere('name', 'like', '%'.$query.'%');
    }
}
