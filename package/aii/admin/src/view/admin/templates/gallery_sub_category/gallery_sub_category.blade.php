@extends('admin::layout.master-layout')

@section('styles')

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">

                @if(Request::route()->getName() == 'admin.gallery_sub_ategory.index')
                    @include('admin::templates.gallery_sub_category.gallery_sub_category_form')
                @else
                    @include('admin::templates.gallery_sub_category.gallery_sub_category_update')
                @endif

            </section>
        </div>
    </div>

    @include('admin::templates.gallery_sub_category.gallery_sub_category_table')

@endsection

@section('scripts')


    <script>
        initDataTable_Custom('product_sub_category_info_table');
    </script>

    <script type="text/javascript">

        function changeStatus(this1,id)
        {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == 1) {
                    value = 0;
                }
                else {
                    value = 1;
                }
                var API_URL = "{{ route('admin.gallery_sub_ategory.change_status') }}";
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

    </script>

@endsection