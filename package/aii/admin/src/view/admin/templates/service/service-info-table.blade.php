<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Service list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="service-info-table">
                        <thead>
                        <tr>
                            <th>Service Name </th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aService as $oService)
                            <tr>
                                <td>{{ $oService->name }}</td>
                                <td>{{ $oService->slug }}</td>
                                <td>@foreach($oService->category as $aCategory)
                                        @foreach($aCategory->serviceCategory as $oCategory)
                                            {{ $oCategory->name }} ,
                                        @endforeach
                                    @endforeach </td>
                                <td>@foreach($oService->subCategory as $aSubCategory)
                                        @foreach($aSubCategory->serviceSubCategory as $oSubCat)
                                            {{ $oSubCat->name }} ,
                                        @endforeach
                                    @endforeach</td>
                                <td>
                                    @if($oService->status  == 1)
                                        <button id="active" class="badge btn-success" onclick="changeStatus(this,'{{$oService->id_service}}');" value="1">Active</button>
                                    @else
                                        <button id="deactive" class="badge btn-danger" onclick="changeStatus(this,'{{$oService->id_service}}');"  value="0">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs" onclick="viewDetails({{ $oService->id_service}})"><i class="fa fa-picture-o" ></i></a>
                                    <a href="{{ route('admin.service.edit',array( 'id' => $oService->id_service)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.service.delete',array( 'id' => $oService->id_service)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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
        <div class="modal fade modal-dialog-center" id="modal_service_image" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Service Image</h4>
                        </div>
                        <div class="panel-body" id="image-Details">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

