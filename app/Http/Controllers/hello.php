<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class hello extends Controller
{
    public function addcategory(){
        return view('posts.add_category');
       }
       public function home(){
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')->paginate('3');
        return view ('pages.home',compact('post'));
       }

    public function storecategory(Request $request){
         $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
    ]);
        
         $data=array();
         $data['name']=$request->name;
         $data['slug']=$request->slug;
         $category=DB::table('categories')->insert($data);
         if($category){
            $notification=array(
             'message'=>'Successfully Category Inserted',
               'alert-type'=>'success'
                     );
            return redirect()->back()->with($notification);

         } else{
            $notification=array(
             'message'=>'Something Went Wrong!',
               'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);

         }

     }
       public function allcategory(){
         $category=DB::table('categories')->get();
          return view('posts.all_category',compact('category'));
       }
         public function viewcategory($id){
            $category=DB::table('categories')->where('id',$id)->first();
            return view('posts.categoryview')->with('cat',$category);

         }
          public function deletecategory($id){
            $delete=DB::table('categories')->where('id',$id)->delete();
             

            $notification=array(
             'message'=>'Successfully Category Deleted!',
               'alert-type'=>'success'
                 );
            
            return redirect()->back()->with($notification);

             

         }
           public function editcategory($id){
            $category=DB::table('categories')->where('id',$id)->first();
            
          return view('posts.editcategory',compact('category'));
           }
           public function updatecategory(Request $request,$id){
            
             $validatedData = $request->validate([
          'name' => 'required||max:25|min:4',
          'slug' => 'required||max:25|min:4',
           ]);
        
         $data=array();
         $data['name']=$request->name;
         $data['slug']=$request->slug;
         $category=DB::table('categories')->where('id',$id)->update($data);
         if($category){
            $notification=array(
             'message'=>'Successfully Category Updated',
               'alert-type'=>'success'
                     );
            return redirect()->back()->with($notification);

         } else{
            $notification=array(
             'message'=>'Nothing to Updated',
               'alert-type'=>'error'
                 );
            return redirect()->back()->with($notification);

                 }
             }    

 }
