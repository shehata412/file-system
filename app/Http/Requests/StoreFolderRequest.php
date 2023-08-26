<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreFolderRequest extends ParentIdBaseRequest
{
    private mixed $parent_id;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),[
            'name' => ['required'],
            Rule::unique(File::class, 'name')
            ->where('created_by', Auth::id())
            ->where('parent_id', $this->parent_id)
            ->whereNull('deleted_at')

        ]);
    }
    public function messages(){
        return [
            'name.required' => 'Folder name is required',
            'name.unique' => 'Folder name already exists'
        ];
    }
}
