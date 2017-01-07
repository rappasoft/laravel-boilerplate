<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository.
 */
abstract class BaseRepository
{
    /**
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model)
    {
        $saved = $model->save();

        if ($saved) {
            app('cache')->flush();
        }

        return $saved;
    }

    /**
     * @param Model $model
     * @param array $input
     *
     * @return bool
     */
    public function update(Model $model, array $input)
    {
        $updated = $model->update($input);

        if ($updated) {
            app('cache')->flush();
        }

        return $updated;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function delete(Model $model)
    {
        $deleted = $model->delete();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function forceDelete(Model $model)
    {
        $deleted = $model->forceDelete();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function restore(Model $model)
    {
        $deleted = $model->restore();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @return mixed
     */
    protected function query()
    {
        return call_user_func(static::MODEL.'::query');
    }
}
