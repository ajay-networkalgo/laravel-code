<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductFeature;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductFeatureController extends Controller
{
    
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $product_id = $request->get('product_id');
            
            $productFeature = productFeature::when($product_id, function ($query, $product_id) {
                return $query->where('product_id', $product_id);
            })
            ->where('is_deleted',0)
            ->orderBy('id', 'DESC')
            ->get();

            return DataTables::of($productFeature)
                ->addIndexColumn()
                ->editColumn('feature_category', function ($row) {
                    return $row['feature_category'];
                })
                ->editColumn('feature_key_value', function ($row) {
                    return $row['feature_key_value'];
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 viewFeatureRecord" id="'.$encryptId.'"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 editFeatureRecord" id="'.$encryptId.'"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteFeatureRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request){
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'feature_category' => 'required',
                'feature_key_value' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            $createdFeatures = [];
            foreach ($request->feature_key_value as $index => $featurekeyvalue) {
                $productFeature = ProductFeature::create([
                    'product_id' => $request->product_id,
                    'feature_category' => $request->feature_category,
                    'feature_key_value' => $featurekeyvalue,
                ]);
                
                $createdFeatures[] = $productFeature;
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Product Features has been added successfully.',
                'data' => $productFeature  
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
        $featureId = base64_decode($id); // Decrypt the ID
        $feature = ProductFeature::find($featureId);

        if ($feature) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $feature->id,
                    'feature_category' => $feature->feature_category,
                    'feature_key_value' => $feature->feature_key_value,
                ],
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Feature not found'], 404);
    }

    public function update(Request $request)
    {
        $featureId = $request->get('id');

        // Start the transaction
        DB::beginTransaction();

        try {
            $feature = ProductFeature::find($featureId);

            if (!$feature) {
                return response()->json(['success' => false, 'message' => 'Feature not found'], 404);
            }

            $validator = Validator::make($request->all(), [
                'feature_category' => 'required',
                'feature_key_value' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ]);
            }

            // Update feature properties
            $feature->feature_category = $request->input('feature_category');
            $feature->feature_key_value = $request->input('feature_key_value');
            $feature->save();

            // Commit the transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Feature updated successfully',
                'data' => [
                    'id' => $feature->id,
                ],
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the feature.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function view($id)
    {
        $featureId = base64_decode($id); // Decrypt the ID
        $feature = ProductFeature::find($featureId);

        if ($feature) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $feature->id,
                    'feature_category' => $feature->feature_category,
                    'feature_key_value' => $feature->feature_key_value,
                ],
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Feature not found'], 404);
    }
    public function delete($encryptId){
        $id = base64_decode($encryptId);
             if(ProductFeature::where('id',$id)->update(['is_deleted'=>1])){
                 return response()->json(['status' => true,'msg'=>'Feature deleted successfully.']);
             }else{
                 return response()->json(['status' => false,'msg'=>'something went wrong']);
             }
     
     }

}
