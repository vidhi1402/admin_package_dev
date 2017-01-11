<header class="panel-heading">
    Product Update
</header>
<div class="panel-body">
    <div class="row">

        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('admin.product.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Product Name:</label>
                    <input class="form-control has-feedback-left" id="product_name" placeholder="Product Name"
                           name="product_name" value="{{ $id->name }}"
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
                <div class="form-group{{ $errors->has('download_link') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Download link:</label>

                    <input class="form-control has-feedback-left" id="download_link" placeholder="download link"
                           name="download_link" value="{{ $id->download_link }}"
                           type="text">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('brochure_link') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Brochure link:</label>

                    <input class="form-control has-feedback-left" id="brochure_link" placeholder="brochure link"
                           name="brochure_link" value="{{ $id->brochure_link }}"
                           type="text">
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('product_desc_url') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Product Url Description</label>

            <textarea class="form-control has-feedback-left" id="product_desc_url" placeholder="product description url"
                      name="product_desc_url"
                      type="text">{{ $id->product_desc_url }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
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
                    <select multiple="multiple" class="multi-select" id="fk_id_product_category" name="fk_id_product_category[]">
                        @foreach( $aProductCategoryList as $oCategory )
                            @if( in_array($oCategory->id_product_category ,(array)($aCategory)))
                                <option   value="{{ $oCategory->id_product_category }}" {{ "selected"}} >
                                    {{ $oCategory->name }}</option>
                            @else
                                <option onclick="getSubCategory('{{$oCategory->id_product_category}}')" value="{{ $oCategory->id_product_category }}">{{ $oCategory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category:</label> <br>
                    <select multiple="multiple" class="multi-select" id="fk_id_sub_product_category" name="fk_id_sub_product_category[]">
                        @foreach( $aProductSubCategoryList as $oSubCategory )
                            @if( in_array($oSubCategory->id_product_sub_category ,(array)($aSubCategory)))
                                <option  value="{{ $oSubCategory->id_product_sub_category }}" {{ "selected" }} >
                                    {{ $oSubCategory->name }}</option>
                            @else
                               {{-- <option value="{{ $oSubCategory->id_product_sub_category }}">{{ $oSubCategory->name }}</option>--}}
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
                    <button type="submit" value="{{ $id->id_product }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



