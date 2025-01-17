<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductAsset;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductAssetsController extends Controller
{
    public function index(Request $request)
    {
    
        if ($request->ajax()) {
            $product_id = $request->get('product_id');
        
            $productAsset = productAsset::where("product_id", $product_id)
                ->get()
                ->keyBy("product_asset_key")
                ->toArray();
                return response()->json([
                    'success' => true,
                    'data' => $productAsset  
                ]);
        }
           
        
        
    }
    public function view($product_id)
    {
    
        if ($request->ajax()) {
            
            $productAsset = productAsset::when($product_id, function ($query, $product_id) {
                return $query->where('product_id', $product_id);
            })
            ->orderBy('id', 'ASC')
            ->get();
            return response()->json([
                'success' => true,
                'data' => $productAsset  
            ]);

        }
        
    }
    public function store(Request $request){
        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'product_asset_title' => 'required',
                'product_asset_sub_title' => 'required',
                'product_asset_content' => 'required',
                'product_asset_image_or_video_one' => 'required',
                'product_asset_image_or_video_two' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            if($request->hasFile('product_asset_image_or_video_one')){
                $filename_product_asset_image_or_video_one = $this->handleProductAssetFileUpload(
                    $request,
                    "product_asset_image_or_video_one",
                    "assets/A1Hybrid"
                );
            }else{
                $filename_product_asset_image_or_video_one = $request['product_asset_image_or_video_one'];
            }


            if($request->hasFile('product_asset_image_or_video_two')){
                $filename_product_asset_image_or_video_two = $this->handleProductAssetFileUpload(
                    $request,
                    "product_asset_image_or_video_two",
                    "assets/A1Hybrid"
                );
            }else{
                $filename_product_asset_image_or_video_two = $request['product_asset_image_or_video_two'];
            }
            
           
                
                $productassetcontent = [
                    "product_asset_title" => $input["product_asset_title"],
                    "product_asset_sub_title" => $input["product_asset_sub_title"],
                    "product_asset_content" => $input["product_asset_content"],
                    "product_asset_image_or_video_one" => $filename_product_asset_image_or_video_one,
                    "product_asset_image_or_video_two" => $filename_product_asset_image_or_video_two,
                    
                ];
                
                
                    foreach ($productassetcontent as $key => $value) {
                        ProductAsset::updateOrCreate(
                            ["product_asset_key" => $key], 
                            [
                                "product_id" => $request->product_id,
                                "product_asset_value" => $value, 
                            ]
                        );
                    }
                

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Product Assets has been added successfully.',
                'data' => $productassetcontent  
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ]);
        }
    }
    private function handleProductAssetFileUpload($request, $inputName, $path)
    {
        try {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                return $filename;
            }
        } catch (\Exception $e) {
            throw new \Exception(
                "File upload failed for " . $inputName . ": " . $e->getMessage()
            );
        }
    }
}
