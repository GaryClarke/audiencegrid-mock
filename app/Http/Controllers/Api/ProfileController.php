<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Log the incoming request payload
        Log::info('Received AudienceGrid Event', [
            'payload' => $request->all(),
        ]);

        $data = $request->validate([
            'event' => 'required|string', // Optional: validate the event type
            'properties' => 'required|array',
            'user' => 'required|array',
            'user.id' => 'required|string',
            'user.email' => 'required|email',
            'user.region' => 'required|string|size:2',
        ]);

        // Save or update the Profile
        $profile = Profile::updateOrCreate(
            ['email' => $data['user']['email']],
            ['region' => $data['user']['region']]
        );

        // Save or update the Properties
        foreach ($data['properties'] as $key => $value) {
            Property::updateOrCreate(
                ['profile_id' => $profile->id, 'key' => $key],
                ['value' => $value]
            );
        }

        return response()->json(['message' => 'Data saved successfully'], 201);
    }
}
