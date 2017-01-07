<?php

namespace App\Http\Controllers\Backend\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class SearchController.
 */
class SearchController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        if (!$request->has('q')) {
            return redirect()
                ->route('admin.dashboard')
                ->withFlashDanger(trans('strings.backend.search.empty'));
        }

        /**
         * Process Search Results Here.
         */
        $results = null;

        return view('backend.search.index')
            ->withSearchTerm($request->get('q'))
            ->withResults($results);
    }
}
