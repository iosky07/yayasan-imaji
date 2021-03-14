<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $money
 * @property string $pic_internal
 * @property string $pic_external
 * @property string $note
 * @property string $publish_date
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property TypeFinance $typeFinance
 */
class Finance extends Model
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
    protected $fillable = ['type_id', 'title', 'money', 'pic_internal', 'pic_external', 'note', 'publish_date', 'file', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeFinance()
    {
        return $this->belongsTo('App\Models\TypeFinance', 'type_id');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }
}
