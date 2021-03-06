<header class="panel-heading">
    Gallery Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('admin.gallery.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Gallery Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="Galllery Name"
                           name="name" value="{{ old('name') }}{{$id->name}}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Slug:</label>

                    <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                           name="slug" value="{{ old('slug') }}{{$id->slug}}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('download_link') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Download link:</label>

                    <input class="form-control has-feedback-left" id="download_link" placeholder="download link"
                           name="download_link" value="{{ old('download_link') }}{{$id->download_link}}"
                           type="text">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('brochure_link') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Brochure link:</label>

                    <input class="form-control has-feedback-left" id="brochure_link" placeholder="brochure link"
                           name="brochure_link" value="{{ old('brochure_link') }}{{$id->brochure_link}}"
                           type="text">
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group{{ $errors->has('sort_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Sort Description:</label>

            <textarea class="form-control has-feedback-left" id="sort_description" placeholder="Sort description"
                      name="sort_description"
                      type="text">{{ old('sort_description') }}{{$id->sort_description}}</textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group{{ $errors->has('brief_description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Brief Description:</label>

            <textarea class="form-control has-feedback-left" id="brief_description" placeholder="Breif description"
                      name="brief_description"
                      type="text">{{ old('brief_description') }}{{$id->brief_description}}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Category:</label> <br>
                    <select multiple="multiple" class="multi-select"  id="fk_id_gallery_category" name="fk_id_gallery_category[]">
                        @foreach( $aGalleryCategory as $oCategory)
                            <option  onclick="getSubCategory('{{$oCategory->id_gallery_category}}')" value="{{ $oCategory->id_gallery_category }}">
                                {{ $oCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category:</label> <br>
                    <select multiple="multiple" class="multi-select" id="fk_id_sub_gallery_category" name="fk_id_sub_gallery_category[]">
                        {{-- <option  value="">
                             please select
                         </option>
                          @foreach( $aGalleryCategory as $oCategory)
                              <optgroup style="font-size: large;"  label="{{ strtoupper($oCategory->name) }}">
                                  @foreach( $oCategory->GallerySubCategory as $oSubCategory)
                                      <option  value="{{ $oSubCategory->id_gallery_sub_category }}">
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
                    < <button type="submit" value="{{ $id->id_gallery }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


