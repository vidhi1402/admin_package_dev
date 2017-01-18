<?php

namespace Aii\Admin;

use Aii\Admin\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class ProductCategoryController extends Controller
{
    public function Index(){

        $aProductCategory = ProductCategory::all();
        return view('admin::templates.product_category.product-category',compact('aProductCategory'));
    }

    /*Start::product category insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|unique:aii_product_category_master',
            'slug' => 'required|unique:aii_product_category_master',

        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProduct = new ProductCategory();
            $oProduct['name'] = $oRequest->name;
            $oProduct['slug'] = $oRequest->slug;
            $oResponse = $oProduct->save();

            if ($oResponse) {
                session()->flash('msg', 'Product Category Added');
            } else {
                session()->flash('msg', 'Product Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::product category insert*/

    /*Start:: Get product category*/
    public function GetProductCategory(ProductCategory $id)
    {
        $aProductCategory = ProductCategory::all();
        return view('admin::templates.product_category.product-category', compact('id', 'aProductCategory'));
    }
    /*End:: Get product category*/

    /*Start:: Update product category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = ProductCategory::where('id_product_category', $oRequest->selected_id)->update([
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Product Category Updated');
            } else {
                session()->flash('msg', 'Product Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.product_category.index');
    }
    /*End:: Update product category */

    /*Start:: Delete product category */
    public function Delete(ProductCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Product Category Deleted');
        } else {
            session()->flash('msg', 'Product Category Not Deleted');
        }
        return redirect()->route('admin.product_category.index');
    }
    /*End:: Delete product-category*/

    /*Start::Update status product-category*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = ProductCategory::where('id_product_category', $oRequest->id)->update([
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
    /*End::Update status product-category*/
}
