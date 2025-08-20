<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name'        => 'required|string|max:255',
          'role'        => 'required|in:student,parent,personal',
          'group_count' => 'required|integer|min:1',
          'courses'     => 'array',
          'courses.*'   => 'exists:courses,id',
        ];
    }
}
