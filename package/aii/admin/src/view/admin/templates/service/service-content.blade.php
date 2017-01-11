<header class="panel-heading">
    Service Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('admin.service.insert') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('service_name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Service Name:</label>

                    <input class="form-control has-feedback-left" id="service_name" placeholder="Service Name"
                           name="service_name" value="{{ old('service_name') }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Slug:</label>

                    <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                           name="slug" value="{{ old('slug') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Icon:</label>

                    <input class="form-control has-feedback-left" id="icon" placeholder="icon name"
                           name="icon" value="{{ old('icon') }}"
                           type="text">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('sort_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Sort Description:</label>

            <textarea class="form-control has-feedback-left" id="sort_description" placeholder="Sort description"
                      name="sort_description"
                      type="text">{{ old('sort_description') }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('brief_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Brief Description:</label>

            <textarea class="form-control has-feedback-left" id="brief_description" placeholder="Breif description"
                      name="brief_description"
                      type="text">{{ old('brief_description') }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Category:</label> <br>
                    <select multiple="multiple" class="multi-select"  id="fk_id_service_category" name="fk_id_service_category[]">
                        @foreach( $aCategoryList as $oCategory)
                                    <option  onclick="getSubCategory('{{$oCategory->id_service_category}}')" value="{{ $oCategory->id_service_category }}">
                                        {{ $oCategory->name }}
                                    </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category:</label> <br>
                    <select multiple="multiple" class="multi-select" id="fk_id_sub_service_category" name="fk_id_sub_service_category[]">
                        {{--<option  value="">
                            please select
                        </option>--}}
                       {{-- @foreach( $aCategoryList as $oCategory)
                            <optgroup style="font-size: large;"  label="{{ strtoupper($oCategory->name) }}">
                                @foreach( $oCategory->serviceSubCategory as $oSubCategory)
                                    <option  value="{{ $oSubCategory->id_service_sub_category }}">
                                        {{ $oSubCategory->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach--}}
                    </select>
                </div>
            </div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


