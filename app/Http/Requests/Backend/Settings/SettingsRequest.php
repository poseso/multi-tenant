<?php

namespace App\Http\Requests\Backend\Settings;

use Route;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed settings
 */
class SettingsRequest extends FormRequest
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
        switch (Route::currentRouteName()) {
            case 'admin.settings.general.patch':{
                return [
                    'settings.company_name' => 'required',
                    'settings.company_contact' => 'required',
                    'settings.company_address' => 'required',
                    'settings.company_country' => 'required',
                    'settings.company_city' => 'required',
                    'settings.company_province' => 'required',
                    'settings.company_phone' => 'required',
                    'settings.company_email' => 'required',
                    'settings.company_document' => 'required',
                ];
            }

            default:return [];
        }
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'settings.company_name.required' => __('Debe insertar el nombre de su empresa.'),
            'settings.company_contact.required' => __('Debe insertar el nombre de contacto para su empresa.'),
            'settings.company_address.required' => __('Debe insertar la dirección de su empresa.'),
            'settings.company_country.required' => __('Debe insertar el país de su empresa.'),
            'settings.company_city.required' => __('Debe insertar la ciudad de su empresa.'),
            'settings.company_province.required' => __('Debe insertar el estado de su empresa.'),
            'settings.company_phone.required' => __('Debe insertar el teléfono de su empresa.'),
            'settings.company_email.required' => __('Debe insertar el correo de su empresa.'),
            'settings.company_domain.required' => __('Debe insertar el dominio de su empresa.'),
            'settings.company_document.required' => __('Debe insertar el RNC o Cédula de su empresa.'),
        ];
    }
}
