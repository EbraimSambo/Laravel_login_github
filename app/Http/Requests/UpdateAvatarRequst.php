<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvatarRequst extends FormRequest
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
        return [
            [
                'avatar'=>'required|image'
            ],[
                'avatar.required'=>'Não selecionou uma imagem',
                'avatar.image'=>'Tens de selecionar um arquivo: png, jpg, jpeg ou svg'
            ]
        ];
    }
}
