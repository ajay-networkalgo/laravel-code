<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductSpecificationController extends Controller
{
    public function index(Request $request)
{
    
    if ($request->ajax()) {
        $product_id = $request->get('product_id');
        
        $productSpecification = productSpecification::when($product_id, function ($query, $product_id) {
            return $query->where('product_id', $product_id);
        })
        ->where('is_deleted',0)
        ->orderBy('id', 'ASC')
        ->get();

        return DataTables::of($productSpecification)
            ->addIndexColumn()
            ->editColumn('specification_lablel', function ($row) {
                return $row['specification_lablel'];
            })
            ->editColumn('specification_key', function ($row) {
                return $row['specification_key'];
            })
            ->editColumn('specification_value', function ($row) {
                return $row['specification_value'];
            })
            ->addColumn('action', function($row){
                $id = $row->id;
                $encryptId = base64_encode($id);
                $button = '';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 viewSpecificationRecord" id="'.$encryptId.'"><i class="fas fa-eye"></i></a>';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 editSpecificationRecord" id="'.$encryptId.'"><i class="fas fa-edit"></i></a>';
                $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteSpecificationRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
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
                'specification_label' => 'required',
                'specification_key' => 'required',
                'specification_value' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            $createdSpecifications = [];
            foreach ($request->specification_key as $index => $specificationkey) {
                $createdSpecification = ProductSpecification::create([
                    'product_id' => $request->product_id,
                    'specification_label' => $request->specification_label,
                    'specification_key' => $specificationkey,
                    'specification_value' => $request->specification_value[$index],
                ]);
                
                $createdSpecifications[] = $createdSpecification;
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Product Specification has been added successfully.',
                'data' => $createdSpecification  
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
        $specificationId = base64_decode($id); // Decrypt the ID
        $specification = ProductSpecification::find($specificationId);

        if ($specification) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $specification->id,
                    'specification_label' => $specification->specification_label,
                    'specification_key' => $specification->specification_key,
                    'specification_value' => $specification->specification_value,
                ],
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Feature not found'], 404);
    }
    public function update(Request $request)
    {
        $specificationId = $request->get('id');

        // Start the transaction
        DB::beginTransaction();

        try {
            $specification = ProductSpecification::find($specificationId);

            if (!$specification) {
                return response()->json(['success' => false, 'message' => 'Specification not found'], 404);
            }

            $validator = Validator::make($request->all(), [
                'specification_label' => 'required',
                'specification_key' => 'required',
                'specification_value' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ]);
            }

            // Update feature properties
            $specification->specification_label = $request->input('specification_label');
            $specification->specification_key = $request->input('specification_key');
            $specification->specification_value = $request->input('specification_value');
            $specification->save();

            // Commit the transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Specification updated successfully',
                'data' => [
                    'id' => $specification->id,
                ],
            ]);
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the specification.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function view($id)
    {
        $specificationId = base64_decode($id); // Decrypt the ID
        $specification = ProductSpecification::find($specificationId);

        if ($specification) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $specification->id,
                    'specification_label' => $specification->specification_label,
                    'specification_key' => $specification->specification_key,
                    'specification_value' => $specification->specification_value,
                ],
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Specification not found'], 404);
    }
    public function delete($encryptId){
        $id = base64_decode($encryptId);
             if(ProductSpecification::where('id',$id)->update(['is_deleted'=>1])){
                 return response()->json(['status' => true,'msg'=>'Specification deleted successfully.']);
             }else{
                 return response()->json(['status' => false,'msg'=>'something went wrong']);
             }
     
     }
}
