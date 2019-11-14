<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表名
    protected $table = 'student';
    //students 默认表名

    //指定id
    protected $primaryKey = 'id';

    //自动维护时间戳
    public $timestamps = false;

    //指定允许批量赋值的字段
    protected $fillable = ['name', 'age'];

    //指定不允许批量赋值的字段
    protected $guarded = [];

    public function getDateFormat()
    {
        return time();
    }

    public function asDateTime($value)
    {
        return $value;
    }
}