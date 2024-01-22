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
            'thumbnail' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg','max:4096'],
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
        ]);
    }

    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        unset($validated['thumbnail']);
        return $validated;
    }
}
