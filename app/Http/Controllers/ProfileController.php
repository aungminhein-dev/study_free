<?php

namespace App\Http\Controllers;

use App\Http\Serivces\ProfileManagementService;
use Illuminate\Http\Request;
use Throwable;

class ProfileController extends Controller
{
    public function update(Request $request, ProfileManagementService $service)
    {
        $service->validateInputs($request);
        try {
            $service->updateProfileData($request);
        } catch (Throwable $th) {
            return $th;
        }

        return back();
    }

    public function show()
    {
        return view('auth.profile.show');
    }
}
