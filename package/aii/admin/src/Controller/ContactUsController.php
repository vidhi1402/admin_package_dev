<?php

namespace Aii\Admin\Controller;

use Aii\Admin\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends AdminController
{
    public function Index(){
        $aContact = ContactUs::all();
        return view('admin::templates.contact_us.contact-us',compact('aContact'));
    }

    /*start::get contact-data*/
    public function GetMessageContact(Request $oRequest)
    {
        $oContact = ContactUs::where('id_contact', $oRequest->id)->first();
        $html = view('admin.templates.contact_us.contact-us-modal-data', compact('oContact'))->render();
        if ($html) {
            return response()->json(['status' => 1, 'html' => $html,'data' =>$oContact, 'req_data' => $oRequest->all()]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
    /*End::get contact-data*/

    /*Start::contact Delete*/
    public function Delete(ContactUs $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Contact Deleted');
        } else {
            session()->flash('msg', 'Contact Not Deleted');
        }
        return redirect()->route('admin.contact_us.index');
    }
    /*End::contact delete*/
}
