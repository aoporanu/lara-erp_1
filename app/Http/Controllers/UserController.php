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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProducts()
    {
        $user = $this->userModel->findByUsername(request()->route()->parameter('username'));
        dump($user->distributors()->with('products'));
        die;
        return view('users.my-products', ['stocks' => $this->userModel->getMyProducts($user->username)]);
    }

    /**
     * get user's distributors, although it can be done with the
     * @show method
     * @return [type] [description]
     */
    public function distributors()
    {
        $user = $this->userModel->findByUsername(request()->route()->parameter('username'));

        return view('users.distributors', ['user' => $user]);
    }

    /**
     * [show description]
     * @return [type] [description]
     */
    public function show()
    {
        $user = $this->userModel->findByUsername(request()->route()->parameter('username'));

        return view('users.show', ['user' => $user]);
    }
}
