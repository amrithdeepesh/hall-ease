<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hall;

class HallController extends Controller
{
    /**
     * Display campus/block navigation for users.
     */
    public function index()
    {
        $campusGroups = Hall::query()
            ->select('campus_name', 'location')
            ->whereNotNull('campus_name')
            ->where('campus_name', '!=', '')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->orderBy('campus_name')
            ->orderBy('location')
            ->get()
            ->groupBy('campus_name')
            ->map(function ($rows) {
                return $rows->pluck('location')->unique()->values();
            });

        return view('user.halls.index', [
            'campusGroups' => $campusGroups,
        ]);
    }

    /**
     * Display halls for a specific campus block.
     */
    public function block(string $campus, string $block)
    {
        $halls = Hall::query()
            ->with('images')
            ->where('campus_name', $campus)
            ->where('location', $block)
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('user.block-halls', [
            'campus' => $campus,
            'block' => $block,
            'halls' => $halls,
        ]);
    }
}
