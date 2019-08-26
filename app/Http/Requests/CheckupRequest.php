<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckupRequest extends FormRequest
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
            'date' => 'required|date',
            'altezza' => 'required|numeric',
            'peso' => 'required|numeric',
            'tricipite_R' => 'required|numeric',
            'tricipite_L' => 'required|numeric',
            'petto_R' => 'required|numeric',
            'petto_L' => 'required|numeric',
            'ascella_R' => 'required|numeric',
            'ascella_L' => 'required|numeric',
            'iliaca_R' => 'required|numeric',
            'iliaca_L' => 'required|numeric',
            'addominale_R' => 'required|numeric',
            'addominale_L' => 'required|numeric',
            'coscia_R' => 'required|numeric',
            'coscia_L' => 'required|numeric',
            'spalle' => 'required|numeric',
            'petto' => 'required|numeric',
            'anche' => 'required|numeric',
            'braccio_R' => 'required|numeric',
            'braccio_L' => 'required|numeric',
            'gamba_R' => 'required|numeric',
            'gamba_L' => 'required|numeric',
            'spirometria' => 'required|numeric',
            'massa_grassa' => 'required|numeric',
            'bmi' => 'required|numeric',
            'frq_riposo' => 'required|numeric',
            'frq_stress' => 'required|numeric',
            'frq_1min' => 'required|numeric',
            'step1' => 'required|numeric',
            'step2' => 'required|numeric',
            'step3' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => "Campo Data obbligatorio",
            'altezza.required' => "Campo Altezza obbligatorio",
            'peso.required' => "Campo Peso obbligatorio",
            'tricipite_R.required' => "Campo Tricipite Dx obbligatorio",
            'tricipite_L.required' => "Campo Tricipite Sx obbligatorio",
            'petto_R.required' => "Campo Petto Dx obbligatorio",
            'petto_L.required' => "Campo Petto Sx obbligatorio",
            'ascella_R.required' => "Campo Ascella Dx obbligatorio",
            'ascella_L.required' => "Campo Ascella Sx obbligatorio",
            'iliaca_R.required' => "Campo Iliaca Dx obbligatorio",
            'iliaca_L.required' => "Campo Iliaca Sx obbligatorio",
            'addominale_R.required' => "Campo Addominale Dx obbligatorio",
            'addominale_L.required' => "Campo Addominale Sx obbligatorio",
            'coscia_R.required' => "Campo Coscia Dx obbligatorio",
            'coscia_L.required' => "Campo Coscia Sx obbligatorio",
            'braccio_R.required' => "Campo Braccio Dx obbligatorio",
            'braccio_L.required' => "Campo Braccio Sx obbligatorio",
            'gamba_R.required' => "Campo Gamba Dx obbligatorio",
            'gamba_L.required' => "Campo Gamba Sx obbligatorio",
            'spalle.required' => "Campo Spalle obbligatorio",
            'petto.required' => "Campo Petto obbligatorio",
            'anche.required' => "Campo Anche obbligatorio",
            'spirometria.required' => "Campo Spirometria obbligatorio",
            'frq_riposo.required' => "Campo Frq Riposo obbligatorio",
            'frq_stress.required' => "Campo Frq Stress obbligatorio",
            'frq_1min.required' => "Campo Frq 1 Min obbligatorio",
            'step1.required' => "Campo Step1 obbligatorio",
            'step2.required' => "Campo Step2 obbligatorio",
            'step3.required' => "Campo Step3 obbligatorio",
            'bmi.required' => "Campo BMI obbligatorio",
            'massa_grassa.required' => "Campo Massa Grassa obbligatorio",
        ];
    }
}
