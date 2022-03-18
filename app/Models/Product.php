<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $guarded = [''];
    const STATUS_DEFAULT = 1;
    const STATUS_HIDE = 0;
    protected $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Đang hoạt động',
            'class' => 'badge bg-success'
        ],
        self::STATUS_HIDE => [
            'name' => 'Ẩn',
            'class' => 'badge bg-danger'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->status, $this->p_status, "[N\A]"); //lấy giá trị mảng lồng nhau  mảng status ,key là số status
    }
    public function  category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
