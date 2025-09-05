<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class letters extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'letters';

    protected $fillable = ['title', 'number_of_letters', 'category_id', 'date', 'notes', 'file_path', 'file_size'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
