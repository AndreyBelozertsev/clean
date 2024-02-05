<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Domain\City\Models\City;
use Illuminate\Foundation\Http\FormRequest;

class VolunteerCreateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'max:50'],
            'phone' => ['required','digits:11'],
            'content' => ['sometimes','string','nullable', 'max:1500'],
            'thumbnail' => ['required', 'image','mimes:jpeg,png,jpg','max:4096', 'dimensions:min_width=600,min_height=600'],
            'crop' => ['required','array'],
            'crop.x' => ['required', 'integer'],
            'crop.y' => ['required', 'integer'],
            'crop.width' => ['required', 'integer'],
            'crop.height' => ['required', 'integer'],
            'city_id' => ['required','numeric', 'max:' . City::max('id')],
            'agree' => ['required','accepted'],
        ];
    }

    public function messages(): array
{
    return [
        'crop.*.*' => 'Не верный формат',
    ];
}

        /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        
        $this->merge([
            'phone' => Str::phoneNumber($this->phone),
        ]);
    }

    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        unset($validated['thumbnail']);
        return $validated;
    }
}
