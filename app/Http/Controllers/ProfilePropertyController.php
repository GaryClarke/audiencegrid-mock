<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;

class ProfilePropertyController extends Controller
{
    public function edit(Profile $profile): View
    {
        return view('properties.edit', [
            'profile' => $profile,
            'properties' => $profile->properties,
        ]);
    }
}
