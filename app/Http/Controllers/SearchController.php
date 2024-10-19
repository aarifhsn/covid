<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $request->validate([
            'search' => ['required', 'string']
        ]);

        $search = $request->input('query');

        $results = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();

        return Inertia::render('Search', [
            'results' => $results,
            'search' => $search
        ]);

    }
}
