<?php

namespace Aii\Admin;

use App\Http\Controllers\Controller;
use Aii\Admin\Models\TeamMember;
use Illuminate\Http\Request;
use Validator;

class TeamMemberController extends Controller
{
    public function Index()
    {
        $aTeamMember = TeamMember::all();
        return view('admin::templates.team_member.team-member', compact('aTeamMember'));
    }

    /*Start::team-member insert*/
    public function Insert(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'position' => 'required',
            'display_index' => 'required|unique:aii_team_member_master',
            'picture' => 'required',
            'description' => 'required'
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oPicResult = $this->__uploadPicture($oRequest);
            $oTeamMember = new TeamMember();
            $oTeamMember['name'] = $oRequest->name;
            $oTeamMember['position'] = $oRequest->position;
            $oTeamMember['facebook_url'] = $oRequest->facebook_url;
            $oTeamMember['twitter_url'] = $oRequest->twitter_url;
            $oTeamMember['google_plus_url'] = $oRequest->google_plus_url;
            $oTeamMember['linked_in_url'] = $oRequest->linked_in_url;
            $oTeamMember['website'] = $oRequest->website;
            $oTeamMember['display_index'] = $oRequest->display_index;
            $oTeamMember['picture'] = $oPicResult;
            $oTeamMember['description'] = $oRequest->description;
            $oResponse = $oTeamMember->save();

            if ($oResponse) {
                session()->flash('msg', 'Member Added');
            } else {
                session()->flash('msg', 'Member Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return back();
    }
    /*End::team-member insert*/

    /*Start:: Get team-member Edit*/
    public function GetTeamMember(TeamMember $id)
    {
        $aTeamMember = TeamMember::all();
        return view('admin::templates.team_member.team-member', compact('id', 'aTeamMember'));
    }
    /*End:: Get team-member Edit*/

    /*Start:: Update service category*/
    public function Update(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required',
            'position' => 'required',
            'display_index' => 'required',
            'description' => 'required'
        );
        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oResponse = TeamMember::where('id_member', $oRequest->selected_id)->update([
                'name' => $oRequest->name,
                'position' => $oRequest->position,
                'facebook_url' => $oRequest->facebook_url,
                'twitter_url' => $oRequest->twitter_url,
                'google_plus_url' => $oRequest->google_plus_url,
                'linked_in_url' => $oRequest->linked_in_url,
                'website' => $oRequest->website,
                'display_index' => $oRequest->display_index,
                'description' => $oRequest->description,
            ]);

            $oResult = $this->__updateImage($oRequest);
            if ($oResponse) {
                session()->flash('msg', 'Member Data Updated');
            } else {
                session()->flash('msg', 'Member Data Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('admin.team_member.index');
    }

    /*End:: team-member update */

    private function __updateImage(Request $oRequest)
    {
        $oImage = TeamMember::find($oRequest->selected_id);
        if (!empty($oRequest->picture)) {
            $result = $this->__deleteImageFolder(public_path() . config('constants.TEAM_MEMBER_IMAGE') . $oImage->picture);
            if ($result['status'] == 1) {
                $oPicResult = $this->__uploadPicture($oRequest);
                $oResponse = TeamMember::where('id_member', $oRequest->selected_id)->update([
                    'picture' => $oPicResult,
                ]);
            }
        }
    }

    /*Start:: Delete team-member */
    public function Delete(TeamMember $id)
    {
        $oResult = $this->__deleteImageFolder(public_path() . config('constants.TEAM_MEMBER_IMAGE') . $id->picture);
        if ($oResult['status'] == 1) {
            $oResponse = $id->delete();
            if ($oResponse) {
                session()->flash('msg', 'Member Deleted');
            } else {
                session()->flash('msg', 'Member Not Deleted');
            }
        }

        return redirect()->route('admin.team_member.index');
    }
    /*End:: Delete team-member*/

    /*Start::Update status team-member*/
    public function UpdateStatus(Request $oRequest)
    {
        $oResponse = TeamMember::where('id_member', $oRequest->id)->update([
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
    /*End::Update status team-member*/

    /*START::COMMON PRIVATE FUNCTIONS*/
    /*START:team-member image upload*/
    private function __uploadPicture(Request $oRequest)
    {
        $oUploadedImage = $oRequest->file('picture');
        $sDestinationPath = public_path() . config('constants.TEAM_MEMBER_IMAGE'); // upload path
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
    /*End::team member IMAGE*/
    /*END::COMMON PRIVATE FUNCTIONS*/
}
