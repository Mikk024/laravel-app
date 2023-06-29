<?php

namespace App\Http\Requests;

use App\Enums\CarBody;
use App\Enums\CarFuel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'make_id' => ['required'],
            'model_id' => ['required'],
            'fuel' => ['required', 'string', Rule::in(CarFuel::getValues())],
            'year' => ['required', 'integer'],
            'body' => ['required', 'string', Rule::in(CarBody::getValues())],
            'horsepower' => ['required', 'integer'],
            'capacity' => ['required', 'integer'],
            'doors' => ['required', 'integer','between:1,7'],
            'color' => ['required', 'string'],
            'transmission' => ['required', 'string', Rule::in(['Automatic', 'Manual'])],
            'images.*' => ['image', 'mimes:png,jpg,webp,jpeg']
        ];
    }
}
