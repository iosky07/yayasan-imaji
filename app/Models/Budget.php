<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $project_id
 * @property integer $type_id
 * @property integer $status_id
 * @property string $title
 * @property string $money
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property ProjectBudget $projectBudget
 * @property StatusBudget $statusBudget
 * @property TypeBudget $typeBudget
 */
class Budget extends Model
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
    protected $fillable = ['project_id', 'type_id', 'status_id', 'title', 'money', 'file', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectBudget()
    {
        return $this->belongsTo('App\Models\ProjectBudget', 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusBudget()
    {
        return $this->belongsTo('App\Models\StatusBudget', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeBudget()
    {
        return $this->belongsTo('App\Models\TypeBudget', 'type_id');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%'.$query.'%');
    }
}
