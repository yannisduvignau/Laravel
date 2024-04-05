<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauce extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable=['userId','name','manufacturer','description','mainPepper','imageURL','heat','dislikes','usersLiked','usersDisliked'];
    protected $casts=['usersLiked'=>'json','usersDisliked'=>'json'];
}
