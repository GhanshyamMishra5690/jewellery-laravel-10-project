<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJewelleryRequest extends FormRequest
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
            'category_id' => 'required',
            'product_id' => 'required|unique:jewelleries,product_id',
            'name' => 'required|string|max:255', 
            'description' => 'required|string',
            'price' => 'required|numeric',
            'gender' => 'required',
            'gross_weight' => 'required|string',
            // 'size' => 'required|string',
            'occasion' => 'required|string|max:255',
            'material_color' => 'required|string|max:255',
            'jewellery_type' => 'required|string|max:255',
            'diamond_clarity' => 'required|string|max:255',
            'diamond_color' => 'required|string|max:255',
            'diamond_weight' => 'required',
            'no_of_diamonds' => 'required|integer|min:1',
            'diamond_shape' => 'required|string|max:255',
            'diamond_setting' => 'required|string|max:255',
            'diamond_price' => 'required|numeric',
            'metal' => 'required|string|max:255',
            'gold_purity' => 'required', // Assuming gold purity between 1-24 Karat
            'gold_price_per_gram' => 'required|numeric',
            'gold_weight_in_gm' => 'required|numeric',
            'making_charge' => 'required|numeric',
            'gst' => 'required|numeric',
            'product_images' => 'required', 
        ];
        $this->addConditionalRules($rules);
       
        return $rules;
    }

    protected function addConditionalRules(&$rules)
    {
        // Add the 'size' validation rule if 'size' is present in the request
        if ($this->has('size') && $this->input('size')) {
            $rules['size'] = 'required|string';
        }

        // Add 'pendant_width' and 'pendant_height' rules if they are present
        if ($this->has('pendant_width') && $this->input('pendant_width')) {
            $rules['pendant_width'] = 'required|numeric';
        }

        if ($this->has('pendant_height') && $this->input('pendant_height')) {
            $rules['pendant_height'] = 'required|numeric';
        }

        // Add rules for 'earring_width' and 'earring_height'
        if ($this->has('earring_width') && $this->input('earring_width')) {
            $rules['earring_width'] = 'required|numeric';
        }

        if ($this->has('earring_height') && $this->input('earring_height')) {
            $rules['earring_height'] = 'required|numeric';
        }

        // Add rules for 'watch_width' and 'watch_height'
        if ($this->has('watch_width') && $this->input('watch_width')) {
            $rules['watch_width'] = 'required|numeric';
        }

        if ($this->has('watch_height') && $this->input('watch_height')) {
            $rules['watch_height'] = 'required|numeric';
        }

        // If 'nothing_extra' is present, apply its validation rule
        if ($this->has('nothing_extra') && $this->input('nothing_extra')) {
            $rules['nothing_extra'] = 'required|string';
        }
    }

    public function messages()
    {
        return [
            'category_id.required' => 'This field is required.',
            'product_id.required' => 'This field is required.',
            'name.required' => 'This field is required.', 
            'description.required' => 'This field is required.',
            'price.required' => 'This field is required.',
            'gender.required' => 'This field is required.',
            'gross_weight.required' => 'This field is required.',
            'occasion.required' => 'This field is required.',
            'material_color.required' => 'This field is required.',
            'jewellery_type.required' => 'This field is required.',
            'diamond_clarity.required' => 'This field is required.',
            'diamond_color.required' => 'This field is required.',
            'diamond_weight.required' => 'This field is required.',
            'no_of_diamonds.required' => 'This field is required.',
            'diamond_shape.required' => 'This field is required.',
            'diamond_setting.required' => 'This field is required.',
            'diamond_price.required' => 'This field is required.',
            'metal.required' => 'This field is required.',
            'gold_purity.required' => 'This field is required.',
            'gold_price_per_gram.required' => 'This field is required.',
            'gold_weight_in_gm.required' => 'This field is required.',
            'making_charge.required' => 'This field is required.',
            'gst.required' => 'This field is required.',  
            'product_images.required' => 'This field is required.', 
        ];
    }
}
