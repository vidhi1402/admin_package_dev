<header class="panel-heading">
    Testimonial Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" enctype="multipart/form-data" action="{{ Route('admin.testimonial.insert') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2"> Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="service category Name"
                           name="name" value="{{ old('name') }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Designation:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="designation"
                           name="designation" value="{{ old('designation') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('display_index') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Display Index:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="display index"
                           name="display_index" value="{{ old('display_index') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Testimonial Image:</label>

                    <input class="form-control has-feedback-left" id="picture" placeholder="picture"
                           name="picture" value="{{ old('picture') }}" type="file">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Organization Name:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="organization"
                           name="organization" value="{{ old('organization') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Review:</label>

                    <textarea class="form-control has-feedback-left" id="slug" placeholder="review"
                           name="review" >{{ old('review') }}</textarea>
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



