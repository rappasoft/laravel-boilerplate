<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Example;

use App\Domains\Auth\Models\Example;
use App\Domains\Auth\Services\ExampleService;

/**
 * Class DeletedExampleController.
 */
class DeletedExampleController
{
    /**
     * @var ExampleService
     */
    protected $exampleService;

    /**
     * DeletedExampleController constructor.
     *
     * @param ExampleService $exampleService
     */
    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.example.deleted');
    }

    /**
     * @param Example $deletedExample
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Example $deletedExample)
    {
        $this->exampleService->restore($deletedExample);

        return redirect()->route('admin.auth.example.index')->withFlashSuccess(__('The example was successfully restored.'));
    }

    /**
     * @param Example $deletedExample
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Example $deletedExample)
    {
        $this->exampleService->destroy($deletedExample);

        return redirect()->route('admin.auth.example.deleted')->withFlashSuccess(__('The example was permanently deleted.'));
    }
}
