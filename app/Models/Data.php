<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Data extends Model
{
    use HasFactory;
    public $table="data";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'image'
    ];
    public static function getAllData()
    {
        $result =DB::table('data')
        ->select('id','name','email','phone')
        ->get()->toArray();
        return $result;
    }
}
