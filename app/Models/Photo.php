<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
