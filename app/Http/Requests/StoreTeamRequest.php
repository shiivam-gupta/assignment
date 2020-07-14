<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class StoreTeamRequest.
 */
class StoreTeamRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|unique:teams',
            'club_state' => 'required|max:191',
            'logo_uri' => 'required|image|max:2999|mimes:jpeg,jpg,png,gif',
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
