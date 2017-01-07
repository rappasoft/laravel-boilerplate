<?php

namespace App\Models\History;

use App\Models\History\Traits\Relationship\HistoryRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 * package App.
 */
class History extends Model
{
    use HistoryRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_id', 'user_id', 'entity_id', 'icon', 'class', 'text', 'assets'];
}
