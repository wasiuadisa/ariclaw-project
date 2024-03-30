<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettingPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header_logo_filename', 'header_logo_alt_text', 'favicon_logo', 'footer_text', 'facebook_url', 'twitter_url', 'instagram_url', 'skype_url', 'contact_address', 'contact_phone', 'contact_email', 'contact_website', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'site_settings';
}
