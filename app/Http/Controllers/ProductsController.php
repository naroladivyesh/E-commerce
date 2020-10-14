<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Auth;
use Image;
use Session;
use App\Category;
use App\Product;
use App\ProductsAttribute;


class ProductsController extends Controller
{
/**
 * /*  *********************************************************************************************************************************
 */
    public function addProduct(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['category_id'])){
                return redirect()->back()->with('message_error','Under Category is missing...! ');
            }
            $product = new Product;
            $product -> category_id = $data['category_id'];
            $product -> product_name = $data['product_name'];
            $product -> product_code = $data['product_code'];
            $product -> product_color = $data['product_color'];
            if(!empty($data['description'])){
                $product -> description = $data['description'];
            }else{
                $product-> description = '';
            }
            $product -> price = $data['price'];

            //Upload Image
            //$product -> image = $data['image'];
            if($request->hasFile('image')){
                //$image_temp = $request->image;
                $image_temp = $request->file('image');
                if($image_temp->isValid()){
                   //Resize Cmage code 
                   $extension = $image_temp->getClientOriginalExtension();
                   $filename = rand(111,99999).'.'.$extension;
                   $large_image_path = 'images/backend_images/products/large/'.$filename;
                   $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                   $small_image_path = 'images/backend_images/products/small/'.$filename;
                   //Resize Images
                   Image::make($image_temp)->save($large_image_path);
                   Image::make($image_temp)->resize(600,600)->save($medium_image_path);
                   Image::make($image_temp)->resize(300,300)->save($small_image_path);

                   //Store Image name in products table
                   $product->image = $filename;
                }
            }
            $product->save();
            //return redirect()->back()->with('message_success','Product has been Added Successfully.!');
            return redirect('/admin/view-products')->with('message_success','Product has been Added Successfully.!');
        }
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp--&nbsp;".$sub_cat->name."</option>";
            }
        }

        //$categories_dropdown = Category::where(['parent_id'=>0])->get();
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }
/**
 * /*  *********************************************************************************************************************************
 */
    public function viewProducts(Request $request)
    {
        $products = Product::get();
        $product = json_decode(json_encode($products));
        //echo "<pre>"; print_r($product); die;        
        foreach($products as $key => $val)
        {
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        //echo "<pre>"; print_r($products); die;
        return view('admin.products.view_products')->with(compact('products'));
    }
/**
 * /*  *********************************************************************************************************************************
 */    
    public function editProduct(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
                
            $data=$request->all();
            if($request->hasFile('image')){
                //$image_temp = $request->image;
                $image_temp = $request->file('image');
                if($image_temp->isValid()){
                   //Resize Cmage code 
                   $extension = $image_temp->getClientOriginalExtension();
                   $filename = rand(111,99999).'.'.$extension;
                   $large_image_path = 'images/backend_images/products/large/'.$filename;
                   $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                   $small_image_path = 'images/backend_images/products/small/'.$filename;
                   //Resize Images
                   Image::make($image_temp)->save($large_image_path);
                   Image::make($image_temp)->resize(600,600)->save($medium_image_path);
                   Image::make($image_temp)->resize(300,300)->save($small_image_path);
            }
            }else{
                $filename = $data['current_image'];
            } 
            if(empty($data['description'])){
                $data['description'] = '';
            }
            Product::where(['id'=>$id])->update(['category_id'=> $data['category_id'],
            'product_name'=> $data['product_name'],'product_code'=> $data['product_code'],
            'product_color'=> $data['product_color'],'description'=>$data['description'],
            'price'=>$data['price'],'image'=>$filename]);
            return redirect('/admin/view-products')->with('message_success','Product Updated Successfully.');
        }
        //get product details
        $productDetails = Product::where(['id'=>$id])->first();
        //start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id ==$productDetails->category_id){ 
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected." >".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                foreach($sub_categories as $sub_cat){
                    if($sub_cat->id ==$productDetails->category_id){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    $categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected." >&nbsp--&nbsp;".$sub_cat->name."</option>";
                }
        }
        
        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }

