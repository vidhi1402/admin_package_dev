<?php

namespace Aii\Admin;

use Aii\Admin\Models\ProductCategory;
use Aii\Admin\Models\ProductSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ProductSubCategoryController extends Controller
{
    public function Index(){

        $aProductCategoryList = ProductCategory::all();
        $aProductSubCategoryList = ProductSubCategory::with('productCategory')->get();
        return view('admin::templates.product_sub_category.product-sub-category',compact('aProductCategoryList',
            'aProductSubCategoryList'));
    }

    /*Start::product sub-category insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'fk_id_product_category' => 'required',
            'name' => 'required|unique:aii_product_sub_categories',
            'slug' => 'required|unique:aii_product_sub_categories',

        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProduct = new ProductSubCategory();
            $oProduct['fk_id_product_category'] = $oRequest->fk_id_product_category;
            $oProduct['name'] = $oRequest->name;
            $oProduct['slug'] = $oRequest->slug;
            $oResponse = $oProduct->save();

            if ($oResponse) {
                session()->flash('msg', 'Product Sub Category Added');
            } else {
                session()->flash('msg', 'Product Sub Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::product sub-category insert*/

    /*Start:: get product sub-category edit*/
    public function GetProductSubCategory(ProductSubCategory $id)
    {
        $aProductCategoryList = ProductCategory::all();
        $aProductSubCategoryList = ProductSubCategory::with('productCategory')->get();
        return view('admin::templates.product_sub_category.product-sub-category', compact('id',
            'aProductSubCategoryList','aProductCategoryList'));
    }
    /*End::product sub-category edit*/

    /*Start::product sub-category Update*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'fk_id_product_category' => 'required',
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = ProductSubCategory::where('id_product_sub_category', $oRequest->selected_id)->update([
                'fk_id_product_category' => $oRequest->fk_id_product_category,
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Product Sub Category Updated');
            } else {
                session()->flash('msg', 'Product Sub Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.product_sub_category.index');
    }
    /*End::product sub-category Update*/

    /*Start::product sub-category Delete*/
    public function Delete(ProductSubCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Product Sub Category Deleted');
        } else {
            session()->flash('msg', 'Product Sub Category Not Deleted');
        }
        return redirect()->route('admin.product_sub_category.index');
    }
    /*End::product sub-category delete*/

    /*Start::product sub-category Change-status*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = ProductSubCategory::where('id_product_sub_category', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        if($oResponse) {
            session()->flash('msg','Status Changed');
            return response()->json(array('data' => $oResponse, 'status' => 1));
        }else{
            $oResponse = 'not found';
            session()->flash('msg','Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }
    /*End::product sub-category Change-status*/
}
