<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservacionsRequest extends FormRequest
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
            'nombre_de_reunion' => 'required',
            'sala_de_juntas' => 'required',
            'hora_duracion' => 'max:2147483647|required|numeric',
            'minuto_duracion' => 'max:2147483647|required|numeric',
        ];
    }
}
