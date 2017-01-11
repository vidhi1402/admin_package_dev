<header class="panel-heading">
    Product Category Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('admin.product_sub_category.insert') }}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('product_category') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Select Category Name:</label>

                    <select class="form-control has-feedback-left" id="product_category" placeholder="product  category Name"
                           name="fk_id_product_category">
                        <option value="" @if("" == old('product_category')) {{'selected'}} @endif>--select product category</option>
                         @foreach( $aProductCategoryList as $oProductCategory)
                            <option value="{{ $oProductCategory->id_product_category }}"
                            @if($oProductCategory->id_product_category == old('product_category')) {{'selected'}} @endif>{{ $oProductCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="product Sub category Name"
                           name="name" value="{{ old('name') }}"
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>



