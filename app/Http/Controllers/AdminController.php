<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Browser;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tagpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\New_;
use Session;

class AdminController extends Controller
{

    public function dashboard(){
        $post_count = Post::count();
        $category_count = Category::count();
        $user_count = User::count();
        $author_count = Author::count();
        $all_browser = Browser::all();
        $all_post = Post::orderBy('read_count','desc')->take(5)->get();
        return view('admin.index', compact('post_count','category_count','user_count','author_count', 'all_browser','all_post'));
    }
    public function category(){

        $count_data  = Category::all()->count();
        $all_category = Category::all()->sortByDesc('created_at');
        $all_post = Post::all();
        return view('admin.Category', ['all_category'=>$all_category], compact('count_data','all_post'));

    }
    public function add_category(){
        return view('admin.AddCategory');

    }
    public function author(){
        $count_data  = Author::all()->count();
        $all_author = Author::all();
        return view('admin.Author',['all_author'=>$all_author], compact('count_data'));
    }
    public function add_author(){
        return view('admin.AddAuthor');

    }
   
    public function create_category(Request $request){
        
        $request->validate([
            'category_name' => 'required|unique:categories,name',
            'description' => 'required'
        ]);

        $category_name = $request->input('category_name');
        $description = $request->input('description');
        $slug = Str::of($category_name)->slug('-');
        $post_count = 0;

        $category = new Category();
        $category->name = $category_name;
        $category->description = $description;
        $category->slug = $slug;
        $category->post_count = $post_count;
        $category->save();
        //Session::flash('success', 'Category Added Successfully');
        return redirect()->back()->with('success', 'Category Created Successfully');

    }

