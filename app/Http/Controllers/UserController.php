<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * @param User $username
     * @return
     */
    public function myProducts($username = null)
    {
        $user = User::findByUsername($username);
        return view('users.my-products', ['stocks' => $user->distributors->with('stocks')]);
    }
}
