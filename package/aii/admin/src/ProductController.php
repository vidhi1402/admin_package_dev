<?php

namespace Aii\Admin;

use Aii\Admin\Models\Product;
use App\Http\Controllers\Controller;
use Aii\Admin\Models\ProductAssignCategory;
use Aii\Admin\Models\ProductAssignSubCategory;
use Aii\Admin\Models\ProductCategory;
use Aii\Admin\Models\ProductImage;
use Aii\Admin\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function Index()
    {
        $aProductList = Product::with('category.productCategory')->with('subCategory.productSubCategory')->get();
        $aCategoryList = ProductCategory::with('productSubCategory')->where('status', 1)->get();
        return view('admin::templates.product.product', compact('aCategoryList', 'aProductList'));
    }

    /*START::Get sub category product*/
    public function GetSubCategoryProduct(Request $oRequest)
    {
        $oSubCategory = ProductSubCategory::with('productCat')->where('fk_id_product_category', $oRequest->id)->get();
        if ($oSubCategory) {
            return response()->json(array('data' => $oSubCategory, 'status' => 1));
        } else {
            $oSubCategory = 'Not found';
            return response()->json(array('data' => $oSubCategory, 'status' => 0));
        }
    }
    /*End::Get sub category product*/

    /*Start::product insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|unique:aii_products_master',
            'slug' => 'required|unique:aii_products_master',
            'sort_description' => 'required',
            'fk_id_product_category' => 'required',
           // 'fk_id_sub_product_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oProduct = new Product();
            $oProduct['name'] = $oRequest->name;
            $oProduct['slug'] = $oRequest->slug;
            $oProduct['sort_description'] = $oRequest->sort_description;
            $oProduct['brief_description'] = $oRequest->brief_description;
            $oProduct['download_link'] = $oRequest->download_link;
            $oProduct['brochure_link'] = $oRequest->brochure_link;
            $oProduct['product_desc_url'] = $oRequest->product_desc_url;
            $oProductObj = $oProduct->save();

            $oResCategory = $this->__insertProductCategory($oProduct->id_product, $oRequest);
            $oResponse = $this->__insertSubProductCategory($oProduct->id_product, $oRequest);

            for ($i = 0; $i < count($oRequest->image); $i++) {
                $oImage = new ProductImage();
                $oImage['fk_id_product'] = $oProduct->id_product;
                $oImage['product_slug'] = $oProduct->slug;
                if (!empty($oRequest->image[$i])) {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageProduct($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }
            if ($oProductObj) {
                session()->flash('msg', 'product Added');
            } else {
                session()->flash('msg', 'product Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    //insert product categories
    private function __insertProductCategory($aProductID, Request $oRequest)
    {
        for ($i = 0; $i < count($oRequest->fk_id_product_category); $i++) {
            $oProductCategory = new ProductAssignCategory();
            $oProductCategory['fk_id_product'] = $aProductID;
            $oProductCategory['fk_id_product_category'] = $oRequest->fk_id_product_category[$i];
            $oProductCategory->save();
        }
    }

    //insert product sub categories
    private function __insertSubProductCategory($aProductID, Request $oRequest)
    {
        for ($i = 0; $i < count($oRequest->fk_id_sub_product_category); $i++) {
            $aProSubCategory = ProductSubCategory::where('id_product_sub_category', $oRequest->fk_id_sub_product_category[$i])->first();
            $oProductSubCategory = new ProductAssignSubCategory();
            $oProductSubCategory['fk_id_product'] = $aProductID;
            $oProductSubCategory['fk_id_product_category'] = $aProSubCategory->fk_id_product_category;
            $oProductSubCategory['fk_id_sub_category'] = $oRequest->fk_id_sub_product_category[$i];
            $oProductSubCategory->save();
        }
    }
    /*End::product insert*/

    /*Start:: Get product Edit*/
    public function GetProduct(Product $id)
    {
        $aProductCategoryList = ProductCategory::all();
        $aProductSubCategoryList = ProductSubCategory::all();
        $aProductCategory = ProductAssignCategory::where('fk_id_product', $id->id_product)->get();
        $aProductSubCategory = ProductAssignSubCategory::where('fk_id_product', $id->id_product)->get();

        $aCategory = array();
        foreach ($aProductCategory as $oCategory) {
            $aCategory[] = $oCategory->fk_id_product_category;
        };

        $aSubCategory = array();
        foreach ($aProductSubCategory as $oSubCatagory) {
            $aSubCategory[] = $oSubCatagory->fk_id_sub_category;
        };

        $aProductList = Product::with('category.productCategory')->with('subCategory.productSubCategory')->get();
        return view('admin::templates.product.product', compact('id', 'aProductList', 'aProductCategoryList',
            'aCategory', 'aSubCategory', 'aProductSubCategoryList'));
    }
    /*End:: Get product Edit*/

    /*Start:: Update product*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'product_name' => 'required',
            'slug' => 'required',
            'sort_description' => 'required',
            'fk_id_product_category' => 'required',
           // 'fk_id_sub_product_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = Product::where('id_product', $oRequest->selected_id)->update([
                'name' => $oRequest->product_name,
                'slug' => $oRequest->slug,
                'sort_description' => $oRequest->sort_description,
                'brief_description' => $oRequest->brief_description,
                'download_link' => $oRequest->download_link,
                'brochure_link' => $oRequest->brochure_link,
                'product_desc_url' => $oRequest->product_desc_url,
            ]);
            $oResCategory = $this->__updateProductCategory($oRequest->selected_id, $oRequest);
            $oResSubCategory = $this->__updateSubProductCategory($oRequest->selected_id, $oRequest);

            for ($i = 0; $i < count($oRequest->image); $i++) {
                $oImage = new ProductImage();
                $oImage['fk_id_product'] = $oRequest->selected_id;
                $oImage['product_slug'] = $oRequest->slug;
                if (!empty($oRequest->image[$i])) {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageProduct($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }
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
        return redirect()->route('admin.product.index');
    }

    //update product categories
    private function __updateProductCategory($aProductID, Request $oRequest)
    {
        $oResponse = ProductAssignCategory::whereNotIn('fk_id_product_category', $oRequest->fk_id_product_category)
            ->where('fk_id_product', $aProductID)
            ->delete();
        for ($i = 0; $i < count($oRequest->fk_id_product_category); $i++) {
            $aProductCategory = ProductAssignCategory::firstOrCreate([
                'fk_id_product' => $aProductID,
                'fk_id_product_category' => $oRequest->fk_id_product_category[$i]
            ]);
        }
    }

    //update product sub-categories
    private function __updateSubProductCategory($aProductID, Request $oRequest)
    {
        $oResponse = ProductAssignSubCategory::whereNotIn('fk_id_sub_category', $oRequest->fk_id_sub_product_category)
            ->where('fk_id_product', $aProductID)
            ->delete();
        for ($i = 0; $i <count($oRequest->fk_id_sub_product_category); $i++) {
            $aProductSubCategory = ProductSubCategory::where('id_product_Sub_category', $oRequest->fk_id_sub_product_category[$i])->first();
            $oProductSubCategory = ProductAssignSubCategory::firstOrCreate([
                'fk_id_product' => $aProductID,
                'fk_id_product_category' => $aProductSubCategory->fk_id_product_category,
                'fk_id_sub_category' => $oRequest->fk_id_sub_product_category[$i]
            ]);
        }
    }
    /*End:: Update product */

    /*Start::Update status product*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = Product::where('id_product', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        if ($oResponse) {
            session()->flash('msg', 'Status Changed');
            return response()->json(array('data' => $oResponse, 'status' => 1));
        } else {
            $oResponse = 'not found';
            session()->flash('msg', 'Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }
    /*End::Update status product*/

    /*Start:: Delete product */
    public function Delete(Product $id)
    {
        $oResponse = $id->delete();
        $oResDelCategory = $this->__deleteProductCategory($id->id_product);
        $oResDelSubCategory = $this->__deleteProductSubCategory($id->id_product);
        $oResDelImage = $this->__deleteProductImage($id->id_product);
        if ($oResponse) {
            session()->flash('msg', 'Product Deleted');
        } else {
            session()->flash('msg', 'Product Not Deleted');
        }
        return redirect()->route('admin.product.index');
    }

    private function __deleteProductCategory($nProductId)
    {
        $oResDel = ProductAssignCategory::where('fk_id_product', $nProductId)->delete();
    }

    private function __deleteProductSubCategory($nProductId)
    {
        $oResDel = ProductAssignSubCategory::where('fk_id_product', $nProductId)->delete();
    }

    private function __deleteProductImage($nProductId)
    {
        $aProductImg = ProductImage::where('fk_id_product', $nProductId)->get();
        foreach ($aProductImg As $oImage) {
            $result = $this->__deleteImageFolder(public_path() . config('constants.PRODUCT_IMAGE_PATH') . $oImage->name);
        }

        $oResDel = ProductImage::where('fk_id_product', $nProductId)->delete();
    }
    /*End:: Delete product*/

    /*START::SERVICE IMAGE*/
    /*START::Get Image product*/
    public function GetProductImage(Request $oRequest)
    {
        $aProduct = ProductImage::where('fk_id_product', $oRequest->id)->get();
        $html = view('admin::templates.product.product-modal-data', compact('aProduct'))->render();
        if ($html) {
            return response()->json(['status' => 1, 'html' => $html, 'data' => $aProduct, 'req_data' => $oRequest->all()]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function UpdateStatusProductImage(Request $oRequest)
    {
        $oResponse = ProductImage::where('id_product_image', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        $oImage = ProductImage::find($oRequest->id);
        $aProduct = ProductImage::where('fk_id_product', $oImage->fk_id_product)->get();

        $html = view('admin::templates.product.product-modal-data', compact('aProduct'))->render();
        if ($oResponse) {
            session()->flash('msg', 'Status Changed');
            return response()->json(array('data' => $oResponse, 'id_product' => $oImage->fk_id_product, 'status' => 1, 'html' => $html));
        } else {
            $oResponse = 'not found';
            session()->flash('msg', 'Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }

    //image delete
    public function DeleteProductImage(Request $oRequest)
    {
        $oImage = ProductImage::find($oRequest->id);
        $aProduct = ProductImage::where('fk_id_product', $oImage->fk_id_product)->get();
        $html = view('admin::templates.product.product-modal-data', compact('aProduct'))->render();
        $result = $this->__deleteImageFolder(public_path() . config('constants.PRODUCT_IMAGE_PATH') . $oImage->name);

        if ($result['status'] == 1) {
            $oResponse = ProductImage::find($oImage->id_product_image)->delete();
            if ($oResponse) {
                session()->flash('msg', 'Image Deleted');
                return array('status' => 1, 'id_product' => $oImage->fk_id_product, 'msg' => 'success', 'html' => $html);
            } else {
                session()->flash('msg', 'Image Not Deleted');
                return array('status' => 0, 'msg' => 'fail');
            }
        } else {
            session()->flash('msg', 'Image Not Deleted');
        }
        return back();
    }

    /* delete imaage in folder*/
    private function __deleteImageFolder($filename)
    {
        if (file_exists($filename)) {
            @unlink($filename);
            return array('status' => 1, 'msg' => 'success');
        } else {
            return array('status' => 0, 'msg' => 'fail');
        }
    }
    /*End::SERVICE IMAGE*/

    /*START::COMMON PRIVATE FUNCTIONS*/
    /*START:product image upload*/
    private function __uploadImageProduct($oUploadImage)
    {
        $sDestinationPath = public_path() . config('constants.PRODUCT_IMAGE_PATH'); // upload path
        $sExtension = $oUploadImage->getClientOriginalExtension(); // getting image extension
        $sFileName = str_random(8) . '_' . time() . '.' . $sExtension; // renameing image
        $is_uploded = $oUploadImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if ($is_uploded) {
            return $sFileName;
        } else {
            return '';
        }
    }
    /*End:product image upload*/
    /*END::COMMON PRIVATE FUNCTIONS*/
}
