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
            'capacidad' => 'max:2147483647|required|numeric',
            'fecha_de_inicio' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'fecha_de_finalizacion' => 'required|date_format:'.config('app.date_format').' H:i:s',
            'invitado' => 'required|email',
        ];
    }
}
