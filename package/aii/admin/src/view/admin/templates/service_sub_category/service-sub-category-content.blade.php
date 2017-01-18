<header class="panel-heading">
    Service Category Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('admin.service_sub_category.insert') }}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('service_category') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Select Category Name:</label>

                    <select class="form-control has-feedback-left" id="service_category" placeholder="service  category Name"
                           name="fk_id_service_category">
                        <option value="" @if("" == old('service_category')) {{'selected'}} @endif>--select service category</option>
                         @foreach( $aServiceCategory as $oServiceCategory)
                            <option value="{{ $oServiceCategory->id_service_category }}"
                            @if($oServiceCategory->id_service_category == old('service_category')) {{'selected'}} @endif>{{ $oServiceCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Sub Category Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="service Sub category Name"
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



