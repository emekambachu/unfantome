<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MarketPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class MemberMarketPlaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $products = MarketPlace::with('user')->where('approved', 1)
            ->inRandomOrder()->paginate(20);

        return view('members.account.market-place.index', compact('products'));
    }

    public function myProducts(){

        $products = MarketPlace::with('user')->where('user_id', Auth::user()->id)
            ->inRandomOrder()->paginate(20);
        $myProducts = MarketPlace::where('user_id', Auth::user()->id)->first();

        return view('members.account.market-place.index', compact('products', 'myProducts'));
    }

    public function create(){

        return view('members.account.market-place.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:5|unique:market_places,name',
            'price' => 'required',
            'description' => 'required|string|min:5',
            'image' => 'required|mimes:jpg,jpeg,png|image|max:5048',
            'image_two' => 'nullable|mimes:jpg,jpeg,png|image|max:5048',
            'image_three' => 'nullable|mimes:jpg,jpeg,png|image|max:5048',
        ]);

        $input = $request->all();

        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image'] = $fileName;
        }

        if($file = $request->file('image_two')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image_two'] = $fileName;
        }else{
            $input['image_two'] = $fileName;
        }

        if($file = $request->file('image_three')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image_three'] = $fileName;
        }else{
            $input['image_three'] = null;
        }

        $input['user_id'] = Auth::user()->id;

        MarketPlace::create($input);

        Session::flash('success', 'product added');
        return redirect()->back();
    }

    public function edit($id){

        $product = MarketPlace::with('user')->has('user')->findOrFail($id);

        return view('members.account.market-place.edit', compact('product'));
    }

    public function update($id, Request $request){

        $product = MarketPlace::with('user')->has('user')->findOrFail($id);

        $request->validate([
            'name' => 'required|min:5|unique:market_places,name,'.$id,
            'price' => 'required',
            'description' => 'required|string|min:5',
            'image' => 'nullable|mimes:jpg,jpeg,png|image|max:5048',
            'image_two' => 'nullable|mimes:jpg,jpeg,png|image|max:5048',
            'image_three' => 'nullable|mimes:jpg,jpeg,png|image|max:5048',
        ]);

        $input = $request->except('_token', '_method');

        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image'] = $fileName;
        }else{
            $input['image'] = $product->image;
        }

        if($file = $request->file('image_two')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image_two'] = $fileName;
        }else{
            $input['image_two'] = $product->image_two;
        }

        if($file = $request->file('image_three')){

            // path for converted image
            $converted_path = 'photos/market-place';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(545, 621);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(545, 621, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);

            $input['image_three'] = $fileName;
        }else{
            $input['image_three'] = $product->image_three;
        }

        $product->update($input);

        Session::flash('success', 'product updated');
        return redirect()->back();
    }

    public function destroy($id){

        $product = MarketPlace::findOrFail($id);

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
