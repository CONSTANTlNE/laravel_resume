<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Meta extends Model
{
    use HasFactory, HasTranslations,EscapeUniCodeJson;

    protected $guarded = [];
    public array $translatable = ['meta_title', 'meta_keywords', 'meta_description'];

    public function metaable(){
        return $this->morphTo();
    }
}
