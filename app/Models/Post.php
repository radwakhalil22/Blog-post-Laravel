<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Post extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,Sluggable, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
        // 'image',
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = [
        'deleted_at' => 'date:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comments::class, 'commentable');
    }

    public function setImageAttribute($value){
        $imageName = time(). '.' . $value->getClientOriginalExtension();
        $value->storeAs('public/images/posts',$imageName);
        $this->attributes['image'] = 'storage/images/posts/'. $imageName;
    }
}
