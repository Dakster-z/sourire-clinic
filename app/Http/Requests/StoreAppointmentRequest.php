<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            // Honeypot anti-spam : si ce champ caché est rempli, c'est un bot
            'website_hp' => ['nullable', 'max:0'],
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'phone' => ['required', 'string', 'min:8', 'max:25'],
            'email' => ['nullable', 'email', 'max:120'],
            'treatment' => ['required', 'string', 'in:soins_generaux,detartrage,blanchiment,orthodontie,urgence'],
            'preferred_slot' => ['required', 'string', 'in:matin,apres_midi,fin_journee,urgence_immediat'],
            'preferred_date' => ['nullable', 'date'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Messages personnalisés en français pour une expérience fluide et rassurante.
     */
    public function messages(): array
    {
        return [
            'website_hp.max' => 'Activité suspecte détectée.',
            'name.required' => 'Veuillez renseigner votre nom complet.',
            'name.min' => 'Le nom doit comporter au moins 2 caractères.',
            'phone.required' => 'Le numéro de téléphone est obligatoire pour confirmer votre créneau.',
            'phone.min' => 'Le numéro de téléphone semble incomplet.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'treatment.required' => 'Veuillez sélectionner le type de soin souhaité.',
            'treatment.in' => 'Le soin sélectionné est invalide.',
            'preferred_slot.required' => 'Veuillez indiquer votre préférence horaire.',
            'preferred_slot.in' => 'La préférence horaire sélectionnée est invalide.',
            'message.max' => 'Votre message ne peut excéder 1000 caractères.',
        ];
    }
}
