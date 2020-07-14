<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateTeamRequest.
 */
class UpdateTeamRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|unique:teams,name,'.$this->segment(2),
            'club_state' => 'required|max:191',
            'logo_uri' => 'image|max:2999|mimes:jpeg,jpg,png,gif',
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
            'name.unique'   => 'Team name already exists, please enter a different name.',
        ];
    }
}
