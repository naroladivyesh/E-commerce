<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    //
    public function index(){
        //Below is for accending order
        // $productsAll = Product::get();

         //Randome Order product
        // $productsAll = Product::inRandomOrder()->get();

        //Bellow is for Decending order
        $productsAll = Product::orderBy('id','DESC')->paginate(6);

        /////////////////////////////////////////////////////////////////////////////////////

        //Get all categories and sub categories
        //it is a simple way 
        //start here
        // $categories = Category::where(['parent_id'=>0])->get();
        // // $categories = json_decode(json_encode($categories));
        // // echo "<pre>"; print_r($categories); die;
        // $categories_menu = "";
        // foreach($categories as $cat)
        // {
        //     // echo $cat->name; echo "<br>";
        //     $categories_menu .= "<div class='panel-heading'>
        //                             <h4 class='panel-title'>
        //                                 <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."' >
        //                                     <span class='badge pull-right'><i class='fa fa-plus'></i></span>
        //                                     ".$cat->name."
        //                                 </a>
        //                             </h4>
        //                         </div>
        //                         <div id='".$cat->id."' class='panel-collapse collapse'>
        //                             <div class='panel-body'>
        //                                 <ul>";
        //                                 $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        //                                 foreach($sub_categories as $subcat)
        //                                 {   
        //                                     // <?php echo $categories_menu; 
                                            
        //                                     // echo $subcat->name; echo "<br>"; 
        //                                     $categories_menu .=  "<li><a href='".$subcat->url."'>".$subcat->name." </a></li>";
        //                                 }                                                                                        
        //                                 $categories_menu .= "</ul>
        //                             </div>
        //                         </div>";
            //     }                     
            //     return view('index')->with(compact('productsAll','categories_menu'));
            // }            
        // End here

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                  
        
      // Advance way to categories to sub categories
      // we need to create hasmany relation in Category Model
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        // $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;
     /* $categories_menu = "";
        foreach($categories as $cat)
        {
            // echo $cat->name; echo "<br>";
            $categories_menu .= "<div class='panel-heading'>
                                    <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."' >
                                            <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                            ".$cat->name."
                                        </a>
                                    </h4>
                                </div>
                                <div id='".$cat->id."' class='panel-collapse collapse'>
                                    <div class='panel-body'>
                                        <ul>";
                                        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                                        foreach($sub_categories as $subcat)
                                        {   
                                            // <?php echo $categories_menu; 
                                            
                                            // echo $subcat->name; echo "<br>"; 
                                            $categories_menu .=  "<li><a href='".$subcat->url."'>".$subcat->name." </a></li>";
                                        }                                                                                        
                                        $categories_menu .= "</ul>
                                    </div>
                                </div>";
            
        } */
        
        return view('index')->with(compact('productsAll','categories'));
    }
}
