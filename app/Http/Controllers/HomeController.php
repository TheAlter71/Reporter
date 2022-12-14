<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blog_tag;
use App\Models\React;
use Session;

class HomeController extends Controller
{
    public function home()
    {
        // fetching latest 30 reactions
        $reacts = React::orderBy('created_at', 'desc')->take(30)->get();

        // counting the number of reacts for each blog
        $blog_reacts = [];
        foreach ($reacts as $react) {
            $react_count = React::where('blog_id', $react->blog_id)->count();
            $blog_reacts[$react->blog_id] = $react_count;
        }

        arsort($blog_reacts);

        // Finding the id of the blog of the day
        foreach ($blog_reacts as $blog_id => $react_count) {
            $the_blog_id = $blog_id;
            break;
        }

        if (isset($the_blog_id)) {
            // Fetching the blog of the day
            $blog_of_the_day = Blog::where('id', $the_blog_id)->first();

            // Fetching tags for blog of the day
            $blog_of_the_day_tags = Blog_tag::where('blog_id', $the_blog_id)->get();

            // All latest blogs
            $latest_blogs = Blog::orderBy('created_at', 'desc')->paginate(4);


            View()->share('blog_of_the_day',  $blog_of_the_day);
            View()->share('blog_of_the_day_tags',  $blog_of_the_day_tags);
            View()->share('latest_blogs',  $latest_blogs);
        }


        return view('user.index');
    }

    public function library()
    {
        // Creating trendings blog
        // fetching latest 30 reactions
        $reacts = React::orderBy('created_at', 'desc')->take(50)->get();

        // counting the number of reacts for each blog
        $blog_reacts = [];
        foreach ($reacts as $react) {
            $react_count = React::where('blog_id', $react->blog_id)->count();
            $blog_reacts[$react->blog_id] = $react_count;
        }

        arsort($blog_reacts);

        $trendings = [];
        $counter = 0;

        foreach ($blog_reacts as $key => $value) {
            $trendings[] = Blog::where('id', $key)->first();
            $counter++;
            if ($counter == 6) {
                break;
            }
        }

        // Creating latest blogs
        $recent = Blog::orderBy('created_at', 'desc')->take(3)->get();

        View()->share('trendings',  $trendings);
        View()->share('recents',  $recent);

        return view('user.library');
    }

    public function search(Request $request)
    {
        $search = $request->keyword;

        $blogs = Blog::where('title', 'like', '%' . $search . '%');
        $total_blog = $blogs->count();
        $blogs = $blogs->paginate(9);

        return view('user.search', compact('blogs', 'total_blog', 'search'));
    }
}