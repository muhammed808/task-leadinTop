<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();  // get all categories from DB

        $rootCategories= $categories->whereNull('main_category_id'); // get all main categories

        $this->fillCategroyRecursion($rootCategories,$categories); // recursion function to fill supcategories

        return view('categories',['rootCategories' => $rootCategories ]) ;

    }

    public function fillCategroyRecursion($rootCategories,$categories)
    {
        foreach($rootCategories as $rootCategory ){

            $rootCategory->children = $categories->where('main_category_id',$rootCategory->id)->values(); 

            if($rootCategory->children->isNotEmpty()){ // condition for stop recursion

                $this->fillCategroyRecursion($rootCategory->children,$categories);
            }

        }
    } 
}
