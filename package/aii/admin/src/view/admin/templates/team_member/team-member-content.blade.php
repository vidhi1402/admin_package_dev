<header class="panel-heading">
    Team Member Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('admin.team_member.insert') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputPassword2"> Name:</label>

                    <input class="form-control has-feedback-left" id="name" placeholder="Enter testimonial Name"
                           name="name" value="{{ old('name') }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Position:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Enter position"
                           name="position" value="{{ old('position') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('display_index') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Display Index:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Display index"
                           name="display_index" value="{{ old('display_index') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('facebook_url') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Facebook URL:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Facebook url"
                           name="facebook_url" value="{{ old('facebook_url') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('twitter_url') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Twitter URL:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Twitter url"
                           name="twitter_url" value="{{ old('twitter_url') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('google_plus_url') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Google+ URL:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="Google+ url"
                           name="google_plus_url" value="{{ old('google_plus_url') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('linked_in_url') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">LinkedIn URL:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="LinkedIn url"
                           name="linked_in_url" value="{{ old('linked_in_url') }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Website:</label>

                    <input class="form-control has-feedback-left" id="" placeholder="website"
                           name="website" value="{{ old('website') }}" type="text">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Member Image:</label>

                    <input class="form-control has-feedback-left" id="picture" placeholder="picture"
                           name="picture" value="{{ old('picture') }}" type="file">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="sr-input" for="exampleInputEmail1">Member Description:</label>

                    <textarea class="form-control has-feedback-left" id="review" placeholder="description"
                              name="description" >{{ old('description') }}</textarea>
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