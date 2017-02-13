@extends('admin::layout.master-layout')

@section('styles')
        <!--dynamic table-->
{{--<link href="{{ URL::to('admin/asset/plugin/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet"/>
<link href="{{ URL::to('admin/asset/plugin/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ URL::to('admin/asset/plugin/data-tables/DT_bootstrap.css')}}"/>--}}
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                {{-- <header class="panel-heading">
                     Category
                 </header>
                 <div class="panel-body">

                     <div class="row">--}}
                @if(Request::route()->getName() == 'admin.gallery-category.index')
                    @include('admin::templates.gallery_category.gallery_category-form')
                @else
                    @include('admin::templates.gallery_category.gallery_category-update')
                @endif
                {{-- </div>
             </div>--}}
            </section>
        </div>
    </div>

    @include('admin::templates.gallery_category.gallery_category-table')

@endsection

@section('scripts')
    <script>
        initDataTable_Custom('product_category_info_table');
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
                var API_URL = "{{ route('admin.gallery_category.change_status') }}";
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