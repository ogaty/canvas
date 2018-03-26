<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\BlogIndexData;
use App\Extensions\NewThemeManager;

class SearchController extends Controller
{
    //
    public function index(Request $request) {
        $data = $this->dispatch(new BlogIndexData($request->get('query')));
        $layout = (new NewThemeManager(resolve('app'), resolve('files')))->getViewPath() . "frontend.blog.index";
        $socialHeaderIconsUser = User::where('id', Settings::socialHeaderIconsUserId())->first();
        $css = Settings::customCSS();
        $js = Settings::customJS();

        return view($layout, $data, compact('css', 'js', 'socialHeaderIconsUser'));
    }
}
