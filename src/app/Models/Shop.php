<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // 必要に応じてテーブル名やfillable属性を定義する
    protected $fillable = ['name', 'genre_id', 'area_id', 'detail', 'image_url'];

    // エリアとのリレーション
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // ジャンルとのリレーション
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
