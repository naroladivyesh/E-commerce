<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;

/***************************************************************************************************************************
 * Add category 
 * using $data 
 */
class CategoryController extends Controller
{
    //
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }
            // $data1=['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']];
            // $category = Category::create($data1);
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            if(!empty($data['description']))
            {
                $category-> description = $data['description'];
            }else{
                $category-> description = $data[''];
            }
            $category->url = $data['url'];
            $category->status = $status;
            $category->save();
            return redirect('/admin/view-categories')->with('message_success','Category added Successfully...!');
        }

        $levels = Category::where(['parent_id'=>0])->get();

        return view('admin.categories.add_category')->with(compact('levels'));
    }
/****************************************************************************************************************************/
    public function viewCategories(Request $request)
    { 
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
/****************************************************************************************************************************/
    public function editCategory(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data =$request->all();
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }
            Category::where(['id'=>$id])->update(['name'=> $data['category_name'],'description'=>$data['description'],'url'=>$data['url'],'status'=>$status]);
            return redirect('/admin/view-categories')->with('message_success','Category Updated Successfully.');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }
/****************************************************************************************************************************/
    public function deleteCategory($id = null )
    {

        if (!empty($id))
        {
            
            Category::where(['id'=>$id])->delete();
            
            //parent id 0      1.

            //parent id not 0    2.
            
            // foreach($m_cat as $mcatid)
            // {
            //     $s_cat = Category::with('products')->where('category_id',$mcatid->id);
            //         foreach($s_cat as $scatid)
            //         {
            //             $p_cat = Product::with('attributes')->where('product_id',$scatid->id);
            //         }
            // }
            // $m_cat = Category::where(['id'=>$id])->delete();
               
            return redirect()->back()->with('message_success','Category Deleted Successfully.!');
        }
    }

}
