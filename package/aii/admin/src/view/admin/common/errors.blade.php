<!-- resources/views/common/errors.blade.php -->

@if (count($errors) > 0)
        <!-- Form Error List -->

<div style="padding: 20px 20px 0px;">
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endif

@if(Session::has('msg'))
    {{--{{Session::get('msg')}}--}}
    {{--<div style="padding: 20px 20px 0px;">
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('msg')}}</strong>
        </div>
    </div>--}}
    <script>
        toastr.success('{{Session::get('msg')}}');
    </script>
@endif

@if(Session::has('error'))
    {{--{{Session::get('msg')}}--}}
    <div style="padding: 20px 20px 0px;">
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('error')}}</strong>
        </div>
    </div>
@endif