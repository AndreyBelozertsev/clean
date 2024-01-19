<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Domain\City\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class LandfillCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['required','string','max:180'],
            'name' => ['required','string', 'max:50'],
            'phone' => ['required','digits:11'],
            'content' => ['sometimes','string','nullable', 'max:1500'],
            'images' => ['required'],
            'images.*' => ['image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
            'coordinates' => ['required','array','size:2'],
            'coordinates.0' => ['regex:/\A[+-]?(?:180(?:\.0{1,18})?|(?:1[0-7]\d|\d{1,2})\.\d{1,18})\z/x'],
            'coordinates.1' => ['regex:/\A[+-]?(?:90(?:\.0{1,18})?|\d(?(?<=9)|\d?)\.\d{1,18})\z/x'],
            'city_id' => ['required','numeric', 'max:' . City::max('id')],
        ];
    }

        /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        
        $this->merge([
            'phone' => Str::phoneNumber($this->phone),
            'coordinates' => explode(',',$this->coordinates),
        ]);
    }

    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        unset($validated['images']);
        return array_merge($validated, ['coordinates' => implode(',',$validated['coordinates'])]);
    }
}