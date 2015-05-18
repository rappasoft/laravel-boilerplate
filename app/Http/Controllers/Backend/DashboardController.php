<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('access.routeNeedsRole:{role:Administrator::redirect:/::needsAll:true::with:flash_danger|You do not have access to do that.}');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('backend.dashboard');
	}
}