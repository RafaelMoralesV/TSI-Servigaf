<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommitTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token_ws' => 'required_if:TBK_TOKEN,null|string',
            'TBK_TOKEN' => 'required_if:token_ws,null|string',
            'TBK_ORDEN_COMPRA' => 'required_if:token_ws,null',
            'TBK_ID_SESION' => 'required_if:token_ws,null',
        ];
    }
}
