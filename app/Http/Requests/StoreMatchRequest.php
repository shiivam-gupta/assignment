<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class StoreMatchRequest.
 */
class StoreMatchRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_team_id' => 'required',
            'second_team_id' => 'required|different:first_team_id',
            'result' => 'required',
            'winner_team_id' => 'required_if:result,==,1',
            'scheduled_date' => 'required|date|date_format:m/d/Y|before:today',
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
            "first_team_id.required" => "Please select first team.",
            "second_team_id.required" => "Please select first team.",
            "second_team_id.different" => "The second team and first team must be different.",
            "result.different" => "Please select result team.",
            "winner_team_id.required_if" => "Please select winner.",
        ];
    }
}
