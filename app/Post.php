<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
       'category_id', 'title', 'excerpt','body', 'iframe', 'image', 'user_id',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    //--------------RELATIONS-------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    //--------------ATRIBUTTES------------------
    
    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 150);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
    }
}
