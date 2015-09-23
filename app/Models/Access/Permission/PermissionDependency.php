<?php namespace App\Models\Access\Permission;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionDependency
 * @package App
 */
class PermissionDependency extends Model {
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
        $this->table = config('access.permission_dependencies_table');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permission() {
        return $this->hasOne(Permission::class, 'id', 'dependency_id');
    }
}