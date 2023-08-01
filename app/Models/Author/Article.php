<?php

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{

    protected $primaryKey = 'slug';
    public $incrementing = false;
    
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'content', 'user_id', 'views_count', 'comments_count', 'shares_count', 'word_count', 'slug', 'status'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