    public function create_author(Request $request){
        $request->validate([
            'author_name' => 'required',
            'image' => 'required'
        ]);

        $name = $request->input('author_name');
        $description = $request->input('author_description');

        
        //image
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $author = new Author();
        $author->name = $name;
        $author->description = $description;
        $author->image = $image;
        $author->save();

        return redirect()->back()->with('success','New Author Added Successfully');
    }
    public function edit_category($id){
        $category_data = Category::where('id',$id)->first();
        $category_id =  $category_data->id;
        $category_name =  $category_data->name;
        $category_description = $category_data->description;
        //return $category_description;
        return view('admin.EditCategory',compact('category_name','category_description','category_id'));

    }
    public function edit_author($id){
        $author_data = Author::where('id',$id)->first();
        $author_name = $author_data->name;
        $image = $author_data->image;
        $description = $author_data->description;
        return view('admin.EditAuthor',compact('author_name','image','description','id'));
    }
    public function post_edit_category(Request $request){

        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required'
        ]);

        $present_category_name = $request->input('present_category_name');
        $category_name = $request->input('category_name');

        if($present_category_name == $category_name)
        {
            $category_id = $request->input('category_id');
            $category_description = $request->input('category_description');
            $edit_category = Category::find($category_id);
            $edit_category->description = $category_description;
            $edit_category->save();
            return redirect('/admin/category')->with('success','Category Data Updated');

        }else{

        }
        $category_count = Category::where('name',$category_name)->count();

        if($category_count == 0)
        {
            $category_id = $request->input('category_id');
        
            $category_description = $request->input('category_description');
           
            $slug = Str::of($category_name)->slug('-');
            
            $edit_category = Category::find($category_id);
    
            $edit_category->name = $category_name;
            $edit_category->description = $category_description;
            $edit_category->slug = $slug;
            $edit_category->save();
            return redirect('/admin/category')->with('success','Category Data Updated');

        }else{
            return redirect()->back()->with('error', 'This Category Already Used');
        }

       
        

       
    }

    public function post_edit_author(Request $request){
        $request->validate([
            'author_name' => 'required'
        ]);

        $name = $request->input('author_name');
        $description = $request->input('author_description');
        $author_id = $request->input('author_id');

        
        //image
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $author_data = Author::find($author_id);

        if($image==null){
            
            $author_data->name = $name;
            $author_data->description = $description;
            $author_data->save();
            return redirect('/admin/author')->with('success','Author Updated');

        }else{
            
            $author_data->name = $name;
            $author_data->description = $description;
            $author_data->image = $image;
            $author_data->save();
            return redirect('/admin/author')->with('success','Author Updated');

        }

        

    }

    public function delete_category($id){
        $delete_category = Category::where('id',$id)->delete();
        return redirect()->back()->with('error','Category Deleted Successfully');
    }

    public function delete_author($id){
        $delete_author = Author::where('id',$id)->delete();
        return redirect()->back()->with('error','Category Deleted Successfully');
        
    }

    public function tag(){
        $count_data = Tag::all()->count();
        $all_tag = Tag::all();
        $all_post_tag = Tagpost::all();

        return view('admin.tag', compact('count_data','all_tag'));
    }

    public function add_tag(){
        return view('admin.CreateTag');
    }

    public function create_tag(Request $request){
      

        $request->validate([
            'tag_name' => 'required|unique:tags,name',
            'tag_description' => 'required'
        ]);


        $tag_name = $request->input('tag_name');
        $tag_description = $request->input('tag_description');
        
        $slug = Str::of($tag_name)->slug('-');
        $post_count = 0;

        $tag = new Tag();
        $tag->name = $tag_name;
        $tag->description = $tag_description;
        $tag->slug = $slug;
        $tag->post_count = $post_count;
        $tag->save();
        return redirect()->back()->with('success','New Tag Added Successfully');

    }

    public function edit_tag($id)
    {
        $tag_data = Tag::where('id',$id)->first();
        $tag_id =  $tag_data->id;
        $tag_name =  $tag_data->name;
        $tag_description = $tag_data->description;
        //return $category_description;
        return view('admin.EditTag',compact('tag_name','tag_description','tag_id'));
       
    }

    public function post_edit_tag(Request $request){
        $request->validate([
            'tag_name' => 'required',
            'tag_description' => 'required'
        ]);

        $tag_id = $request->input('tag_id');
        $tag_name = $request->input('tag_name');
        $tag_description = $request->input('tag_description');
       
        $slug = Str::of($tag_name)->slug('-');
        
        $edit_tag = Tag::where('id',$tag_id)->first();

        $edit_tag->name = $tag_name;
        $edit_tag->description = $tag_description;
        $edit_tag->slug = $slug;
        $edit_tag->save();
        return redirect('/admin/tag')->with('success','New Tag Added');
        
    }

    public function delete_tag($id){
        $delete_tag = Tag::where('id',$id)->delete();
        return redirect()->back()->with('success','Tag Deleted Successfully');
    }

    public function post(){
       
        $count_data = Post::all()->count();
        $all_post = Post::all()->sortByDesc('created_at');
        $user_data = User::all();
        $category_data = Category::all();
        $all_tag = Tag::all();
        $all_tag_post = Tagpost::all();
        $all_author = Author::all();
        return view('admin.Post', compact('count_data','all_post','user_data','category_data','all_tag','all_tag_post'));
    }

    public function add_post()
    {
        $category_data = Category::all();
        $tag_data = Tag::all();
        $all_author = Author::all();
        return view('admin.AddPost',compact('category_data','tag_data','all_author'));
    }

    public function create_post(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,title',
            'category' => 'required',
            'image' => 'required',
            'post_description' => 'required',
            'author_name' => 'required',
            'permalink' => 'required'
        ]);

        $read_count = 0;
        $post_title = $request->input('post_title');
        $category_id = $request->input('category');
        $description = $request->input('post_description');
        $posting_date = $request->input('posting_date');
        $author_name = $request->input('author_name');
        $permalink = $request->input('permalink');
        $featured = $request->input('featured');

        $permalink = Str::of($permalink)->slug('-');
        
    
        $slug = Str::of($post_title)->slug('-');
        
        $user_id = Auth()->user()->id;
        $published_date = Carbon::now();
        
        
        //image
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $post_data = new Post();
        $post_data->title = $post_title;
        $post_data->category_id = $category_id;
        $post_data->description = $description;
        $post_data->slug = $slug;
        $post_data->image = $image;
        $post_data->user_id = $user_id;
        $post_data->published_date = $published_date;
        $post_data->posting_date = $posting_date;
        $post_data->author_name = $author_name;
        $post_data->permalink = $permalink;
        $post_data->featured = $featured;
        $post_data->read_count = $read_count;
        $post_data->save();



        //post id found
        $post_data = Post::orderBy('created_at','desc')->first();
        $post_id = $post_data->id;

        $tag = $request->input('tag');
        $tag_count = count($tag);
    
        for($i=0; $i<$tag_count; $i++)
        {
            
            $tag_data = new Tagpost();
            $tag_data->post_title = $post_title;
            $tag_data->post_id = $post_id;
            $tag_data->tag_id = $tag[$i];
            $tag_data->save();


            //
            $tag_post_count = Tagpost::where('tag_id',$tag[$i])->count();
            $tag_find = Tag::find($tag[$i]);
            $tag_find->post_count = $tag_post_count;
            $tag_find->save();

        }

        $category_count = Post::where('category_id',$category_id)->count();
        $category_find = Category::find($category_id);
        $category_find->post_count = $category_count;
        $category_find->save();


          //Tag System
          $all_tag = Tag::all();
          $all_post_tag = Tagpost::all();
 
          foreach($all_tag as $item){
             $tag_id = $item->id;
 
             foreach($all_post_tag as $value){
                 $post_tag_id = $value->tag_id;
 
                 if($post_tag_id == $tag_id)
                 {
                     $tag_post_count = Tagpost::where('tag_id', $post_tag_id)->count();
 
                     $insert_tag = Tag::find($tag_id);
                     $insert_tag->post_count = $tag_post_count;
                     $insert_tag->save();
                     
                 }
             }
 
         }

        return redirect()->back()->with('success', 'New Post Added Successfully');

    }

    public function edit_post($id)
    {
       
        $category_data = Category::all();
        $tag_data = Tag::all();
        $post_data = Post::where('id',$id)->first();
        $post_title = $post_data->title;
        $category_id = $post_data->category_id;
        $post_description = $post_data->description;
        $post_image = $post_data->image;
        $author_name = $post_data->author_name;
        $posting_date = $post_data->posting_date;
        $permalink = $post_data->permalink;
        $featured = $post_data->featured;
        

        $all_author = Author::all();

        $tag_post_data = Tagpost::where('post_title',$post_title)->get();
        
        return view('admin.EditPost', compact('id','category_data','tag_data','post_title','category_id','post_description','post_image','tag_post_data','all_author','author_name','posting_date','permalink','featured'));
    }

    public function edit_post_data(Request $request)
    {

        $request->validate([
            'post_title' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'permalink' => 'required',
            
            'post_description' => 'required'
        ]);

        $post_id = $request->input('post_id');
        
        $post_title = $request->input('post_title');
        $featured = $request->input('featured');
        
        
        $category_id = $request->input('category');
        $description = $request->input('post_description');
        $image = $request->input('image');
        $author_name = $request->input('author_name');
        $posting_date = $request->input('posting_date');
        $permalink = $request->input('permalink');

        $permalink = Str::of($permalink)->slug('-');

        $slug = Str::of($post_title)->slug('-');
        
        $user_id = Auth()->user()->id;
        $published_date = Carbon::now();

        
        

       


        //image
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }


        if($image==null){
            $post_data = Post::find($post_id); 
            $post_data->title = $post_title;
            $post_data->category_id = $category_id;
            $post_data->description = $description;
            $post_data->slug = $slug;
            $post_data->user_id = $user_id;
            $post_data->published_date = $published_date;
            $post_data->posting_date = $posting_date;
            $post_data->author_name = $author_name;
            $post_data->permalink = $permalink;
            $post_data->featured = $featured;
            $post_data->save();

        }else{
            $post_data = Post::find($post_id); 
            $post_data->title = $post_title;
            $post_data->category_id = $category_id;
            $post_data->description = $description;
            $post_data->slug = $slug;
            $post_data->image = $image;
            $post_data->user_id = $user_id;
            $post_data->published_date = $published_date;
            $post_data->posting_date = $posting_date;
            $post_data->author_name = $author_name;
            $post_data->permalink = $permalink;
            $post_data->featured = $featured;
            $post_data->save();

        }




        $tag = $request->input('tag');

        //Erase all specific Tag Data
        $tagpost_data = Tagpost::where('post_title',$post_title)->delete();
    
        $tag_count = count($tag);

       

       

         //post id found
         //$post_data = Post::orderBy('created_at','desc')->first();
         //$post_id = $post_data->id;

      
        
     
         for($i=0; $i<$tag_count; $i++)
         {
             
             $tag_data = new Tagpost();
             $tag_data->post_id = $post_id;
             $tag_data->post_title = $post_title;
             $tag_data->tag_id = $tag[$i];
             $tag_data->save();

             //

             
           
            
            $tag_post_count = Tagpost::where('tag_id',$tag[$i])->where('post_id',$post_id)->count();
            $tag_find = Tag::find($tag[$i]);
            $tag_find->post_count = $tag_post_count;
            $tag_find->post_id = $post_id;
            $tag_find->save();
             
         }




         //Tag System
         $all_tag = Tag::all();
         $all_post_tag = Tagpost::all();

         foreach($all_tag as $item){
            $tag_id = $item->id;

            foreach($all_post_tag as $value){
                $post_tag_id = $value->tag_id;

                if($post_tag_id == $tag_id)
                {
                    $tag_post_count = Tagpost::where('tag_id', $post_tag_id)->count();

                    $insert_tag = Tag::find($tag_id);
                    $insert_tag->post_count = $tag_post_count;
                    $insert_tag->save();
                    
                }
            }

        }


        return redirect('/admin/post')->with('success', 'Post Edited Successfully');
        

    }

    public function delete_post($id)
    {
        
        $target_data = Post::where('id',$id)->first();
        $category_id = $target_data->category_id;
        
        $category_count = Post::where('category_id',$category_id)->count();
        $category_count = $category_count-1;
        $category_find = Category::find($category_id);
        $category_find->post_count = $category_count;
        $category_find->save();

        //tag_post Delete
        $find_tag_post = Tagpost::where('post_id',$id)->get();
        foreach($find_tag_post as $item){
            $tag_post_id = $item->id;
            $delete_data = Tagpost::where('id',$tag_post_id)->delete();
        }

        $delete_data = Post::where('id',$id)->delete();
        return redirect()->back()->with('success','One Post Item Deleted Successfully');
    }

    public function view_post($id)
    {
        $post_data = Post::where('id',$id)->first();
        $image = $post_data->image;
        $post_title = $post_data->title;
        $category_id = $post_data->category_id;
        $user_id = $post_data->user_id;
        $description = $post_data->description;
        $author_name = $post_data->author_name;
        $posting_date = $post_data->posting_date;
        $permalink = $post_data->permalink;
        

        $category_data = Category::where('id',$category_id)->first();
        $category_name = $category_data->name;

        $user_data = User::where('id',$user_id)->first();
       // $user_name = $user_data->name;

        $tagpost_data = TagPost::where('post_id',$id)->get();
        
        
        $all_tag = Tag::all();
       
        return view('admin.ViewPost', ['tagpost_data' => $tagpost_data,'all_tag' => $all_tag], compact('image','post_title','category_name','description','author_name','posting_date','permalink'));
    }

    public function newsletter(){
        $count_data = Newsletter::count();
        $all_newsletter = Newsletter::all();
        return view('admin.news',compact('count_data','all_newsletter'));
    }

    public function delete_newsletter($id){
        $delete_newsletter = Newsletter::where('id',$id)->delete();
        return redirect()->back()->with('success', 'One Item Newsletter Delete Successfully');
    }

    public function send_mail(){
        return view('admin.sendmail');
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }

    public function profile(){
        $session_email = session()->get('email');
        $collect_data = User::where('email',$session_email)->first();
        $email = $collect_data->email;
        $name = $collect_data->name;
        $first_name = $collect_data->first_name;
        $last_name = $collect_data->last_name;
        $bio = $collect_data->bio;
        $id = $collect_data->id;
        $image = $collect_data->image;
        
        return view('admin.profile', compact('email','name','first_name','last_name','bio', 'id', 'image'));
    }

    public function profile_post(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'email' => 'required',
        ]);

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $user_name = $request->input('user_name');
        $email = $request->input('email');
        $bio = $request->input('bio');
        $id = $request->input('id');

        if($email==null){
            $update_user = User::find($id);
            $update_user->first_name = $first_name;
            $update_user->last_name = $last_name;
            $update_user->name = $user_name;
            $update_user->email = $email;
            $update_user->bio = $bio;
            $update_user->save();
            return redirect()->back()->with('success','Your Profile Updated Successfully');

        }else{
            $update_user = User::find($id);
            $update_user->first_name = $first_name;
            $update_user->last_name = $last_name;
            $update_user->name = $user_name;
            $update_user->email = $email;
            $update_user->bio = $bio;
            $update_user->save();
            return redirect('/login')->with('success','Your Profile Updated Successfully');
        }

       
    }

    public function change_password(Request $request){

        $request->validate([
            'password' => 'required',
            'cpassword' => 'required',
        ]);
        
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');
        $id = $request->input('id');

        $length_password = strlen($password);
        if($length_password > 7){

            if($password == $cpassword){

                $password = md5($password);

                $update_data = User::find($id);
                $update_data->password = $password;
                $update_data->save();

                return redirect()->back()->with('success', 'Password Updated Successfully');

            }else{
                return redirect()->back()->with('error', 'Confirmed Password is not Matched');

            }

        }else{
            return redirect()->back()->with('error', 'Password at least 8 Character');
        }
    }

    public function profile_change(Request $request){

        $request->validate([
            'image' => 'required'
        ]);


        $id = $request->input('id');
        
        //image
        $msg = "";
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        $find_data = User::find($id);
        $find_data->image = $image;
        $find_data->save();

        session()->put('image',$image);
        return redirect()->back()->with('success', 'Profile Image Succe');


    }

    public function inbox(){
        $all_contacts = Contact::all();
        $contacts_count = Contact::count();
        return view('admin.inbox', compact('all_contacts','contacts_count'));
    }

    public function compose(){
        return view('admin.compose');
    }

    public function read_mail($id){
        $target_mail = Contact::where('id',$id)->first();
        $email = $target_mail->email;
        $subject = $target_mail->subject;
        $message = $target_mail->message;
        $created_at = $target_mail->created_at;
        return view('admin.ReadMail', compact('email','subject','message','created_at'));
    }

    public function inbox_delete(Request $request){

        $request->validate([
            'inbox_message' => 'required'
        ]);

        $inbox_message = $request->input('inbox_message');
        $count = count($inbox_message);
        
        for($i=0; $i<$count; $i++){
            
            $delete_contact = Contact::where('id', $inbox_message[$i])->delete();
        }

        return redirect()->back()->with('success', 'Contact List Deleted Successfully');

    }

    public function inbox_sent(){
        $contacts_count = Contact::where('type','sent')->count();
        $inbox_count = Contact::count();
        $all_contacts = Contact::all();
        return view('admin.InboxSent',compact('contacts_count','all_contacts','inbox_count'));

    }

    

}
