<header class="panel-heading">
   Product Category Update
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('admin.product_sub_category.update') }}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('product_category') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Select Category Name:</label>

                    <select class="form-control has-feedback-left" id="product_category" placeholder="product  category Name"
                            name="fk_id_product_category" value="{{ old('product_category') }}">
                        @foreach( $aProductCategoryList as $oProductCategory)
                            <option value="{{ $oProductCategory->id_product_category }}"
                                    @if($oProductCategory->id_product_category == $id->fk_id_product_category ){{ 'selected' }} @endif>{{ $oProductCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Category Name:</label>
                    <input class="form-control has-feedback-left" id="name" placeholder="Product Category Name"
                           name="name" value="{{ $id->name }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Category slug:</label>

                    <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                           name="slug" value="{{ $id->slug }}" type="text">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id_product_sub_category }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


