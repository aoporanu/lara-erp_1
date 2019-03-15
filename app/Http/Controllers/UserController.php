<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    private $userModel = null;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userModel = new User;
    }

    /**
     * @param User $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProducts($username = null)
    {
        $user = $this->userModel::findByUsername($username);
        return view('users.my-products', ['stocks' => $user->distributors->with('stocks')]);
    }
}
