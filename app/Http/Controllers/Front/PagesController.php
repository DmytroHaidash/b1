<?php

namespace App\Http\Controllers\Front;

use App\Mail\Contacts;
use App\Mail\Expert;
use App\Models\Additional\Page;
use App\Models\Article\Article;
use App\Models\Catalog\Category;
use App\Models\Slider\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->take(3)->get();
        $slides = optional(Slider::find(1))->slides;
        $categories = Category::has('products')->inRandomOrder()->get();

        return \view('app.pages.home', compact('articles', 'slides', 'categories'));
    }

    public function show(Page $page): View
    {
        return \view('app.pages.default', compact('page'));
    }

    public function expertise(Request $request): RedirectResponse
    {
        $data = [
            'user' => (object)$request->only('name', 'phone', 'email'),
            'message' => $request->input('message'),
        ];
        Mail::send(new Expert($data));
        session()->put('message', 'pages.thanks.expert');

        return redirect()->route('app.thanks');
    }

    public function contacts(Request $request): RedirectResponse
    {
        $data = [
            'user' => (object)$request->only('name', 'phone', 'email'),
            'message' => $request->input('message'),
        ];
        Mail::send(new Contacts($data));
        session()->put('message', 'pages.thanks.contacts');

        return redirect()->route('app.thanks');
    }
}
