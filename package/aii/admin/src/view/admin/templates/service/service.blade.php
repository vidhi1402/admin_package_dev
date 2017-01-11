@extends('admin::layout.master-layout')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/asset/jquery-multi-select/css/multi-select.css')}}"/>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                {{--<header class="panel-heading">
                    Project
                </header>
                <div class="panel-body">
                   <div class="row"> --}}
                @if(Request::route()->getName() == 'admin.service.index')
                    @include('admin::templates.service.service-content')
                @else
                    @include('admin::templates.service.service-update')
                @endif
                {{--</div>
            </div>--}}
            </section>
        </div>
    </div>

    @include('admin::templates.service.service-info-table')
@endsection

@section('scripts')

    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>

    <script>
        initDataTable_Custom('service-info-table');
        $('#fk_id_service_category').multiSelect();
        $('#fk_id_sub_service_category').multiSelect();
    </script>

    <script type="text/javascript">
        // for multiple imagage
        function addImage() {
            var div = "<input class='form-control has-feedback-left' type='file' name='image[]'  id='image' multiple='multiple'>";
            document.getElementById("browse_btn").innerHTML += div;
        }

        function getSubCategory(id) {
            var API_URL = "{{ route('admin.service_sub_category.get_sub_category')}}";
            $.ajax({
                url: API_URL,
                method: "POST",
                dataType: "json",
                data: {'id': id},
                success: function (data) {
                    if (data.status == 1) {
                        console.log(JSON.stringify(data));
                        /* $('#image_Detail').html('');*/
                        setSubCategory(data.data);
                    } else {
                        alert('server not available');
                    }
                },
                error: function (error) {
                    console.log('Oops Getting Error yr');
                }
            });
        }
        function setSubCategory(data) {
            console.log("called");

            /* alert( $('#fk_id_sub_service_category').val());*/
            var optionTag = $('#fk_id_sub_service_category').html();


            $.each(data, function (index, value) {
                optionTag = optionTag + "<option value ='" + value.id_service_sub_category + "'>" + value.name + "</option>";
            });

            //$("#fk_sub_service_category").html(optionTag);
            $('#fk_id_sub_service_category').html(optionTag);
            $('#fk_id_sub_service_category').multiSelect("destroy");
            $('#fk_id_sub_service_category').multiSelect();

        }

        //change status
        function changeStatus(this1, id) {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 1) {
                    value = 0;
                }
                else {
                    value = 1;
                }
                var API_URL = "{{ route('admin.service.change_status') }}";
                $.ajax({
                    url: API_URL,
                    type: 'POST',
                    data: {'status': value, 'id': id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        console.log(JSON.stringify(data, null, 4));

                        if (data.status == 1) {
                            location.reload();
                        }
                        else {
                            console.log("error");
                        }
                    },
                    error: function (data) {
                        alert('server unavailable');
                    }
                });
            }
        }

        function viewDetails(id) {
            var API_URL = "{{ route('admin.service.get_image') }}";
            $.ajax({
                url: API_URL,
                type: 'POST',
                data: {'id': id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    console.log(JSON.stringify(data, null, 4));

                    if (data.status == 1) {
                        $('#modal_service_image').modal('show');
                        $('#image_Detail').html(data.html);
                    }
                    else {
                        console.log("error");
                    }
                },
                error: function (data) {
                    alert('server unavailable' + data);
                }
            });
        }

        function changeImageStatus(this1, id) {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 1) {
                    value = 0;
                }
                else {
                    value = 1;
                }
                var API_URL = "{{ route('admin.service.change_image_status') }}";
                $.ajax({
                    url: API_URL,
                    type: 'POST',
                    data: {'status': value, 'id': id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.status == 1) {
                            console.log(JSON.stringify(data, null, 4));
                            $('#image_Detail').html('');
                            viewDetails(data.id_service);
                        } else {
                            alert('server unavailable');
                        }
                    },
                    error: function (error) {
                        alert('server unavailable');
                    }
                });
            }
        }

        // For delete service Image
        function deleteServiceImage(id) {
            if (confirm('Are you sure you want to DELETE?')) {
                //console.log('called id' + img_name);
                var API_URL = "{{ route('admin.service.delete_image')}}";
                $.ajax({
                    url: API_URL,
                    method: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
                        if (data.status == 1) {
                            console.log(JSON.stringify(data));
                            $('#image_Detail').html('');
                            viewDetails(data.id_service);
                        } else {
                            alert('server not available');
                        }
                    },
                    error: function (error) {
                        console.log('Ooops Getting Error yr');
                    }
                });
            }
        }

    </script>

@endsection