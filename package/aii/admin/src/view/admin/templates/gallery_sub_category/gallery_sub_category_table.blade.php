<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Gallery Sub Category list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="product_sub_category_info_table">
                        <thead>
                        <tr>
                            <th>Gallery Sub Category Name </th>
                            <th>Slug</th>
                            <th>Gallery Category Name </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aGallerySubCategory as $oSubCategory)
                            <tr>
                                <td>{{ $oSubCategory->name }}</td>
                                <td>{{ $oSubCategory->slug }}</td>
                                <td>{{ $oSubCategory->GalleryCategory[0]->name }}</td>
                                <td>
                                    @if($oSubCategory->status  == 1)
                                        <button id="active" class="badge btn-success" onclick="changeStatus(this,'{{$oSubCategory->id_gallery_sub_category}}');" value="1">Active</button>
                                    @else
                                        <button id="deactive" class="badge btn-danger" onclick="changeStatus(this,'{{$oSubCategory->id_gallery_sub_category}}');"  value="0">Deactive</button>
                                    @endif
                                </td>
                                <td> <a href="{{ route('admin.gallery_sub_ategory.edit',array( 'id' => $oSubCategory->id_gallery_sub_category)) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.gallery_sub_ategory.delete',array( 'id' => $oSubCategory->id_gallery_sub_category)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

