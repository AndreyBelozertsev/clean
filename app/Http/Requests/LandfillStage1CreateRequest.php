<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Domain\City\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class LandfillStage1CreateRequest extends FormRequest
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
            'address' => ['required','string','max:180'],
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
            'coordinates' => explode(',',$this->coordinates),
        ]);
    }

    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        return array_merge($validated, ['coordinates' => implode(',',$validated['coordinates'])]);
    }

}