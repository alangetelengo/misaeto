<?php

namespace Modules\Commerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type_produit_id"=>["required"],
            "lib_produit"=>["required","string"],
            "cota"=>["required"],
            "prix_brut"=>["required"],
            "poids"=>["required"],
            "indice_legislatif"=>["required"]
        ];
    }

    public function messages()
    {
        return [
            'type_produit_id.required'=> "Le type de produit est obligatoire",
            'lib_produit.required'=> "Le nom du produit est obligatoire",
            'cota.required'=> "Le cota du produit est obligatoire",
            'prix_brut.required'=> "Le prix brut du produit est obligatoire",
            'poids.required'=> "Le poids du produit est obligatoire",
            'indice_legislatif.required'=> "L'indice législatif du produit est obligatoire"
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
