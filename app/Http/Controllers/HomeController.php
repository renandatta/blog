<?php

namespace App\Http\Controllers;

use App\Content;
use App\FeaturedPost;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('id', 'asc')->get();
        $footer_text = Content::where('name', '=', 'footer_text')->first();
        $facebook = Content::where('name', '=', 'facebook')->first();
        $twitter = Content::where('name', '=', 'twitter')->first();
        $instagram = Content::where('name', '=', 'instagram')->first();

        $top_3 = FeaturedPost::where('name', '=', 'top_3')->first();
        $top3Id = [];
        foreach ($top_3->details as $item) {
            array_push($top3Id, $item->post->id);
        }
        $recent_news = Post::orderBy('id', 'desc')
            //->whereNotIn('id', $top3Id) // uncomment line ini, agar mencegah duplikat konten dari top 3
            ->limit(4) // jumlah yg ditampilkan
            ->get();

        $recentId = [];
        foreach ($recent_news as $item) {
            array_push($recentId, $item->id);
        }
        $trending_news = Post::orderBy('vote_count', 'desc')
            //->whereNotIn('id', $top3Id) // uncomment line ini, agar mencegah duplikat konten dari top 3
            //->whereNotIn('id', $recentId) // uncomment line ini, agar mencegah duplikat dari recent news
            ->limit(4) // jumlah yg ditampilkan
            ->get();
        return view('home.index', compact(
            'categories',
            'footer_text',
            'facebook',
            'twitter',
            'instagram',
            'top_3',
            'recent_news',
            'trending_news'
        ));
    }

    public function recent_news()
    {
        $categories = PostCategory::orderBy('id', 'asc')->get();
        $footer_text = Content::where('name', '=', 'footer_text')->first();
        $facebook = Content::where('name', '=', 'facebook')->first();
        $twitter = Content::where('name', '=', 'twitter')->first();
        $instagram = Content::where('name', '=', 'instagram')->first();

        $recent_news = Post::orderBy('id', 'desc')
            ->paginate(10);
        $recentId = [];
        foreach ($recent_news as $item) {
            array_push($recentId, $item->id);
        }

        $trending_news = Post::orderBy('vote_count', 'desc')
            //->whereNotIn('id', $top3Id) // uncomment line ini, agar mencegah duplikat konten dari top 3
            //->whereNotIn('id', $recentId) // uncomment line ini, agar mencegah duplikat dari recent news
            ->limit(4) // jumlah yg ditampilkan
            ->get();

        // custom template pagination ada di recources/views/vendor/pagination/bootstrap-4.blade.php
        return view('home.recent_news', compact(
            'categories',
            'footer_text',
            'facebook',
            'twitter',
            'instagram',
            'recent_news',
            'trending_news'
        ));
    }

    public function category($slug)
    {
        $categories = PostCategory::orderBy('id', 'asc')->get();
        $footer_text = Content::where('name', '=', 'footer_text')->first();
        $facebook = Content::where('name', '=', 'facebook')->first();
        $twitter = Content::where('name', '=', 'twitter')->first();
        $instagram = Content::where('name', '=', 'instagram')->first();

        $category = PostCategory::where('slug', '=', $slug)->firstOrFail();
        $news = Post::where('post_category_id', '=', $category->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $newsId = [];
        foreach ($news as $item) {
            array_push($newsId, $item->id);
        }

        $trending_news = Post::orderBy('vote_count', 'desc')
            //->whereNotIn('id', $newsId) // uncomment line ini, agar mencegah duplikat dari news
            ->limit(4) // jumlah yg ditampilkan
            ->get();
        return view('home.category', compact(
            'categories',
            'footer_text',
            'facebook',
            'twitter',
            'instagram',
            'category',
            'news',
            'trending_news'
        ));
    }

    public function post($slug)
    {
        $categories = PostCategory::orderBy('id', 'asc')->get();
        $footer_text = Content::where('name', '=', 'footer_text')->first();
        $facebook = Content::where('name', '=', 'facebook')->first();
        $twitter = Content::where('name', '=', 'twitter')->first();
        $instagram = Content::where('name', '=', 'instagram')->first();

        $post = Post::where('slug', '=', $slug)->firstOrFail();

        // tambah view count bersarkan view biasa
        $field = Post::find($post->id);
        $field->view_count++;
        $field->save();
        $post->view_count = $field->view_count;

        $related_post = Post::where('post_category_id', '=', $post->post_category_id)
            ->orderBy('id', 'desc') //terbaru
            //->orderBy('vote_count', 'desc') // berdasarkan like
            //->orderBy('view_count', 'desc') // berdasarkan view uncomment salah satu dari order by
            ->limit(3) //jumlah yg mau ditampilkan
            ->get();
        return view('home.post', compact(
            'categories',
            'footer_text',
            'facebook',
            'twitter',
            'instagram',
            'post',
            'related_post'
        ));
    }

    public function vote_count($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $field = Post::find($post->id);
        $field->vote_count++;
        $field->save();

        return $field->vote_count;
    }

    public function search_post(Request $request)
    {
        if ($request->input('search') == '') return redirect()->route('/');
        return redirect()->route('home.search', $request->input('search'));
    }

    public function search($keyword)
    {
        $categories = PostCategory::orderBy('id', 'asc')->get();
        $footer_text = Content::where('name', '=', 'footer_text')->first();
        $facebook = Content::where('name', '=', 'facebook')->first();
        $twitter = Content::where('name', '=', 'twitter')->first();
        $instagram = Content::where('name', '=', 'instagram')->first();

        $post = Post::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->paginate(10);

        $trending_news = Post::orderBy('vote_count', 'desc')
            ->limit(4) // jumlah yg ditampilkan
            ->get();
        return view('home.search', compact(
            'categories',
            'footer_text',
            'facebook',
            'twitter',
            'instagram',
            'post',
            'trending_news',
            'keyword'
        ));
    }
}