/**
 * /*  *********************************************************************************************************************************
 */
    public function deleteProductImage(Request $request,$id = null)
    {   
        $abc = Product::find($id);
        $filename = $abc->image;
        $path = 'images/backend_images/products/large/'.$filename;
        $path1 = 'images/backend_images/products/medium/'.$filename;        
        $path2 = 'images/backend_images/products/small/'.$filename;
        
        if(file_exists(public_path($path))){
            unlink(public_path($path));    
        }
        if(file_exists(public_path($path1))){
            unlink(public_path($path1));
        } 
        if(file_exists(public_path($path2))){
            unlink(public_path($path2));
            Product::where(['id'=>$id])->update(['image'=>'']);
        }
            // if(file_exists(public_path($path))) {
            //     unlink(public_path($path));
            //     dd("file deleted");
            // } else {
            //     //Storage::delete($path);
            // dd('File does not exists.');
            // }
         

        return redirect()->back()->with('message_success','Product Image has been Deleted Successfully/!');
    }


 /**
 * /*  *********************************************************************************************************************************
 */
    public function deleteProduct($id = null)
    {
        // Product::where(['id'=>$id])->delete();
        $abc = Product::find($id);
        $filename = $abc->image;
       
        $path = 'images/backend_images/products/large/'.$filename;
        $path1 = 'images/backend_images/products/medium/'.$filename;        
        $path2 = 'images/backend_images/products/small/'.$filename;
        
        
        if(file_exists(public_path($path))){
            unlink(public_path($path));    
        }
        if(file_exists(public_path($path1))){
            unlink(public_path($path1));
        } 
        if(file_exists(public_path($path2))){
            unlink(public_path($path2));
            
        }
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('message_success','Product has been Deleted Successfully.!');
    }


/**
 * /*  *********************************************************************************************************************************
 */
    public function ShowAllProduct()
    {
        $products = Product::get();
        //$category = Category::get();
        // echo "<pre>"; print_r($products);
        foreach($products as $key => $val)
        {
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        return view('all_product')->with(compact('products'));

    }


/**
 * /*  *********************************************************************************************************************************
 */
    public function addAttributes(Request $request, $id = null )
    {
       $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
       $productDetails = json_decode(json_encode($productDetails));
       // echo "<pre>"; print_r($productDetails); die; 
       if($request->isMethod('post'))
       {
           $data = $request->all();
            //echo "<pre>"; print_r($data); die; 
            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('/admin/add-attributes/'.$id)->with('message_success','Product Attributes has been added Successfully.!');


        // echo "<pre>"; print_r($data); die; 
       }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }


/**
 * /*  *********************************************************************************************************************************
 */
    public function deleteAttributes($id = null )
    {
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('message_success','Product Attributes has been Deleted Successfully.!');
    }


/**
 * /*  *********************************************************************************************************************************
 */
    public function products($url = null)
    {
        // Show 404 page if category URL dows not exist
        $countCategory = Category::where(['url'=>$url,'status'=>1])->count();
        // echo $countCategory; die;
        if($countCategory==0)
        {
            abort(404);
        }

        // echo $url; die;
        // get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['url'=>$url])->first();
        // echo $categoryDetails->id;

        if($categoryDetails->parent_id==0){
            //if url is main category url
            $sub_categories = Category::where(['parent_id'=>$categoryDetails->id])->get();
           
            foreach($sub_categories as $key => $subcat)
            {
                $cat_ids[] = $subcat->id;
            }
            //print_r($cat_ids); die;
            $productsAll = Product::whereIn('category_id',$cat_ids)->paginate(6);
            // $productsAll = json_decode(json_encode($productsAll));
            // echo "<pre>"; print_r($productsAll); die;
            //echo $cat_ids; die;
        }else{
            //If url is sub category url
            $productsAll = Product::where(['category_id' => $categoryDetails->id])->paginate(6);
        }        
        
        return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
    }


/**
 * /*  *********************************************************************************************************************************
 */
    public function product($id = null)
    {
        //$productDetails = Product::where('id',$id)->first();
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        // $productDetails = json_decode(json_encode($productDetails));
        // echo "<pre>"; print_r($productDetails); die;
        // get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();


        return view('products.detail')->with(compact('productDetails','categories'));
    }


/**
 * /*  *********************************************************************************************************************************
 */    
    public function getProductPrice(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        $proArr = explode("-",$data['idSize']);
        //echo $proArr[0]; echo $proArr[1]; die;
        $proArr = ProductAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        $abc= $proArr->price;
        return response()->json($abc);
    }

}
