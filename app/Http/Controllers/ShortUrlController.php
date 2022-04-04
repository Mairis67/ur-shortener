<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ShortUrlController extends Controller
{
    public function index(): View
    {
        $shortUrl = ShortCode::latest()->get();

        return view('shortenUrl', compact('shortUrl'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'link' => ['required', 'url']
        ]);

        $input['link'] = $request->link;

        $input['code'] = Str::random(10);

        ShortCode::create($input);

        return redirect('/')->with('success', 'Link Generated');
    }

    public function shortenUrl($code): RedirectResponse
    {
        $find = ShortCode::where('code', $code)->first();

        return redirect($find['link']);
    }
}
