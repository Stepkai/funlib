<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;


class AuthController extends Controller
{
	/**
	 * login api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login(AuthRequest $request)
	{
        if(Auth::guard('web')->attempt(array_merge($request->only('email', 'password'), ['role' => 'client']))) {
            $user = Auth::user();
            $user->generateToken();
			return response()->json(['data' => $user->getProfile()], 200);
		} else {
			return response()->json([
			    'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => [
                        'These credentials do not match our records.'
                    ]
                ]
            ], 422);
		}
	}
	/**
	 * Register api
	 *
	 * @return \Illuminate\Http\Response
	 */
//	public function register(Request $request)
//	{
//		$validator = Validator::make($request->all(), [
//			'name' => 'required',
//			'email' => 'required|email',
//			'password' => 'required',
//			'c_password' => 'required|same:password',
//		]);
//		if ($validator->fails()) {
//			return response()->json(['error'=>$validator->errors()], 401);
//		}
//		$input = $request->all();
//		$input['password'] = bcrypt($input['password']);
//		$user = User::create($input);
//		$success['token'] = $user->createToken('MyApp')->accessToken;
//		$success['name'] = $user->name;
//		return response()->json(['success'=>$success], 200);
//	}
	/**
	 * details api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function details()
	{
		$user = Auth::user();
		return response()->json(['success' => $user], 200);
	}
}