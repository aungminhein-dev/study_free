<?php

namespace App\Http\Controllers;

use App\Http\Serivces\ProfileManagementService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProfileController extends Controller
{
    public function update(Request $request,ProfileManagementService $service)
    {
        $service->validateInputs($request);
        try{
            $service->updateProfileData($request);
        }catch(Throwable $th){
            return $th;
        }
        return back();
    }
}
