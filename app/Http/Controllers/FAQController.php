<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $faqs = FAQ::where('is_deleted', 0)
                    ->orderBy('id', 'DESC')
                    ->get();

                return Datatables::of($faqs)
                    ->addIndexColumn()
                    ->editColumn('feature_title', fn($row) => $row->feature_title)
                    ->editColumn('feature_content', fn($row) => $row->feature_content)
                    ->editColumn('status', fn($row) => $row->is_active . "_" . base64_encode($row->id))
                    ->addColumn('action', function ($row) {
                        $encryptId = base64_encode($row->id);
                        return '<a href="' . url("admin/faq/view/{$encryptId}") . '" class="mr-2"><i class="fas fa-eye"></i></a>' .
                               '<a href="' . url("admin/faq/edit/{$encryptId}") . '" class="mr-2"><i class="fas fa-edit"></i></a>' .
                               '<a href="javascript:void(0)" class="mr-2 deleteRecord" id="' . $encryptId . '"><i class="fas fa-trash-alt"></i></a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('faq.index');
        } catch (\Exception $e) {
            return redirect('admin/faq')->withErrors([
                'error' => 'An error occurred while loading the FAQ content.',
            ]);
        }
    }

    public function add()
    {
        $product_types = ProductType::where('is_deleted', 0)->orderBy('id', 'DESC')->get();
        $products = Product::where('is_deleted', 0)->orderBy('id', 'DESC')->get();

        return view('faq.add', [
            'product_types' => $product_types,
            'products' => $products,
        ]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();

        try {
            $input = $request->all();

            $validator = Validator::make($input, [
                'product_type_id' => 'required',
                'feature_title' => 'required',
                'feature_content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            FAQ::create([
                'product_type_id' => $input['product_type_id'],
                'product_id' => $input['product_id'],
                'feature_title' => $input['feature_title'],
                'feature_content' => $input['feature_content'],
                'is_active' => 1,
                'is_deleted' => 0,
            ]);

            DB::commit();

            Session::flash('message', 'FAQ has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');

            return redirect('/admin/faq');
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', 'Something went wrong: ' . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');

            return redirect('/admin/faq')->withErrors([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function getProducts(Request $request)
    {
        $products = Product::where('product_types_id', $request->product_type_id)
            ->where('is_deleted', 0)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json(['products' => $products]);
    }

    public function view($encryptId)
    {
        try {
            $id = base64_decode($encryptId);
            $faq = FAQ::findOrFail($id);

            return view('faq.view', ['faq' => $faq, 'id' => $encryptId]);
        } catch (\Exception $e) {
            Session::flash('message', 'No Record Found');
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');

            return redirect('/admin/faq');
        }
    }

    public function edit($encryptId)
    {
        try {
            $id = base64_decode($encryptId);
            $faq = FAQ::findOrFail($id);

            $product_types = ProductType::all();
            $products = Product::all();

            return view('faq.edit', [
                'faq' => $faq,
                'id' => $encryptId,
                'product_types' => $product_types,
                'products' => $products,
            ]);
        } catch (\Exception $e) {
            Session::flash('message', 'No Record Found');
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');

            return redirect('/admin/faq');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_type_id' => 'required',
                'feature_title' => 'required',
                'feature_content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $faq = FAQ::findOrFail($id);
            $faq->update($request->only(['product_type_id', 'product_id', 'feature_title', 'feature_content']));

            Session::flash('message', 'FAQ has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');

            return redirect('/admin/faq');
        } catch (\Exception $e) {
            Session::flash('message', 'Something went wrong: ' . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');

            return redirect('/admin/faq');
        }
    }

    public function delete(Request $request, $encryptId)
    {
        try {
            $id = base64_decode($encryptId);

            FAQ::where('id', $id)->update(['is_deleted' => 1]);

            return response()->json([
                'status' => true,
                'msg' => 'FAQ deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Something went wrong: ' . $e->getMessage(),
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        try {
            $id = base64_decode($request->input('rowid'));
            $status = $request->input('status') == 1 ? 0 : 1;

            FAQ::where('id', $id)->update(['is_active' => $status]);

            return response()->json([
                'status' => true,
                'msg' => 'Status has been updated.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Something went wrong: ' . $e->getMessage(),
            ]);
        }
    }
}
