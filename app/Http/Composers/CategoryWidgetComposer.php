<?php
namespace App\Http\Composers;

use App\Category;
use Illuminate\Contracts\View\View;

class CategoryWidgetComposer{
    
    public function compose(View $view){
        $categories = Category::get();
        $view->with('categories', $categories);
    }

    
}


