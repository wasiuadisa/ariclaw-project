<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = [
        'banner_title', 'banner_excerpt', 'button_title', 'divider1_title', 'image_rectangle', 'image_square', 'divider2_thin_text', 'divider3_title', 'divider3_text', 'image_filename', 'image_title', 'image_subtitle', 'colour_divider_text', 'colour_divider_button', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'home_pages';
}
