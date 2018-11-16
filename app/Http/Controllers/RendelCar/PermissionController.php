<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;

class PermissionController extends Controller
{
    //
    private $pages = 7;
    public function index(Permission $permission) 
    {
        $permissions = $permission->paginate($this->pages);

        return view('Permission.permissoes-lista', compact('permissions'));
    }

    public function create() 
    {
        return view('Permission.create-edit');
    }

    public function store(Request $request, Permission $permission)
    {
        $create = $permission->create($request->all());
        
        if($create) {
            return redirect()
                    ->route('RandelCar.permissoes.lista')
                    ->with(['success' => 'Permissão criada com sucesso !']);
        }
    }
    public function listaPerfil($id, Permission $permission)
    {
        $permissions = $permission->find($id);
        
        $perfil = $permissions->profiles()->get();
    
        $title = $permissions->name;
        
        return view('Permission.perfil-permission-list', compact('permissions', 'title', 'perfil'));
    }
    public function createBond($id, Permission $permission, Profile $profile)
    {
        $permission = $permission->find($id);
        $profiles = $profile->whereNotIn('id', function($query) use ($permission) {
            $query->select("permission_profile.profile_id");
            $query->from("permission_profile");
            $query->whereRaw("permission_profile.permission_id = {$permission->id}");
        })->get();

        return view('Permission.vinculo-create-edit', compact('profiles', 'permission')); 
    }
    public function storeBond($id, Permission $permission, Request $request)
    {
        $permission = $permission->find($id);
        $permission->profiles()->attach($request->get('perfil'));

        return redirect()->route('RandelCar.permissoes.perfil', $id)
                         ->with(['success' => 'Vinculo realizado com sucesso !']);
    }

    public function delete($id, $profileId, Permission $permission)
    {
        $permission = $permission->find($id);
        $profile = $permission->profiles()->detach($profileId);

        return redirect()->route('RandelCar.permissoes.perfil', $id)
                         ->with(['success' => 'Vinculo apagado com sucesso !']);
    }
}