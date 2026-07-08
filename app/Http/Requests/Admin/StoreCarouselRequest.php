<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarouselRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Judul carousel wajib diisi',
            'title.string' => 'Judul harus berupa teks',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'link.string' => 'Link harus berupa teks',
            'link.max' => 'Link tidak boleh lebih dari 255 karakter',
        ];
    }
}
