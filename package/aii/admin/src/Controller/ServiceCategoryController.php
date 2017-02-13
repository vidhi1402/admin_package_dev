<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ServiceCategoryController extends AdminController
{
    public function Index(){

        $aServiceCategory = ServiceCategory::all();
        return view('admin::templates.service_category.service-category',compact('aServiceCategory'));
    }

    /*Start::service category insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|unique:aii_service_category_master',
            'slug' => 'required|unique:aii_service_category_master',

        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oService = new ServiceCategory();
            $oService['name'] = $oRequest->name;
            $oService['slug'] = $oRequest->slug;
            $oResponse = $oService->save();

            if ($oResponse) {
                session()->flash('msg', 'Service Category Added');
            } else {
                session()->flash('msg', 'Service Category Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::service category insert*/

    /*Start:: Get service category Edit*/
    public function GetServiceCategory(ServiceCategory $id)
    {
        $aServiceCategory = ServiceCategory::all();
        return view('admin::templates.service_category.service-category', compact('id', 'aServiceCategory'));
    }
    /*End:: Get service category Edit*/

    /*Start:: Update service category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'slug' => 'required',
            'name' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {
            $oResponse = ServiceCategory::where('id_service_category', $oRequest->selected_id)->update([
                'slug' => $oRequest->slug,
                'name' => $oRequest->name,
            ]);
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
        return redirect()->route('admin.service_category.index');
    }
    /*End:: Update service category */

    /*Start:: Delete service category */
    public function Delete(ServiceCategory $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Service Category Deleted');
        } else {
            session()->flash('msg', 'Service Category Not Deleted');
        }
        return redirect()->route('admin.service_category.index');
    }
    /*End:: Delete service-category*/

    /*Start::Update status service-category*/
    public  function UpdateStatus(Request $oRequest)
    {
        $oResponse = ServiceCategory::where('id_service_category', $oRequest->id)->update([
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
    /*End::Update status service-category*/
}
