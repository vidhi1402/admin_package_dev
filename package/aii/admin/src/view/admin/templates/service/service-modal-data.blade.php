<div class="row">
    @foreach($aService as $oImage)
        <div class="col-md-4">
            <figure>
                <img height="250" width="250" src="{{config('constants.SERVICE_IMAGE_PATH').$oImage->name}}"
                     alt="{{ $oImage->name }}">
                <div>
                    @if($oImage->status  == 1)
                        <button id="active" class="badge btn-success"
                                onclick="changeImageStatus(this,'{{$oImage->id_service_image}}');" value="1">Active
                        </button>
                    @else
                        <button id="deactive" class="badge btn-danger"
                                onclick="changeImageStatus(this,'{{$oImage->id_service_image}}');" value="0">Deactive
                        </button>
                    @endif
                        <a href="#" class="btn btn-danger btn-xs" onclick="deleteServiceImage({{ $oImage->id_service_image}})"><i class="fa fa-trash-o"></i></a>

                        {{--<a href="{{ route('admin.image.delete',array( 'id' => $oImage->image_id)) }}"
                           class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>--}}
                    </div>
            </figure>
        </div>
    @endforeach
</div>


