<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\GalleryCategory;
use Aii\Admin\Models\GallerySubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class GallerySubCategoryController extends AdminController
{
    /*Start :: Add Gallery Sub Category*/

    public function Index()
    {
        $aGallerySubCategory    =  GallerySubCategory::with('GalleryCategory')->get();
        $aGalleryCategory       =  GalleryCategory::get();
        //return $aGallerySubCategory;
        return view('admin::templates.gallery_sub_category.gallery_sub_category',compact('aGalleryCategory','aGallerySubCategory'));
    }

    /*Start::Gallery sub-category insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'fk_id_gallery_category' => 'required',
            'name' => 'required|unique:aii_product_sub_category',
            'slug' => 'required|unique:aii_product_sub_category',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oGallerySubCate = new GallerySubCategory();
            $oResponse  = $oGallerySubCate->create($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Gallery Sub Category Added');
            } else {
                session()->flash('msg', 'Gallery Sub Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::Gallery sub-category insert*/

    /*Start:: Delete Gallery category */
    public function Delete(GallerySubCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Gallery Sub Category Deleted');
        } else {
            session()->flash('msg', 'Gallery Sub Category Not Deleted');
        }
        return redirect()->route('admin.gallery_sub_ategory.index');
    }
    /*End:: Delete Gallery-category*/

    /*Start:: Get product category*/
    public function GetGallarySubCategory(GallerySubCategory $id)
    {

        $aGallerySubCategory    =  GallerySubCategory::with('GalleryCategory')->get();
        $aGalleryCategory       =  GalleryCategory::get();

        return view('admin::templates.gallery_sub_category.gallery_sub_category',compact('id','aGalleryCategory','aGallerySubCategory'));
    }
    /*End:: Get Gallery category*/

    /*Start::product sub-category Update*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'fk_id_gallery_category' => 'required',
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = GallerySubCategory::where('id_gallery_sub_category', $oRequest->selected_id)->update([
                'fk_id_gallery_category' => $oRequest->fk_id_gallery_category,
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Gallery Sub Category Updated');
            } else {
                session()->flash('msg', 'Gallery Sub Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.gallery_sub_ategory.index');
    }
    /*End::product sub-category Update*/

    /*Start::Update status Gallery-category*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = GallerySubCategory::where('id_gallery_sub_category', $oRequest->id)->update([
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
