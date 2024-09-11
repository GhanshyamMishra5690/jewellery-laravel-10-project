<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:rings,name',
            'shape' => 'required|string|max:255',
            'metal_type' => 'required|string|max:255',
            'setting_style' => 'required|string|max:255',
            'band_type' => 'required|string|max:255',
            'setting_profile' => 'required|string|max:255',
            'setting_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'setting_description' => 'nullable|string',
            'stoneType' => 'required|string',
            'stone_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        switch ($this->stoneType) {
            case 'lab-grown-diamond':
                $rules = array_merge($rules, [
                    'stone_shape_type' => 'required|string|max:255',
                    'stone_carat' => 'required|numeric',
                    'stone_price' => 'required|numeric',
                    'stone_cut' => 'required|string|max:255',
                    'stone_clarity' => 'required|string|max:255',
                    'stone_depth' => 'required|numeric',
                    'stone_table' => 'required|numeric',
                    'stone_ratio' => 'required|numeric'
                ]);
                break;

            case 'coloured-lab-grown-diamond':
                $rules = array_merge($rules, [
                    'stone_shape_type' => 'required|string|max:255',
                    'stone_color' => 'required|string|max:255',
                    'stone_clarity' => 'required|string|max:255'
                ]);
                break;

            case 'moissanite':
                $rules = array_merge($rules, [
                    'stone_shape_type' => 'required|string|max:255',
                    'stone_color' => 'required|string|max:255'
                ]);
                break;

            case 'sapphire':
                $rules = array_merge($rules, [
                    'stone_shape_type' => 'required|string|max:255',
                    'stone_color' => 'required|string|max:255'
                ]);
                break;
        }

        return $rules;
    }
}
