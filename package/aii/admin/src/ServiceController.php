<?php

namespace Aii\Admin;

use App\Http\Controllers\Controller;
use Aii\Admin\Models\Service;
use Aii\Admin\Models\ServiceAssignCategory;
use Aii\Admin\Models\ServiceAssignSubCategory;
use Aii\Admin\Models\ServiceCategory;
use Aii\Admin\Models\ServiceImage;
use Aii\Admin\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Validator;

class ServiceController extends Controller
{
    public function Index()
    {
        $aService = Service::with('category.serviceCategory')->with('subCategory.serviceSubCategory')->get();
        $aCategory = ServiceCategory::with('serviceSubCategory')->where('status', 1)->get();
        return view('admin::templates.service.service', compact('aCategory', 'aService'));
    }

    /*START::Get sub category service*/
    public function GetSubCategoryService(Request $oRequest)
    {
        $oSubCategory = ServiceSubCategory::with('serviceCat')->where('fk_id_service_category', $oRequest->id)->get();
        if ($oSubCategory) {
            return response()->json(array('data' => $oSubCategory, 'status' => 1));
        } else {
            $oSubCategory = 'Not found';
            return response()->json(array('data' => $oSubCategory, 'status' => 0));
        }
    }
    /*End::Get sub category service*/

    /*Start::service insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'service_name' => 'required',
            'slug' => 'required|unique:aii_service_master',
            'icon' => 'required',
            'sort_description' => 'required',
            'fk_id_service_category' => 'required',
            'fk_id_sub_service_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oService = new Service();
            $oService['name'] = $oRequest->service_name;
            $oService['slug'] = $oRequest->slug;
            $oService['icon'] = $oRequest->icon;
            $oService['sort_description'] = $oRequest->sort_description;
            $oService['brief_description'] = $oRequest->brief_description;
            $oServiceObj = $oService->save();

            $oResponse = $this->__insertServiceCategory($oService->id_service, $oRequest);
            $oResponse = $this->__insertSubServiceCategory($oService->id_service, $oRequest);

            for ($i = 0; $i < count($oRequest->image); $i++) {
                $oImage = new ServiceImage();
                $oImage['fk_id_service'] = $oService->id_service;
                $oImage['service_slug'] = $oService->slug;
                if (!empty($oRequest->image[$i])) {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageService($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }
            if ($oResponse) {
                session()->flash('msg', 'service Added');
            } else {
                session()->flash('msg', 'service Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }

    //insert service categories
    private function __insertServiceCategory($aServiceID, Request $oRequest)
    {
        for ($i = 0; $i < count($oRequest->fk_id_service_category); $i++) {
            $oServiceCategory = new ServiceAssignCategory();
            $oServiceCategory['fk_id_service'] = $aServiceID;
            $oServiceCategory['fk_id_service_category'] = $oRequest->fk_id_service_category[$i];
            $oServiceCategory->save();
        }
    }

    //insert service sub categories
    private function __insertSubServiceCategory($aServiceID, Request $oRequest)
    {
        for ($i = 0; $i < count($oRequest->fk_id_sub_service_category); $i++) {
            $aServiceSubCategory = ServiceSubCategory::where('id_service_Sub_category', $oRequest->fk_id_sub_service_category[$i])->first();
            $oServiceSubCategory = new ServiceAssignSubCategory();
            $oServiceSubCategory['fk_id_service'] = $aServiceID;
            $oServiceSubCategory['fk_id_service_category'] = $aServiceSubCategory->fk_id_service_category;
            $oServiceSubCategory['fk_id_sub_category'] = $oRequest->fk_id_sub_service_category[$i];
            $oServiceSubCategory->save();
        }
    }
    /*End::service insert*/

