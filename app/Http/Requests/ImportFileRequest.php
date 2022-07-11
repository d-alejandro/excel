<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'import_file' => 'required|file|mimes:xls,xlsx|max:512',
        ];
    }
}
