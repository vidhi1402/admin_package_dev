<header class="panel-heading">
   Testimonial Update
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" enctype="multipart/form-data" action="{{ Route('admin.testimonial.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2"> Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="Enter testimonial Name"
                           name="name" value="{{ $id->name }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Designation:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Enter designation"
                           name="designation" value="{{ $id->designation }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('display_index') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Display Index:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="display index"
                           name="display_index" value="{{ $id->display_index }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Testimonial Image:</label>

                    <input class="form-control has-feedback-left" id="picture" placeholder="picture"
                           name="picture" value="{{ $id->picture }}" type="file">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Organization Name:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="organization"
                           name="organization" value="{{ $id->organization }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Review:</label>

                    <textarea class="form-control has-feedback-left" id="review" placeholder="review"
                              name="review" >{{ $id->review }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id_testimonial }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


