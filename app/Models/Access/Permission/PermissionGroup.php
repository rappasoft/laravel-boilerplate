<?php namespace App\Models\Access\Permission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Access\Permission\Traits\Attribute\PermissionGroupAttribute;
use App\Models\Access\Permission\Traits\Relationship\PermissionGroupRelationship;

/**
 * Class PermissionGroup
 * @package App\Models\Access\Permission
 */
class PermissionGroup extends Model {

    use PermissionGroupRelationship, PermissionGroupAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     *
     */
    public function __construct()
    {
        $this->table = config('access.permission_group_table');
    }
}