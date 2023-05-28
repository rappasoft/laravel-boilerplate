<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Example;

use App\Domains\Auth\Http\Requests\Backend\Example\DeleteExampleRequest;
use App\Domains\Auth\Http\Requests\Backend\Example\EditExampleRequest;
use App\Domains\Auth\Http\Requests\Backend\Example\StoreExampleRequest;
use App\Domains\Auth\Http\Requests\Backend\Example\UpdateExampleRequest;
use App\Domains\Auth\Models\Example;
use App\Domains\Auth\Services\ExampleService;

/**
 * Class ExampleController.
 */
class ExampleController
{
    /**
     * @var ExampleService
     */
    protected $exampleService;


    /**
     * ExampleController constructor.
     *
     * @param  ExampleService  $exampleService
     */
    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.auth.example.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.auth.example.create');
    }

    /**
     * @param  StoreExampleRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreExampleRequest $request)
    {
        $example = $this->exampleService->store($request->validated());

        return redirect()->route('admin.auth.example.show', $example)->withFlashSuccess(__('The example was successfully created.'));
    }

    /**
     * @param  Example  $example
     * @return mixed
     */
    public function show(Example $example)
    {
        return view('backend.auth.example.show')
            ->withExample($example);
    }

    /**
     * @param  EditExampleRequest  $request
     * @param  Example  $example
     * @return mixed
     */
    public function edit(EditExampleRequest $request, Example $example)
    {
        return view('backend.auth.example.edit')
            ->withExample($example);
    }

    /**
     * @param  UpdateExampleRequest  $request
     * @param  Example  $example
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(UpdateExampleRequest $request, Example $example)
    {
        $this->exampleService->update($example, $request->validated());

        return redirect()->route('admin.auth.example.show', $example)->withFlashSuccess(__('The example was successfully updated.'));
    }

    /**
     * @param  DeleteExampleRequest  $request
     * @param  Example  $example
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteExampleRequest $request, Example $example)
    {
        $this->exampleService->delete($example);

        return redirect()->route('admin.auth.example.deleted')->withFlashSuccess(__('The example was successfully deleted.'));
    }
}
