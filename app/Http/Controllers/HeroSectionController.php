<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $data = HeroSection::all();

        return view('admin.resume.hero_section', compact('data'));
    }

    public function store(Request $request)
    {
//  dd($request);

    }

    public function update(Request $request)
    {
        $hero  = HeroSection::find(1);
        $user  = auth()->user();

        $media = $user->getMedia('cover')->first();

        if ($request->hasFile('my_photo')) {
            if (isset($media)) {
                $media->delete();
            }
            $user->addMediaFromRequest('my_photo')->usingName('cover photo')->toMediaCollection('cover');
        }

//        HeroSection::update($request->all());
//      $data=([
//            'greeting'    => $request->greeting,
//            'text'        => $request->text,
//            'header_text' => $request->header_text,
//            'email'       => $request->email,
//        ]);

        $data = [];
        if (!empty($request->greeting)) {
            $data['greeting'] = $request->greeting;
        }
        if (!empty($request->text)) {
            $data['text'] = $request->text;
        }
        if (!empty($request->header_text)) {
            $data['header_text'] = $request->header_text;
        }
        if (!empty($request->email)) {
            $data['email'] = $request->email;
        }

        $hero->update($data);

        return redirect()->back();

    }
}
