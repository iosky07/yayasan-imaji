<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $money
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class Spj extends Model
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
    protected $fillable = ['user_id','status','title', 'money', 'file', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }public function status()
{
    return $this->belongsTo('App\Models\Status');
}    public function user()
{
    return $this->belongsTo('App\Models\User');
}
}
