<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UserRequest;
use App\System\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{

	public function login()
	{
		return view('login.loginform');
	}

	public function signin()
	{
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$role = Auth::user()->getAttributes();
			if ($role["role"] == "admin") {
				$user = Auth::user();
				$success['token'] = $user->createToken('MyApp')->accessToken;
				return response()->json(['success' => $success], 200);
			} else {
				return response()->json(['error' => 'Access denied'], 401);
			}
		} else {
			return response()->json(['error'=>'Unauthorised'], 401);
		}
	}

	use SoftDeletes;

//	public function __construct()
//	{
//		$this->middleware('auth');
//	}

	/**
	 * Display a listing of the users.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = user::all();
		return view('user.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new user.
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