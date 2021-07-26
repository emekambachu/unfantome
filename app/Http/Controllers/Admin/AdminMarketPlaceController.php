<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketPlace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminMarketPlaceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $products = MarketPlace::with('user')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.account.market-place.index', compact('products'));
    }

    public function approve($id){

        $product = MarketPlace::findOrFail($id);

        if ($product->approved === 1) {
            $product->approved = 0;
            $email_subject = 'Your product has been blocked';
            Session::flash('warning', $product->name . ' has been blocked');

        } else {
            $product->approved = 1;
            $email_subject = 'Your product has been published';
            Session::flash('success', $product->name . ' has been published');
        }

        $product->save();

        $data = [
            'name' => $product->user->name,
            'email' => $product->user->email,
            'product_name' => $product->name,
            'approved' => $product->approved,
            'email_subject' => $email_subject,
        ];

        Mail::send('emails.market-place.approved', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['email'], $data['name']);
            $message->replyTo('Info@unfantome.com', 'Unfantome');
            $message->subject($data['email_subject']);
        });

        return redirect()->back();
    }

    public function deleteProduct($id) {

        $product = Marketplace::findOrFail($id);

        if (!empty($product->image) && File::exists(public_path() . '/photos/market-place/' . $product->image)) {
            FILE::delete(public_path() . '/photos/market-place/' . $product->image);
        }

        if (!empty($product->image_two) && File::exists(public_path() . '/photos/market-place/' . $product->image_two)) {
            FILE::delete(public_path() . '/photos/market-place/' . $product->image_two);
        }

        if (!empty($product->image_three) && File::exists(public_path() . '/photos/market-place/' . $product->image_three)) {
            FILE::delete(public_path() . '/photos/market-place/' . $product->image_three);
        }

        $product->delete();
    }
}
