<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\System\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
	use SoftDeletes;

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = user::all();
		return view('user.index', ['users' => $users]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$user = new user();
		return view('user.create', ['user' => $user]);
	}
	/**
	 * @param UserRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(UserRequest $request)
	{
		$userData = $request->all();
		if (empty($userData['id'])) {
			$user = new user();
		} else {
			$user = user::find($userData['id']);
		}
		$user->fill($userData);
		$user->save();
		return redirect('/user')->with('success', 'User has been added');
	}
	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit(int $id)
	{
		$user = user::findOrFail($id);
		return view('user.create', ['user' => $user]);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(int $id)
	{
		user::find($id)->delete();
		return redirect('/user')->with('success', 'User has been deleted');
	}
}