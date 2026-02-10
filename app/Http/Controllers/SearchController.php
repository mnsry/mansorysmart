<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Field;
use App\Models\File;

class SearchController extends Controller
{
    public function search()
    {
        return view('search.index');
    }

    public function searchSelect()
    {
        $category_select = Category::find( request('category_id') );

        return view('search.select', [
            'category_select' => $category_select,
        ]);
    }

    public function searchShowFields()
    {
        $category_select = Category::find( request('category_id') );

        return view('search.showFields', [
            'category_select' => $category_select,
        ]);
    }

    public function searchSelectField()
    {
        $category_select = Category::find( request('category_id') );
        $field_select = Field::find( request('field_id') );

        return view('search.selectField', [
            'category_select' => $category_select,
            'field' => $field_select,
        ]);
    }

    public function searchFind(Request $request)
    {
        $category_select = Category::find( request('category_id') );
        $field_select = Field::find( request('field_id') );
        if ($field_select->form == 'NUMBER'){

            $files = $category_select->files()->where($field_select->slug = 2800)->get();
            return view('search.find', [
                'category_select' => $category_select,
                'field' => $field_select,
                'files' => $files,
            ]);
        }
        if ($field_select->form == 'SELECT' ||
            $field_select->form == 'MULTISELECT' ||
            $field_select->form == 'CHECKBOX' ||
            $field_select->form == 'MULTICHECKBOX')
        {

            $files = File::orderBy('id', 'DESC')->get();
            return view('search.find', [
                'category_select' => $category_select,
                'field' => $field_select,
                'files' => $files,
            ]);
        }
        return view('search.error', [
            'category_select' => $category_select,
            'field' => $field_select,
        ]);
    }
}
