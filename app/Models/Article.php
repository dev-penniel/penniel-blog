<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Article extends Model
{

    use HasRoles, Commentable;
    
    protected $fillable = [
        'title',
        'slug',
        'body',
        'exerpt',
        'views',
        'claps',
        'thumbnail',
        'img_credit',
        'status',
        'published_date',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
