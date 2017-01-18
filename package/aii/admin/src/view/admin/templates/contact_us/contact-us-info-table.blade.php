<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Contact-Us list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="contact_us_info_table">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>Emil</th>
                            <th>Contact No</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aContact as $oContact)
                            <tr>
                                <td>{{ $oContact->name }}</td>
                                <td>{{ $oContact->email }}</td>
                                <td>{{ $oContact->contact_no }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs" onclick="viewMessage({{ $oContact->id_contact}})"><i class="fa fa-envelope" ></i></a>
                                   {{-- <a href="{{ route('admin.service.edit',array( 'id' => $oContact->project_id)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>--}}
                                    <a href="{{ route('admin.contact_us.delete',array( 'id' => $oContact->id_contact)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

{{--aii modal--}}

<section class="panel">
    <div class="panel-body">
        <div class="modal fade modal-dialog-center" id="modal_contact_message" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">MESSAGE</h4>
                        </div>
                        <div class="panel-body" id="message_Detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

