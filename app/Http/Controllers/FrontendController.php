<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Newsletter;
use Illuminate\Http\Request;



class FrontendController extends Controller
{
    public function index(){

        

        $all_category = Category::all();
        $first_post = Post::orderBy('created_at', 'desc')->take(2)->get();

        $recent_post = Post::orderBy('created_at', 'desc')->offset(2)->take(3)->get();
        $technology_category_first = Post::where('category_id',17)->orderBy('created_at', 'desc')->take(1)->get();
        $technology_category = Post::where('category_id',17)->orderBy('created_at', 'desc')->offset(1)->take(6)->get();
        $health_category = Post::where('category_id',15)->orderBy('created_at', 'desc')->paginate(3);
        $cannabis_category = Post::where('category_id',19)->orderBy('created_at', 'desc')->take(3)->get();
        $all_tag = Tag::all();
        $entertainment_category = Post::where('category_id',18)->orderBy('created_at', 'desc')->take(4)->get();
        $most_read = Post::orderBy('read_count', 'desc')->take(4)->get();
        $featured_post = Post::orderBy('created_at','desc')->take(4)->get();
        
        return view('frontend.index', compact('all_category','first_post','technology_category','technology_category_first','health_category','recent_post','cannabis_category','all_tag', 'entertainment_category','most_read','featured_post'));
    }

    public function category($cat_name){
        $all_category = Category::all();
        $all_tag = Tag::all();
        $category_data = Category::where('slug',$cat_name)->first();
        
        $category_id = $category_data->id;
        $first_post = Post::where('category_id',$category_id)->orderBy('created_at', 'desc')->take(1)->get();
        $second_post = Post::where('category_id',$category_id)->orderBy('created_at', 'desc')->offset(1)->take(2)->get();
        $third_post = Post::where('category_id',$category_id)->orderBy('created_at', 'desc')->offset(3)->take(50)->get();

        $most_read = Post::orderBy('read_count', 'desc')->take(4)->get();
        $featured_post = Post::orderBy('created_at','desc')->take(4)->get();

        return view('frontend.Category', compact('all_category','first_post','second_post','third_post','all_tag','most_read', 'featured_post', 'cat_name'));
    }

    public function about(){
        $all_category = Category::all();
        $most_read = Post::orderBy('read_count', 'desc')->take(4)->get();
        return view('Frontend.About', compact('all_category','most_read'));
    }

    public function contact(){
        $all_category = Category::all();
        return view('Frontend.Contact' , compact('all_category'));
    }

    public function newsletter(Request $request){
        $newsletter_email = $request->input('newsletter');

        $count_newsletter = Newsletter::where('name',$newsletter_email)->count();

        if($count_newsletter == 1){
            return redirect()->back()->with('info', 'You have already joined our newsletter');

        }else{
            $newsletter = new Newsletter();
            $newsletter->name = $newsletter_email;
            $newsletter->save();
            return redirect()->back()->with('success', 'Newsletter Send Successfully');

        }

        
    }

    public function contact_details(Request $request){
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $contact = new Contact();
        $contact->email = $email;
        $contact->subject = $subject;
        $contact->message = $message;
        $contact->save();
        return redirect()->back()->with('success', 'Your Message Sent Successfully');
    }

    public function search_post(Request $request){
        $search_data = $request->input('search');
        $output_data = Post::where('description', 'LIKE', '%' . $search_data . '%')->get();
        $all_category = Category::all();
        $most_read = Post::orderBy('read_count', 'desc')->take(4)->get();
        $all_tag = Tag::all();
        return view('frontend.search', compact('search_data','output_data','all_category','most_read','all_tag'));
    }

    public function post_url($post_url){
        $post_data = Post::where('permalink', $post_url)->get();
        foreach($post_data as $item){
            $id = $item->id;
            $read_count = $item->read_count;
        }

        $insert_readMore = Post::find($id);
        $insert_readMore->read_count = $read_count+1;
        $insert_readMore->save();


        $all_category = Category::all();
        
        $most_read = Post::orderBy('read_count', 'desc')->take(4)->get();
        $featured_post = Post::orderBy('created_at','desc')->take(4)->get();
        $all_tag = Tag::all();
        return view('frontend.Post', compact('all_category','post_data','most_read','featured_post','all_tag'));
    }

   

   
}
