<?php

namespace App\Services;


use App\Models\Meta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticlesService
{

    public function storeArticle($request)
    {
        $articleData = [
            'title' => $request->title,
            'body'  => $request->body,

        ];

        $article = auth()->user()->articles()->create($articleData);
        $article->categories()->attach($request->input('categories'));

//         save metadata in english
        $metaEn =new Meta( [
            'meta_title'       => $request->meta_title_en,
            'meta_keywords'    => $request->meta_keywords_en,
            'meta_description' => $request->meta_descr_en,
        ]);



        if ($request->hasFile('article_photo')) {
            $article->addMediaFromRequest('article_photo')->toMediaCollection('article_image');
        }

        if (!empty($request->title_ge) && !empty($request->body_ge)) {

            $slug_ge = preg_replace('/\s+/u', '-', trim($request->title_ge));
            $convert = Str::ascii($slug_ge);
            $article->setTranslation('slug', 'ge', $convert);
            $article->setTranslation('title', 'ge', $request->title_ge);
            $article->setTranslation('body', 'ge', $request->body_ge);
            $article->save();

            $metaGE =new Meta( [
                'meta_title'       => $request->meta_title_en,
                'meta_keywords'    => $request->meta_keywords_en,
                'meta_description' => $request->meta_descr_en,
            ]);

            $metaGE->setTranslation('meta_title', 'ge', $request->meta_title_ge);
            $metaGE->setTranslation('meta_keywords', 'ge', $request->meta_keywords_ge);
            $metaGE->setTranslation('meta_description', 'ge', $request->meta_descr_ge);
            $article->metas()->save($metaGE);
        }

        return $article;
    }


    public function updateArticle($request, $article)
    {
        $articleData = [
            'title' => $request->title,
            'body'  => $request->body,
        ];

        $article->update($articleData);
        $article->categories()->detach();
        $article->categories()->attach($request->input('categories'));

        $media = $article->getMedia('article_image')->first();
        if ($request->hasFile('article_photo')) {
            if (isset($media)) {
                $media->delete();
            }
            $article->addMediaFromRequest('article_photo')->toMediaCollection('article_image');
        }

        return $article;
    }
}
