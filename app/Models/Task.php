<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // IDを保護
    protected $guarded = array('id');
    // バリデーションルール
    public static $rules = array(
        // contentは入力必須かつ20文字以内
        'content' => 'required|max:20',
    );
}
