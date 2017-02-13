<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class GalleryCategoryController extends AdminController
{
    /*Start :: Add Gallery Category*/
    public function Index()
    {
        $aGalleryCategory   =   GalleryCategory::get();
        return view('admin::templates.gallery_category.gallery_category',compact('aGalleryCategory'));
    }
    /*Start::Gallery category insert*/

    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|unique:aii_gallery_categories',
            'slug' => 'required|unique:aii_gallery_categories',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oGalleryCategory   = new GalleryCategory();
            $oResponse  =   $oGalleryCategory->create($oRequest->all());
            if ($oResponse) {
                session()->flash('msg', 'Gallery Category Added');
            } else {
                session()->flash('msg', 'Gallery Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::Gallery category insert*/

    /*Start:: Get product category*/
    public function GetGalleryCategory(GalleryCategory $id)
    {
        $aGalleryCategory   =   GalleryCategory::get();
        return view('admin::templates.gallery_category.gallery_category',compact('id','aGalleryCategory'));
    }
    /*End:: Get Gallery category*/

    /*Start:: Update Galley category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse =  GalleryCategory::where('id_gallery_category', $oRequest->selected_id)->update([
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Galley Category Updated');
            } else {
                session()->flash('msg', 'Galley Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.gallery_category.insert');
    }
    /*End:: Update Galley category */


    /*Start:: Delete Gallery category */
    public function Delete(GalleryCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Gallery Category Deleted');
        } else {
            session()->flash('msg', 'Gallery Category Not Deleted');
        }
        return redirect()->route('admin.gallery_category.insert');
    }
    /*End:: Delete Gallery-category*/

    /*Start::Update status Gallery-category*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = GalleryCategory::where('id_gallery_category', $oRequest->id)->update([
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
