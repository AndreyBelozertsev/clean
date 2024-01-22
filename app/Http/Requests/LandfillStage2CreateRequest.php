<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Domain\City\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class LandfillStage2CreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uuid' => ['required','uuid'],
            'images' => ['required','array'],
            'images.*' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
        ];
    }


    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        unset($validated['images']);
        return $validated;
    }
}