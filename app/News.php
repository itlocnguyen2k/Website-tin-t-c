<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //khai bao table de su dung
    protected $filltable = "news";
    //neu trong table news khong co 2 cot create_at, update_at thi phai disabled no di
    public $timestamps = false;
}
