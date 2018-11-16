<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;

class UserController extends Controller
{
    //
    private $page = 7;
    public function index(User $user)
    {
        $users = $user->paginate($this->page);
        return view('User.lista', compact('users'));
    }
    public function create()
    {
        return view('User.create-edit');
    }
    public function store(User $user, Request $request)
    {
        $userForm = $user->create($request->all());
        
        if($userForm) {
            return redirect()->route('RandelCar.usuario.lista')
                            ->with(['success' => 'Usuário cadastrado com sucesso !']);
        }
    }
}
