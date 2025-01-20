<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::post('/events', function (Illuminate\Http\Request $request) {
    // Log the incoming request payload
    Log::info('Received AudienceGrid Event', [
        'payload' => $request->all(),
    ]);

    return response()->json(['message' => 'Event logged successfully'], 201);
});
