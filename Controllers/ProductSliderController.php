<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductSlider;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductSliderController extends Controller
{
    
    public function index(Request $request)
{
    if ($request->ajax()) {
        $product_id = $request->get('product_id');
        
        $productslider = ProductSlider::when($product_id, function ($query, $product_id) {
            return $query->where('product_id', $product_id);
        })
        ->where('is_deleted',0)
        ->orderBy('id', 'DESC')
        ->get();

        return DataTables::of($productslider)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return '<img src="' . asset('assets/related_products/' . $row->image) . '" alt="Slider Image" width="50" height="50">';
            })
            ->addColumn('action', function($row){
                $id = $row->id;
                $encryptId = base64_encode($id);
                $button = '';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 viewSliderRecord" id="'.$encryptId.'"><i class="fas fa-eye"></i></a>';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 editSliderRecord" id="'.$encryptId.'"><i class="fas fa-edit"></i></a>';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteSliderRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                return $button;
            })
            ->rawColumns(['image','action'])
            ->make(true);
    }
}

    
    
public function store(Request $request)
{
    DB::beginTransaction();

    try {
        
        $file_size = env("FILE_SIZE");
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            "image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        $productSliderPath = $this->handleProductSliderUploading($request, "image", "assets/related_products/");
        $productSlider = ProductSlider::create([
            'product_id' => $request->product_id,
            'image' => $productSliderPath,
        ]);

        DB::commit();
        return response()->json([
            'success' => true,
            'message' => 'Product Slider has been added successfully.',
            'data' => $productSlider  
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong.'
        ]);
    }
}
public function edit($id)
{
    $sliderId = base64_decode($id); // Decrypt the ID
    $slider = ProductSlider::find($sliderId);

    if ($slider) {
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $slider->id,
                'image' => asset('assets/related_products/' . $slider->image), // Assuming images are stored
            ],
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Slider not found'], 404);
}
public function update(Request $request)
{
    $file_size = env("FILE_SIZE");
    $sliderId = $request->get('id');
    $slider = ProductSlider::find($sliderId);


    if (!$slider) {
        return response()->json(['success' => false, 'message' => 'Slider not found'], 404);
    }

    
    $validator = Validator::make($request->all(), [
        "image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
    ]);
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ]);
    }
    if ($request->hasFile('image')) {
        if ($slider->image && file_exists(public_path('assets/related_products/' . $slider->image))) {
            unlink(public_path('assets/related_products/' . $slider->image));
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/related_products'), $imageName);
        $slider->image = $imageName;
    }

    $slider->save();

    return response()->json([
        'success' => true,
        'message' => 'Slider updated successfully',
        'data' => [
            'id' => $slider->id,
            'image' => asset('assets/related_products/' . $slider->image),
        ],
    ]);
}
public function view($id)
{
    $sliderId = base64_decode($id); // Decrypt the ID
    $slider = ProductSlider::find($sliderId);

    if ($slider) {
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $slider->id,
                'image' => asset('assets/related_products/' . $slider->image), // Assuming images are stored
            ],
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Slider not found'], 404);
}
public function delete($encryptId){
   $id = base64_decode($encryptId);
    	if(ProductSlider::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Slider item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

}
private function handleProductSliderUploading($request, $inputName, $path)
    {
        try {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                return $filename;
            } else {
                return $request->input($inputName);
            }
        } catch (\Exception $e) {
            throw new \Exception(
                "File upload failed for " . $inputName . ": " . $e->getMessage()
            );
        }
    }
}
