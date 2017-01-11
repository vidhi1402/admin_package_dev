<header class="panel-heading">
    Service Category Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('admin.service_category.insert') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2">Category Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="service category Name"
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



