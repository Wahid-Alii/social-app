<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable=[
        'file'
    ];

    //  public function getFileAttribute($value) {
    //     return asset('storage/Media/' . $value);
    //     }
}

// if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
//     return $value;
// }
