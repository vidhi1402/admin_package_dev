<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\ServiceCategory;
use Aii\Admin\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ServiceSubCategoryController extends AdminController
{
    public function Index(){

        $aServiceCategory = ServiceCategory::all();
        $aServiceSubCategory = ServiceSubCategory::with('serviceCategory')->get();
        return view('admin::templates.service_sub_category.service-sub-category',compact('aServiceCategory',
            'aServiceSubCategory'));
    }

    /*Start::service sub-category insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'fk_id_service_category' => 'required',
            'name' => 'required|unique:aii_service_sub_category',
            'slug' => 'required|unique:aii_service_sub_category',

        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oService = new ServiceSubCategory();
            $oService['fk_id_service_category'] = $oRequest->fk_id_service_category;
            $oService['name'] = $oRequest->name;
            $oService['slug'] = $oRequest->slug;
            $oResponse = $oService->save();

            if ($oResponse) {
                session()->flash('msg', 'Service Sub Category Added');
            } else {
                session()->flash('msg', 'Service Sub Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::service sub-category insert*/

    /*Start:: get service sub-category edit*/
    public function GetServiceSubCategory(ServiceSubCategory $id)
    {
        $aServiceCategory = ServiceCategory::all();
        $aServiceSubCategory = ServiceSubCategory::with('serviceCategory')->get();
        return view('admin::templates.service_sub_category.service-sub-category', compact('id',
            'aServiceSubCategory','aServiceCategory'));
    }
    /*End::service sub-category edit*/

    /*Start::service sub-category Update*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'fk_id_service_category' => 'required',
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = ServiceSubCategory::where('id_service_sub_category', $oRequest->selected_id)->update([
                'fk_id_service_category' => $oRequest->fk_id_service_category,
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
            if ($oResponse) {
                session()->flash('msg', 'Service Sub Category Updated');
            } else {
                session()->flash('msg', 'Service Sub Category Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.service_sub_category.index');
    }
    /*End::service sub-category Update*/

    /*Start::service sub-category Delete*/
    public function Delete(ServiceSubCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Service Sub Category Deleted');
        } else {
            session()->flash('msg', 'Service Sub Category Not Deleted');
        }
        return redirect()->route('admin.service_sub_category.index');
    }
    /*End::service sub-category delete*/

    /*Start::service sub-category Change-status*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = ServiceSubCategory::where('id_service_sub_category', $oRequest->id)->update([
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
    /*End::service sub-category Change-status*/

}
