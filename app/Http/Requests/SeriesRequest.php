<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    public function uploadSeriesImage()
    {
        $uploadImage = $this->image;

        $this->fileName = Str::slug($this->title) . '.' . $uploadImage->getClientOriginalExtension();

        $uploadImage->storeAs('public/series', $this->fileName);

        return $this;
    }
}
