<header class="panel-heading">
   Service Category Update
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('admin.service_category.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Category Name:</label>
                    <input class="form-control has-feedback-left" id="name" placeholder="Service Category Name"
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
                    <button type="submit" value="{{ $id->id_service_category }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


