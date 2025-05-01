<?php

namespace App\Http\Controllers;

use App\Http\Resources\HobbiesResource;
use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $hobbies = Hobby::get();

        return HobbiesResource::collection($hobbies);
    }
}
