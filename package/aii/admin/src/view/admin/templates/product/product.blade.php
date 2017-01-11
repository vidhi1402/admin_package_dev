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
                @if(Request::route()->getName() == 'admin.product.index')
                    @include('admin::templates.product.product-content')
                @else
                    @include('admin::templates.product.product-update')
                @endif
                {{--</div>
            </div>--}}
            </section>
        </div>
    </div>

    @include('admin::templates.product.product-info-table')
@endsection

@section('scripts')

    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>

    <script>
        initDataTable_Custom('product-info-table');
        $('#fk_id_product_category').multiSelect();
        $('#fk_id_sub_product_category').multiSelect();
    </script>

    <script type="text/javascript">
        // for multiple imagage
        function addImage() {
            var div = "<input class='form-control has-feedback-left' type='file' name='image[]'  id='image' multiple='multiple'>";
            document.getElementById("browse_btn").innerHTML += div;
        }

        function getSubCategory(id) {
            var API_URL = "{{ route('admin.product_sub_category.get_sub_category')}}";
            $.ajax({
                url: API_URL,
                method: "POST",
                dataType: "json",
                data: {'id': id},
                success: function (data) {
                    if (data.status == 1) {
                        console.log(JSON.stringify(data));
                        /* $('#image-Details').html('');*/
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

            /* alert( $('#fk_id_sub_product_category').val());*/
            var optionTag = $('#fk_id_sub_product_category').html();


            $.each(data, function (index, value) {
                optionTag = optionTag + "<option value ='" + value.id_product_sub_category + "'>" + value.name + "</option>";
            });

            //$("#fk_sub_product_category").html(optionTag);
            $('#fk_id_sub_product_category').html(optionTag);
            $('#fk_id_sub_product_category').multiSelect("destroy");
            $('#fk_id_sub_product_category').multiSelect();

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
                var API_URL = "{{ route('admin.product.change_status') }}";
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

        function viewImageDetail(id) {
            var API_URL = "{{ route('admin.product.get_image') }}";
            $.ajax({
                url: API_URL,
                type: 'POST',
                data: {'id': id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    console.log(JSON.stringify(data, null, 4));

                    if (data.status == 1) {
                        $('#modal_product_image').modal('show');
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
                var API_URL = "{{ route('admin.product.change_image_status') }}";
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
                            viewImageDetail(data.id_product);
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

        // For delete product Image
        function deleteProductImage(id) {
            if (confirm('Are you sure you want to DELETE?')) {
                //console.log('called id' + img_name);
                var API_URL = "{{ route('admin.product.delete_image')}}";
                $.ajax({
                    url: API_URL,
                    method: "POST",
                    dataType: "json",
                    data: {'id': id},
                    success: function (data) {
                        if (data.status == 1) {
                            console.log(JSON.stringify(data));
                            $('#image_Detail').html('');
                            viewImageDetail(data.id_product);
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