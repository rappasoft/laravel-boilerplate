<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('frontend.user.dashboard');
	}
}