    /*Start:: Get service Edit*/
    public function GetService(Service $id)
    {
        $aServiceCategory = ServiceCategory::all();
        $aServiceSubCategory = ServiceSubCategory::all();
        $aServiceCat = ServiceAssignCategory::where('fk_id_service', $id->id_service)->get();
        $aServiceSubCat = ServiceAssignSubCategory::where('fk_id_service', $id->id_service)->get();

        $aCategory = array();
        foreach ($aServiceCat as $oCatagory) {
            $aCategory[] = $oCatagory->fk_id_service_category;
        };

        $aSubCategory = array();
        foreach ($aServiceSubCat as $oCatagory) {
            $aSubCategory[] = $oCatagory->fk_id_sub_category;
        };

        $aService = Service::with('category.serviceCategory')->with('subCategory.serviceSubCategory')->get();
        return view('admin::templates.service.service', compact('id', 'aService', 'aServiceCategory',
            'aServiceSubCategory', 'aCategory', 'aSubCategory', 'aServiceSubCategory'));
    }
    /*End:: Get service Edit*/

    /*Start:: Update service*/
    public function Update(Request $oRequest)
    {
        //dd($oRequest->selected_id);
        $aRules = array(
            'service_name' => 'required',
            'slug' => 'required',
            'icon' => 'required',
            'sort_description' => 'required',
            'fk_id_service_category' => 'required',
            'fk_id_sub_service_category' => 'required',
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = Service::where('id_service', $oRequest->selected_id)->update([
                'name' => $oRequest->service_name,
                'slug' => $oRequest->slug,
                'icon' => $oRequest->icon,
                'sort_description' => $oRequest->sort_description,
                'brief_description' => $oRequest->brief_description,
            ]);
            $oResCategory = $this->__updateServiceCategory($oRequest->selected_id, $oRequest);
            $oResSubCategory = $this->__updateSubServiceCategory($oRequest->selected_id, $oRequest);

            for ($i = 0; $i < count($oRequest->image); $i++) {
                $oImage = new ServiceImage();
                $oImage['fk_id_service'] = $oRequest->selected_id;
                $oImage['service_slug'] = $oRequest->slug;
                if (!empty($oRequest->image[$i])) {
                    $oUploadedImage = $oRequest->file('image')[$i];
                    $result = $this->__uploadImageService($oUploadedImage);
                    $oImage['name'] = $result;
                    $oImage->save();
                }
            }
            if ($oResponse) {
                session()->flash('msg', 'Service Category Updated');
            } else {
                session()->flash('msg', 'Service Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.service.index');
    }

    //update service categories
    private function __updateServiceCategory($aServiceID, Request $oRequest)
    {
        $oResponse = ServiceAssignCategory::whereNotIn('fk_id_service_category', $oRequest->fk_id_service_category)
            ->where('fk_id_service',$aServiceID)
            ->delete();
        for ($i = 0; $i < count($oRequest->fk_id_service_category); $i++) {
            $aServiceCategory = ServiceAssignCategory::firstOrCreate([
                'fk_id_service' => $aServiceID,
                'fk_id_service_category' => $oRequest->fk_id_service_category[$i]
            ]);
        }
    }

    //update service sub-categories
    private function __updateSubServiceCategory($aServiceID, Request $oRequest)
    {
        $oResponse = ServiceAssignSubCategory::whereNotIn('fk_id_sub_category', $oRequest->fk_id_sub_service_category)
            ->where('fk_id_service',$aServiceID)
            ->delete();
        for ($i = 0; $i < count($oRequest->fk_id_sub_service_category); $i++) {
            $aServiceSubCategory = ServiceSubCategory::where('id_service_sub_category', $oRequest->fk_id_sub_service_category[$i])->first();
            $oServiceSubCategory = ServiceAssignSubCategory::firstOrCreate([
                'fk_id_service' => $aServiceID,
                'fk_id_service_category' => $aServiceSubCategory->fk_id_service_category,
                'fk_id_sub_category' => $oRequest->fk_id_sub_service_category[$i]
            ]);
        }
    }
    /*End:: Update service */

    /*Start::Update status service*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = Service::where('id_service', $oRequest->id)->update([
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
    /*End::Update status service*/

    /*Start:: Delete service */
    public function Delete(Service $id)
    {
        $oResponse = $id->delete();
        $oResDelCategory = $this-> __deleteServiceCategory($id->id_service);
        $oResDelSubCategory = $this-> __deleteServiceSubCategory($id->id_service);
        $oResDelImage = $this-> __deleteServiceImage($id->id_service);
        if ($oResponse) {
            session()->flash('msg', 'Service Deleted');
        } else {
            session()->flash('msg', 'Service Not Deleted');
        }
        return redirect()->route('admin.service.index');
    }
    private function __deleteServiceCategory($nServiceId)
    {
        $oResDel = ServiceAssignCategory::where('fk_id_service', $nServiceId)->delete();
    }

    private function __deleteServiceSubCategory($nServiceId)
    {
        $oResDel = ServiceAssignSubCategory::where('fk_id_service', $nServiceId)->delete();
    }

    private function __deleteServiceImage($nServiceId)
    {
        $aProductImg = ServiceImage::where('fk_id_service', $nServiceId)->get();
        foreach($aProductImg As $oImage)
        {
            $result = $this-> __deleteImageFolder(public_path().config('constants.SERVICE_IMAGE_PATH').$oImage->name);
        }
        $oResDel = ServiceImage::where('fk_id_service', $nServiceId)->delete();
    }
    /*End:: Delete service*/

    /*START::SERVICE IMAGE*/
    /*START::Get Image service*/
    public function GetServiceImage(Request $oRequest)
    {
        $aServiceImage = ServiceImage::where('fk_id_service', $oRequest->id)->get();
        $html = view('admin::templates.service.service-modal-data', compact('aServiceImage'))->render();
        if ($html) {
            return response()->json(['status' => 1, 'html' => $html,'data' =>$aServiceImage, 'req_data' => $oRequest->all()]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function UpdateStatusServiceImage(Request $oRequest)
    {
        $oResponse = ServiceImage::where('id_service_image', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        $oImage = ServiceImage::find( $oRequest->id);
        $aServiceImage = ServiceImage::where('fk_id_service',$oImage->fk_id_service)->get();

        $html = view('admin::templates.service.service-modal-data', compact('aServiceImage'))->render();
        if($oResponse) {
            session()->flash('msg','Status Changed');
            return response()->json(array('data' => $oResponse,'id_service'=> $oImage->fk_id_service , 'status' => 1, 'html'=> $html));
        }else{
            $oResponse = 'not found';
            session()->flash('msg','Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }
    //image delete
    public function DeleteServiceImage(Request $oRequest)
    {
        $oImage = ServiceImage::find($oRequest->id);
        $aServiceImage = ServiceImage::where('fk_id_service', $oImage->fk_id_service)->get();
        $html = view('admin::templates.service.service-modal-data', compact('aServiceImage'))->render();
        $result = $this-> __deleteImageFolder(public_path().config('constants.SERVICE_IMAGE_PATH').$oImage->name);

        if($result['status'] == 1) {
            $oResponse = ServiceImage::find($oImage->id_service_image)->delete();
            if ($oResponse) {
                session()->flash('msg', 'Image Deleted');
                return array('status' => 1 ,'id_service'=> $oImage->fk_id_service, 'msg' => 'success', 'html' => $html );
            } else {
                session()->flash('msg', 'Image Not Deleted');
                return array('status' => 0 , 'msg' => 'fail');
            }
        }else {
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
    /*START:service image upload*/
    private function __uploadImageService($oUploadImage)
    {
        $sDestinationPath = public_path() . config('constants.SERVICE_IMAGE_PATH'); // upload path
        $sExtension = $oUploadImage->getClientOriginalExtension(); // getting image extension
        $sFileName = str_random(8) . '_' . time() . '.' . $sExtension; // renameing image
        $is_uploded = $oUploadImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if ($is_uploded) {
            return $sFileName;
        } else {
            return '';
        }
    }
    /*End:service image upload*/
    /*END::COMMON PRIVATE FUNCTIONS*/
}
