<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $code
 * @property string $title
 * @property string $number
 * @property string $year
 * @property string $clickbait
 * @property string $determination_place
 * @property string $determination_date
 * @property string $invitation_date
 * @property string $effective_date
 * @property string $location
 * @property string $source
 * @property string $language
 * @property string $law_field
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 * @property User $user
 */
class Regulation extends Model
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
    protected $fillable = ['user_id', 'category_id', 'code', 'title', 'number', 'year', 'clickbait', 'determination_place', 'determination_date', 'invitation_date', 'effective_date', 'location', 'source', 'language', 'law_field', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }
}
