<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameProduct extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'names' => 'required|string|max:255', 
            'prices' => 'required|numeric|min:0', 
            'descriptions' => 'nullable|string|max:1000', 
            'release_dates' => 'required|date|before:tomorrow', 
            'category_ids' => 'required|integer|exists:categories,id',
            'image_urls' => 'nullable|url', 
            'is_featureds' => 'required|boolean', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do jogo é obrigatório!',

            'price.required' => 'O preço do jogo é obrigatório!',
            'price.numeric' => 'O preço deve ser um valor numérico, de preferência, inteiro.',
            'price.min' => 'O preço não pode ser negativo.',

            'description.max' => 'A descrição do jogo não pode ter mais de 1000 caracteres.',

            'release_date.required' => 'A data de lançamento do jogo é estritamente obrigatória.',
            'release_date.date' => 'A data de lançamento deve ser uma data válida.',
            'release_date.before' => 'A data de lançamento não pode ser uma data no futuro.',

            'category_id.required' => 'O ID da categoria é obrigatório.',
            'category_id.integer' => 'O ID da categoria deve ser um número inteiro.',
            'category_id.exists' => 'A categoria selecionada deve existir.',

            'image_url.url' => 'A URL da imagem deve ser uma URL válida e que tenha a ver, se não, ser o produto em si.',

            'is_featured.required' => 'Você deve informar se o produto é um produto destacado, se ele é bem conhecido ou não.',
            'is_featured.boolean' => 'O campo destacado deve ser verdadeiro ou falso.',
        ];
    }
}
