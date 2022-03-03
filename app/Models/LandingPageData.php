<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static firstOrCreate(array $array, string[] $array1)
 * @method static where(array $array)
 */
class LandingPageData extends Model
{
    use HasFactory;

    protected $guarded = [];

      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'redirect' => 'boolean',
    ];
}
