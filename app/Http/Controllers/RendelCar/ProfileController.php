<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;

class ProfileController extends Controller
{
    //
    private $pages = 7;

    public function __construct()
    {
        $this->middleware('can:GERENTE');
    }
    public function index(Profile $profile)
    {
        $profiles = $profile->paginate($this->pages);
        
        return view('Profile.listar-perfil', compact('profiles'));
    }
    public function create()
    {
        return view('Profile.create-edit');
    }
    public function store(Request $request, Profile $profile)
    {
        $create = $request->all();
        $profile->create($create);
        if($create) {
            return redirect()->route('RandelCar.perfil-lista');
        }
    }

    public function listUsers($id, Profile $profile) 
    {
        $profile = $profile->find($id);
        
        $users = $profile->users()->get();
        $title = $profile->name;
        return view('Profile.perfil-usuario', compact('users', 'title', 'profile'));
    }
    public function createUserProfile($id, User $user, Profile $profile) 
    {
        $profiles = $profile->find($id);
        $users = $user->whereNotIn('id', function($query) use ($profiles) {
            $query->select("profile_user.user_id");
            $query->from("profile_user");
            $query->whereRaw("profile_user.profile_id = {$profiles->id}");
        })->get();
        
        return view('Profile.perfil-user-create', compact('users', 'profiles'));
    }
    public function storeUserProfile ($id, Request $request, Profile $profile)
    {
        $profile = $profile->find($id);
        $profile->users()->attach($request->get('user'));

        return redirect()->route('RandelCar.usuario-perfil', $id)
                            ->with(['success' => 'Vinculo realizado com sucesso !']);
    }
    public function delete(User $user, Profile $profile, $id, $userId)
    {
        $perfil = $profile->find($id);
        $perfil->users()->detach($userId);

        return redirect()->route('RandelCar.usuario-perfil', $id)
                            ->with(['success' => 'Removido com sucesso !']);
    }
}
