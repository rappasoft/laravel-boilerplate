<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\Example\ExampleCreated;
use App\Domains\Auth\Events\Example\ExampleDeleted;
use App\Domains\Auth\Events\Example\ExampleDestroyed;
use App\Domains\Auth\Events\Example\ExampleRestored;
use App\Domains\Auth\Events\Example\ExampleUpdated;
use App\Domains\Auth\Models\Example;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ExampleService.
 */
class ExampleService extends BaseService
{
    /**
     * ExampleService constructor.
     *
     * @param  Example  $example
     */
    public function __construct(Example $example)
    {
        $this->model = $example;
    }

    /**
     * @param  bool|int  $perPage
     * @return mixed
     */
    public function get($perPage = false)
    {
        if (is_numeric($perPage)) {
            return $this->model::paginate($perPage);
        }

        return $this->model::get();

    }
    /**
     * @param  array  $data
     * @return Example
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Example
    {
        DB::beginTransaction();

        try {
            $example = $this->createExample([
                'name' => $data['name'],
                'active' => isset($data['active']) && $data['active'] === '1',
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this example. Please try again.'));
        }

        event(new ExampleCreated($example));

        DB::commit();

        return $example;
    }

    /**
     * @param  Example  $example
     * @param  array  $data
     * @return Example
     *
     * @throws \Throwable
     */
    public function update(Example $example, array $data = []): Example
    {
        DB::beginTransaction();

        try {
            $example->update([
                'name' => $data['name'],
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this example. Please try again.'));
        }

        event(new ExampleUpdated($example));

        DB::commit();

        return $example;
    }

    /**
     * @param  Example  $example
     * @return Example
     *
     * @throws GeneralException
     */
    public function delete(Example $example): Example
    {
        if ($this->deleteById($example->id)) {
            event(new ExampleDeleted($example));

            return $example;
        }

        throw new GeneralException('There was a problem deleting this example. Please try again.');
    }

    /**
     * @param  Example  $example
     * @return Example
     *
     * @throws GeneralException
     */
    public function restore(Example $example): Example
    {
        if ($example->restore()) {
            event(new ExampleRestored($example));

            return $example;
        }

        throw new GeneralException(__('There was a problem restoring this example. Please try again.'));
    }

    /**
     * @param  Example  $example
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Example $example): bool
    {
        if ($example->forceDelete()) {
            event(new ExampleDestroyed($example));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this example. Please try again.'));
    }

    /**
     * @param  array  $data
     * @return Example
     */
    protected function createExample(array $data = []): Example
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'active' => $data['active'] ?? true,
        ]);
    }
}
