<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @SWG\Post(
     *   path="/register",
     *   tags={"Users"},
     *   operationId="register",
     *   summary="Add New User",
     *   @SWG\Parameter(
     *    name="language",
     *    description="App Language",
     *    in= "header",
     *    required=true,
     *    type="string",
     *    enum={"ar", "en"}
     *  ),
     *   @SWG\Parameter(
     *    name="name",
     *    description="User Name",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    format="varchar"
     *  ),
     *    @SWG\Parameter(
     *    name="email",
     *    description="User email",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    format="email"
     *  ),
     *   @SWG\Parameter(
     *    name="password",
     *    description="User Password",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    format="password"
     *  ),
     *   @SWG\Parameter(
     *    name="password_confirmation",
     *    description="Confirm Password",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    format="password"
     *  ),
     *   @SWG\Parameter(
     *    name="image",
     *    in="formData",
     *    description="User Image",
     *    required=true,
     *    type="file",
     *  ),
     *   @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *  )
     * @param RegisterRequest $request
     * @return UserResource
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->except('password') + [
                'password' => bcrypt($request->password), 'api_token' => Str::random(80),
                'image_path' => $request->file('image')->store('users', 'public')]);

        return new UserResource($user);
    }

    /**
     * @SWG\Post(
     *   path="/login",
     *   tags={"Users"},
     *   operationId="login",
     *   summary="Login",
     *   @SWG\Parameter(
     *    name="language",
     *    description="App Language",
     *    in= "header",
     *    required=true,
     *    type="string",
     *    enum={"ar", "en"}
     *  ),
     *   @SWG\Parameter(
     *    name="email",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    description="User Email",
     *  ),
     *   @SWG\Parameter(
     *    name="password",
     *    in= "formData",
     *    required=true,
     *    type="string",
     *    description="User Password",
     *    format="password"
     *  ),
     *   @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *  )
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $user = auth()->attempt($request->only(['email', 'password']));
        if (!$user) {
            return response()->json(['errors' => [
                'message' => 'No User With Inserted Data'
            ]], 422);
        } else {
            auth()->user()->update(['api_token' => Str::random(80)]);

            return new UserResource(auth()->user());
        }
    }

    /**
     * @SWG\Post(
     *   path="/logout",
     *   tags={"Users"},
     *   operationId="logout",
     *   summary="Logout",
     *   security={{"Bearer":{}}},
     *   @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *  )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $token = str_after($request->header('Authorization'), 'Bearer ');
        $user = User::where('api_token', $token)->first();

        if ($user) {
            $user->update(['api_token' => null]);
            return response()->json(['message' => 'User Logged Out'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
