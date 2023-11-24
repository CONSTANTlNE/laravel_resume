<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function users()
    {

        $users = User::with('roles', 'articles')->withCount('articles')->get();

        return view('admin.admin_pages.users', compact('users'));

    }

    public function articles()
    {
        $categories = Category::withCount('articles')->get();
        $articles   = Article::with('media', 'categories', 'users')
            ->orderBy('created_at', 'desc')->get();

        return view('admin.blog.view_articles', compact('articles', 'categories'));
    }


    public function settings()
    {

        $languages = Language::all();

        return view('admin.admin_pages.site_settings', compact('languages'));
    }

    public function langDestroy(Language $language)
    {
        $language->delete();

        return redirect()->back();
    }

    public function status(Request $request)
    {
        $language = Language::find($request->language);
        if ($language->active == 1) {
            $language->active = 0;
        } else {
            $language->active = 1;
        }
        $language->save();

        return redirect()->back();
    }

    public function langUpdate(Request $request)
    {
        $language       = Language::find($request->id);
        $language->abbr = $request->abbr;
        if ($request->has('main') && $request->main = 1) {
            $current_main       = Language::where('main', 1)->first();
            $current_main->main = 0;
            $current_main->save();
            $language->main = 1;
        }
        $language->languages = $request->language;

        $language->save();

//
        return redirect()->back();

    }

    public function staticLang()
    {

        $data      = [];
        $directory = base_path('lang');
        $jsonFiles = File::files($directory);

        foreach ($jsonFiles as $file) {
            $filename        = pathinfo($file, PATHINFO_FILENAME);
            $data[$filename] = json_decode(File::get($file), true);
        }
        $languages = array_keys($data);

        $blade = [];

        foreach ($data as $innerArray) {
            foreach ($innerArray as $key => $value) {
                $blade[$key] = $value;
            }
        }

        return view('admin.admin_pages.static_data_lang', compact('data', 'languages', 'blade'));
    }


    public function editStaticLang(Request $request)
    {

        return view('admin.admin_pages.edit_static_data', compact('request'));

    }

    public function updateStaticLang(Request $request)
    {

        $file = base_path('lang/en.json');
//        dd($file);
        $translations = json_decode(file_get_contents($file), true);

        if (array_key_exists($request->key, $translations)) {
            $translations[$request->key] = $request->input('texten');
            file_put_contents($file, json_encode($translations, JSON_UNESCAPED_UNICODE));
        }

        $file2        = base_path('lang/ge.json');
        $translations = json_decode(file_get_contents($file2), true);

        if (array_key_exists($request->key, $translations)) {
            $translations[$request->key] = $request->input('textge');
            file_put_contents($file2, json_encode($translations, JSON_UNESCAPED_UNICODE));
        }

        return redirect()->route('static_lang');
    }


    public function createStaticLang(Request $request)
    {
        $file = base_path('lang/en.json');
        $data = json_decode(file_get_contents($file), true);
        if (array_key_exists($request->key, $data)) {
            unset($data[$request->key]);
            file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE));
        }

        $file2 = base_path('lang/ge.json');
        $data2 = json_decode(file_get_contents($file2), true);
        if (array_key_exists($request->key, $data2)) {
            unset($data[$request->key]);
            file_put_contents($file2, json_encode($data2, JSON_UNESCAPED_UNICODE));
        }

        return redirect()->route('static_lang');
    }



    public function deleteStaticLang(Request $request)
    {
        $file = base_path('lang/en.json');
        $data = json_decode(file_get_contents($file), true);
        if (array_key_exists($request->key, $data)) {
            unset($data[$request->key]);
            file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE));

        }

        $file2 = base_path('lang/ge.json');
        $data2 = json_decode(file_get_contents($file2), true);
        if (array_key_exists($request->key, $data2)) {
            unset($data2[$request->key]);
            file_put_contents($file2, json_encode($data2, JSON_UNESCAPED_UNICODE));
        }

        return redirect()->route('static_lang');
    }


}