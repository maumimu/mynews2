<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'news_id' => 'required',
        'body' => 'required',
    );

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    
}
