<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class News extends Model
{
    use HasFactory;

    protected $fillable = ['image' ,'description'];

    // get image url
    public function getUrlImageAttribute()
    {
        if (!$this->image)
        {
            return false;
        }
        if (Str::startsWith($this->image, ['http://', 'https://']))
        {
            return $this->image;
        }
        return asset('storage/'.$this->image);
    }

    // get published date
    public function getDateAttribute()
    {
        $date = $this->created_at;
        $formatted_date = Carbon::parse($date)->format('M-d-Y');
        return $formatted_date;
    }
}
