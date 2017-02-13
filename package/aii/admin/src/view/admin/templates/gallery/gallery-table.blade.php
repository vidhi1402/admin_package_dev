<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Gallery list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="product-info-table">
                        <thead>
                        <tr>
                            <th>Gallery Name </th>
                            <th>Slug</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aGallery as $agalleryData)
                            <tr>
                                <td>{{ $agalleryData->name }}</td>
                                <td>{{ $agalleryData->slug }}</td>
                                <td>@foreach($agalleryData->GalleryCategory as $aCategory)
                                            {{ $aCategory->name }} ,
                                    @endforeach
                                </td>
                                {{--<td>@foreach($agalleryData->subCategory as $aSubCategory)
                                        @foreach($aSubCategory->productSubCategory as $oSubCategory)
                                            {{ $oSubCategory->name }} ,
                                        @endforeach
                                    @endforeach</td>--}}
                                <td>
                                    @if($agalleryData->status  == 1)
                                        <button id="active" class="badge btn-success" onclick="changeStatus(this,'{{$agalleryData->id_gallery}}');" value="1">Active</button>
                                    @else
                                        <button id="deactive" class="badge btn-danger" onclick="changeStatus(this,'{{$agalleryData->id_gallery}}');"  value="0">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs" onclick="viewImageDetail({{ $agalleryData->id_gallery}})"><i class="fa fa-picture-o" ></i></a>
                                    <a href="{{ route('admin.gallery.edit',array( 'id' => $agalleryData->id_gallery)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.gallery.delete',array( 'id' => $agalleryData->id_gallery)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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
        <div class="modal fade modal-dialog-center" id="modal_product_image" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Product Image</h4>
                        </div>
                        <div class="panel-body" id="image_Detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

