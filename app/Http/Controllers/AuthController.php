<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\UsersPermissions;
use App\JobRoutes;
use App\test;
class AuthController extends Controller
{
    public function check()
    {

    }

    /**
     * Create user
     *
     
     */
    public function signup(Request $request)
    {
        User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
        'user_type' => request('user_type'),
    ]);

    return response()->json(['message' => 'User Created']);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $data = [
        'grant_type' => 'password',
        'client_id' => '2',
        'client_secret' => 'Or5hWFUW7JbWDezU5pVIb7LnWlYyKOwEEpUnCxBq',
        'username' => request('username'),
        'password' => request('password'),
    ];

    $request = Request::create('/oauth/token', 'POST', $data);
    return app()->handle($request);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $accessToken = auth()->user()->token();

        $accessToken->revoke();

    return response()->json(['Message' => 'you are logged out']);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        if($request->user()) {

            $userPermissions = UsersPermissions::filterUsersPermissionsByUserType($request->user()->user_type);

            $permissions = [];

            foreach ($userPermissions as $permission) {
                $permissions[] = $permission->permission;
            }

            if ($request->user()->user_type == 2) {
                
            }
            
            $user = [
                'fullDetails' => $request->user(),
                'permissions' => $permissions,
            ];
            
            return response()->json($user);
        } else {
            return response()->json(['Message' => 'not currently logged in']);
        }
    }
}