<?php

namespace Modules\Commerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandeClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_client'=> ["required","string"],
            'sexe_client'=> ["required","string"],
            'telephone_client'=> ["required"],
            'produit_id'=> ["required"],
            'nombre_produit'=> ["required"],
            'date_commande'=> ["required"],
            'commande_confirmer'=> ["required"]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
