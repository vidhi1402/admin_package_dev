<?php

namespace Aii\Admin\Controller;

use App\Http\Controllers\Controller;
use Aii\Admin\Models\Testimonial;
use Illuminate\Http\Request;
use Validator;

class TestimonialController extends AdminController
{
    public function Index()
    {
        $aTestimonial = Testimonial::all();
        return view('admin::templates.testimonial.testimonial', compact('aTestimonial'));
    }

    /*Start::testimonial insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'designation' => 'required',
            'organization' => 'required',
            'display_index' => 'required|unique:aii_testimonial_master',
            'picture' => 'required',
            'review' => 'required'
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oPicResult = $this->__uploadPicture($oRequest);
            $oTestimonial = new Testimonial();
            $oTestimonial['name'] = $oRequest->name;
            $oTestimonial['designation'] = $oRequest->designation;
            $oTestimonial['organization'] = $oRequest->organization;
            $oTestimonial['display_index'] = $oRequest->display_index;
            $oTestimonial['picture'] = $oPicResult;
            $oTestimonial['review'] = $oRequest->review;
            $oResponse = $oTestimonial->save();

            if ($oResponse) {
                session()->flash('msg', 'Testimonial Added');
            } else {
                session()->flash('msg', 'Testimonial Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::testimonial insert*/

    /*Start:: Get testimonial Edit*/
    public function GetTestimonial(Testimonial $id)
    {
        $aTestimonial = Testimonial::all();
        return view('admin::templates.testimonial.testimonial', compact('id', 'aTestimonial'));
    }
    /*End:: Get testimonial Edit*/

    /*Start:: Update service category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'designation' => 'required',
            'organization' => 'required',
            'display_index' => 'required',
            'review' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oResponse = Testimonial::where('id_testimonial', $oRequest->selected_id)->update([
                'name' => $oRequest->name,
                'designation' => $oRequest->designation,
                'organization' => $oRequest->organization,
                'display_index' => $oRequest->display_index,
                'review' => $oRequest->review,
            ]);

            $oResult = $this->__updateImage($oRequest);
            if ($oResponse) {
                session()->flash('msg', 'Testimonial Updated');
            } else {
                session()->flash('msg', 'Testimonial Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.testimonial.index');
    }
    /*End:: Testimonial update */

    private function __updateImage(Request $oRequest)
    {
        $oTestimonial = Testimonial::find($oRequest->selected_id);
        if (!empty($oRequest->picture)) {
            $result = $this->__deleteImageFolder(public_path() . config('constants.TESTIMONIAL_IMAGE') . $oTestimonial->picture);
            if ($result['status'] == 1) {
                $oPicResult = $this->__uploadPicture($oRequest);
                $oResponse = Testimonial::where('id_testimonial', $oRequest->selected_id)->update([
                    'picture' => $oPicResult,
                ]);
            }
        }
    }

    /*Start:: Delete Testimonial */
    public function Delete(Testimonial $id)
    {
        $result = $this->__deleteImageFolder(public_path() . config('constants.TESTIMONIAL_IMAGE') . $id->picture);
        if($result['status'] == 1) {
            $oResponse = $id->delete();
            if ($oResponse) {
                session()->flash('msg', 'Testimonial Deleted');
            } else {
                session()->flash('msg', 'Testimonial Not Deleted');
            }
        }
        return redirect()->route('admin.testimonial.index');
    }
    /*End:: Delete Testimonial*/

    /*Start::Update status Testimonial*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = Testimonial::where('id_testimonial', $oRequest->id)->update([
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
    /*End::Update status Testimonial*/

    /*START::COMMON PRIVATE FUNCTIONS*/
    /*START:testimonial image upload*/
    private function __uploadPicture(Request $oRequest)
    {
        $oUploadedImage = $oRequest->file('picture');
        $sDestinationPath = public_path() . config('constants.TESTIMONIAL_IMAGE'); // upload path
        $sExtension = $oUploadedImage->getClientOriginalExtension(); // getting image extension
        $sFileName = str_random(8) . '_' . time() . '.' . $sExtension; // renameing image
        $is_uploded = $oUploadedImage->move($sDestinationPath, $sFileName); // uploading file to given path
        if ($is_uploded) {
            return $sFileName;
        } else {
            return '';
        }
    }
    /*End:product image upload*/

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
    /*End::testimonial IMAGE*/
    /*END::COMMON PRIVATE FUNCTIONS*/
}
