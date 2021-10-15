<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list(): JsonResponse
    {
//        $this->authorize('viewAny', Role::class);
        return response()->json(
            Role::with('permissions')->paginate(15)
        );
    }

    public function role(Role $role): JsonResponse
    {
//        $this->authorize('viewAny', $role);
        return response()->json($role);
    }

}