<?php

namespace App\Http\Requests;

use App\Series;
use Illuminate\Support\Str;


use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CreateSeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ];
    }

    public function uploadSeriesImage()
    {
        $uploadImage = $this->image;

        $this->fileName = Str::slug($this->title) . '.' . $uploadImage->getClientOriginalExtension();

        $uploadImage->storeAs('series', $this->fileName);

        return $this;
    }

    public function storeSeries()
    {
        $series = Series::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'image_url' => 'series/' . $this->fileName
        ]);

        session()->flash('success', 'Series Created Successfully');

        return redirect()->route('series.show', $series->slug);
    }
}
