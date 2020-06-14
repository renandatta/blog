<?php

namespace App\Http\Controllers;

use App\Content;
use App\Partner;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $welcome = Content::where('name', '=', 'welcome')->first();
        $about = Content::where('name', '=', 'about')->first();
        $products = Post::where('post_category_id', '=', 4)->get();
        $partner = Partner::all();
        $news = Post::where('post_category_id', '=', 2)->orderBy('id', 'desc')->limit(3)->get();
        $gallery = Post::where('post_category_id', '=', 1)->orderBy('id', 'desc')->limit(9)->get();
        $tags = [];
        foreach ($gallery as $item) {
            $temp = explode(" ", $item->tags);
            foreach ($temp as $item2) {
                if (!in_array($item2, $tags)) {
                    array_push($tags, $item2);
                }
            }
        }

        $satisfied_customer = Content::where('name', '=', 'satisfied_customer')->first();
        $project_build = Content::where('name', '=', 'project_build')->first();
        $experts_worker = Content::where('name', '=', 'experts_worker')->first();
        $experience_years = Content::where('name', '=', 'experience_years')->first();
        $tentang = Content::where('name', '=', 'tentang')->first();
        $alamat = Content::where('name', '=', 'alamat')->first();
        $notelp = Content::where('name', '=', 'notelp')->first();
        $email = Content::where('name', '=', 'email')->first();
        $setting = Setting::find(1);

        return view('layouts.home', compact(
            'welcome', 'about', 'products', 'partner', 'news', 'gallery', 'satisfied_customer',
            'project_build', 'experts_worker', 'experience_years', 'tentang', 'tags', 'alamat', 'notelp', 'email', 'setting'
        ));
    }
}
