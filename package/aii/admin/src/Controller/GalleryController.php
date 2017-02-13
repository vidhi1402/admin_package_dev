<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\GalleryAssignCategory;
use Aii\Admin\Models\GalleryCategory;
use Aii\Admin\Models\GalleryImg;
use Aii\Admin\Models\GalleryMaster;
use Aii\Admin\Models\GallerySubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class GalleryController extends AdminController
{
    public function Index()
    {
        $aGalleryCategory   =   GalleryCategory::with('GallerySubCategory')->get();
        $aGallerySubCategory    =  GallerySubCategory::get();
        $aGallery   =   GalleryMaster::with('GalleryCategory','GalleryImage')->get();
        return view('admin::templates.gallery.gallery',compact('aGallery','aGalleryCategory','aGallerySubCategory'));
    }
    /*START::Get sub category product*/
    public function GetSubCategoryGallery(Request $oRequest)
    {
        $oSubCategory = GallerySubCategory::with('GalleryCategory')->where('fk_id_gallery_category', $oRequest->id)->get();
        if ($oSubCategory) {
            return response()->json(array('data' => $oSubCategory, 'status' => 1));
        } else {
            $oSubCategory = 'Not found';
            return response()->json(array('data' => $oSubCategory, 'status' => 0));
        }
    }
    /*End::Get sub category product*/

    /*Start::Gallery insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|unique:aii_product_master',
            'slug' => 'required|unique:aii_product_master',
            'sort_description' => 'required',
            /*'fk_id_product_category' => 'required',*/
            // 'fk_id_sub_product_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oGallery = new GalleryMaster();
            $oGallery['name'] = $oRequest->name;
            $oGallery['slug'] = $oRequest->slug;
            $oGallery['sort_description'] = $oRequest->sort_description;
            $oGallery['brief_description'] = $oRequest->brief_description;
            $oGallery['download_link'] = $oRequest->download_link;
            $oGallery['brochure_link'] = $oRequest->brochure_link;
            $oGalleryObj = $oGallery->save();

            //$oResCategory = $this->__insertGallertCategory($oGallery->id_gallery, $oRequest);
            //$oResponse = $this->__insertSubProductCategory($oGallery->id_product, $oRequest);


            for ($i = 0; $i < count($oRequest->image); $i++) {

                $oImage = new GalleryImg();
                $oImage['fk_id_gallery'] = $oGallery->id_gallery;
                $oImage['gallery_slug'] = $oGallery->slug;

                if (!empty($oRequest->image[$i]))
                {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageGallery($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }
            if ($oGalleryObj) {
                session()->flash('msg', 'Gallery Added');
            } else {
                session()->flash('msg', 'Gallery Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    /*START:product image upload*/
    private function __uploadImageGallery($oUploadImage)
    {
        $sDestinationPath = public_path() . config('constants.GALLERY_IMAGE'); // upload path
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

    //insert product categories
    private function __insertGallertCategory($aGalleryID, Request $oRequest)
    {
        for ($i = 0; $i < count($oRequest->fk_id_gallery_category); $i++) {
            $oProductCategory = new GalleryAssignCategory();
            $oProductCategory['fk_id_gallery'] = $aGalleryID;
            $oProductCategory['fk_id_gallery_category'] = $oRequest->fk_id_gallery_category[$i];
            $oProductCategory->save();

        }
    }

    /*Start:: Delete product */
    public function Delete(GalleryMaster $id)
    {
        $oResponse = $id->delete();
        //$oResDelCategory = $this->__deleteProductCategory($id->id_product);
        //$oResDelSubCategory = $this->__deleteProductSubCategory($id->id_product);
        $oResDelImage = $this->__deleteProductImage($id->id_gallery);

        if ($oResponse) {
            session()->flash('msg', 'Gallery Deleted');
        } else {
            session()->flash('msg', 'Gallery Not Deleted');
        }
        return redirect()->route('admin.gallery.index');
    }

    private function __deleteProductImage($oGalleryId)
    {
        $aProductImg = GalleryImg::where('fk_id_gallery', $oGalleryId)->get();
        foreach ($aProductImg As $oImage) {
            $result = $this->__deleteImageFolder(public_path() . config('constants.GALLERY_IMAGE') . $oImage->name);
        }
        $oResDel = GalleryImg::where('fk_id_gallery', $oGalleryId)->delete();
    }
    /*End:: Delete product*/

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

    /*START::Get Image product*/
    public function GetGalleryImage(Request $oRequest)
    {
        $aGalleryImage = GalleryImg::where('fk_id_gallery', $oRequest->id)->get();
        $html = view('admin::templates.gallery.gallery-modal-data', compact('aGalleryImage'))->render();
        if ($html) {
            return response()->json(['status' => 1, 'html' => $html, 'data' => $aGalleryImage, 'req_data' => $oRequest->all()]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
    //image delete
    public function DeleteGalleryImage(Request $oRequest)
    {
        $oImage = GalleryImg::find($oRequest->id);
        $aGalleryImage = GalleryImg::where('fk_id_gallery', $oImage->fk_id_gallery)->get();
        $html = view('admin::templates.gallery.gallery-modal-data', compact('aGalleryImage'))->render();

        $result = $this->__deleteImageFolder(public_path() . config('constants.GALLERY_IMAGE') . $oImage->name);

        if ($result['status'] == 1) {
            $oResponse = GalleryImg::find($oImage->id_gallery_image)->delete();
            if ($oResponse) {
                session()->flash('msg', 'Image Deleted');
                return array('status' => 1, 'id_gallery' => $oImage->fk_id_gallery, 'msg' => 'success', 'html' => $html);
            } else {
                session()->flash('msg', 'Image Not Deleted');
                return array('status' => 0, 'msg' => 'fail');
            }
        } else {
            session()->flash('msg', 'Image Not Deleted');
        }
        return back();
    }

    /*Start:: Get product Edit*/
    public function GetGallery(GalleryMaster $id)
    {
        $aGalleryCategory   =   GalleryCategory::with('GallerySubCategory')->get();
        $aGallerySubCategory    =  GallerySubCategory::get();
        $aGallery   =   GalleryMaster::with('GalleryCategory','GalleryImage')->get();
        return view('admin::templates.gallery.gallery',compact('id','aGallery','aGalleryCategory','aGallerySubCategory'));
    }
    /*End:: Get product Edit*/

    public function Update(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'slug' => 'required',
            'sort_description' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = GalleryMaster::where('id_gallery', $oRequest->selected_id)->update([
                'name' => $oRequest->name,
                'slug' => $oRequest->slug,
                'sort_description' => $oRequest->sort_description,
                'brief_description' => $oRequest->brief_description,
                'download_link' => $oRequest->download_link,
                'brochure_link' => $oRequest->brochure_link,
            ]);

            //$oResCategory = $this->__updateProductCategory($oRequest->selected_id, $oRequest);
            //$oResSubCategory = $this->__updateSubProductCategory($oRequest->selected_id, $oRequest);

            for ($i = 0; $i < count($oRequest->image); $i++) {
                $oImage = new GalleryImg();
                $oImage['fk_id_gallery'] = $oRequest->selected_id;
                $oImage['gallery_slug'] = $oRequest->slug;
                if (!empty($oRequest->image[$i])) {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageGallery($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }

            if ($oResponse) {
                session()->flash('msg', 'gallery Updated');
            } else {
                session()->flash('msg', 'gallery Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.gallery.index');
    }



}
