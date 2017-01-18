<header class="panel-heading">
    Service Update
</header>
<div class="panel-body">
    <div class="row">

        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('admin.service.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Service Name:</label>
                    <input class="form-control has-feedback-left" id="service_name" placeholder="Service Name"
                           name="service_name" value="{{ $id->name }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Slug:</label>

                    <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                           name="slug" value="{{ $id->slug }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Icon:</label>

                    <input class="form-control has-feedback-left" id="icon" placeholder="icon name"
                           name="icon" value="{{ $id->icon }}"
                           type="text">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('sort_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Sort Description:</label>

            <textarea class="form-control has-feedback-left" id="sort_description" placeholder="Sort description"
                      name="sort_description" value=""
                      type="text">{{ $id->sort_description }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('brief_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Brief Description:</label>

            <textarea class="form-control has-feedback-left" id="brief_description" placeholder="Breif description"
                      name="brief_description" value=""
                      type="text">{{ $id->brief_description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Category:</label> <br>
                    <select multiple="multiple" class="multi-select" id="fk_id_service_category" name="fk_id_service_category[]">
                        @foreach( $aServiceCategory as $oCategory )
                            @if( in_array($oCategory->id_service_category ,(array)($aCategory)))
                                <option   value="{{ $oCategory->id_service_category }}" {{ "selected"}} >
                                    {{ $oCategory->name }}</option>
                            @else
                                <option onclick="getSubCategory('{{$oCategory->id_service_category}}')" value="{{ $oCategory->id_service_category }}">{{ $oCategory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category:</label> <br>
                    <select multiple="multiple" class="multi-select" id="fk_id_sub_service_category" name="fk_id_sub_service_category[]">
                        @foreach( $aServiceSubCategory as $oSubCategory )
                            @if( in_array($oSubCategory->id_service_sub_category ,(array)($aSubCategory)))
                                <option  value="{{ $oSubCategory->id_service_sub_category }}" {{ "selected"}} >
                                    {{ $oSubCategory->name }}</option>
                            @else
                               {{-- <option value="{{ $oSubCategory->id_service_sub_category }}">{{ $oSubCategory->name }}</option>--}}
                            @endif
                        @endforeach
                    </select>
                </div>            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}" id="upload_img">
                    <input type="button" name="" id="add_more" onclick="addImage()" class="btn btn-info"
                           value="Add Image"></br>
                    <label class="sr-input" for="exampleInputPassword2">Image:</label>

                    <div id="browse_btn">
                        <input class="form-control has-feedback-left" id="image" placeholder="Image Name"
                               name="image[]" value=""
                               type="file" multiple="multiple">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id_service }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



