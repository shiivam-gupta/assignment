<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdatePlayerRequest.
 */
class UpdatePlayerRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|max:191',
            'lastname' => 'required|max:191',
            'jersey_number' => 'required|numeric|digits_between:1,5',
            'country' => 'required|max:191',
            'matches' => 'required|max:191|digits_between:1,5',
            'runs' => 'required|max:191|digits_between:1,10',
            'highest_score' => 'required|max:191|digits_between:1,5',
            'total_fifties' => 'required|max:191|digits_between:1,5',
            'total_hundreds' => 'required|max:191|digits_between:1,5',
            'image_uri' => 'image|max:2999|mimes:jpeg,jpg,png,gif',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            
        ];
    }
}
