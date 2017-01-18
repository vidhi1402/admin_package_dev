<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
              Team Member list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="team_member_info_table">
                        <thead>
                        <tr>
                            <th>Image </th>
                            <th>Name </th>
                            <th>Position</th>
                            <th>index </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aTeamMember as $oTeamMember)
                            <tr>
                                <td><img height="50" width="50" src="{{config('constants.TEAM_MEMBER_IMAGE').$oTeamMember ->picture}}"
                                         alt="{{$oTeamMember->picture }}"></td>
                                <td>{{ $oTeamMember->name }}</td>
                                <td>{{ $oTeamMember->position }}</td>
                                <td>{{ $oTeamMember->display_index }}</td>
                                <td>
                                    @if($oTeamMember->status  == 1)
                                     <button id="active" class="badge btn-success" onclick="changeStatus(this,'{{$oTeamMember->id_member}}');" value="1">Active</button>
                                     @else
                                        <button id="deactive" class="badge btn-danger" onclick="changeStatus(this,'{{$oTeamMember->id_member}}');"  value="0">Deactive</button>
                                    @endif
                                </td>
                                 <td> <a href="{{ route('admin.team_member.edit',array( 'id' => $oTeamMember->id_member)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                      <a href="{{ route('admin.team_member.delete',array( 'id' => $oTeamMember->id_member)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>



{{--
<section class="panel">
    <div class="panel-body">

        <div class="modal fade modal-dialog-center" id="model_bs_agent_info" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Licensee Details</h4>
                        </div>
                        <div class="panel-body" id="model-bs-agent-info">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
--}}

