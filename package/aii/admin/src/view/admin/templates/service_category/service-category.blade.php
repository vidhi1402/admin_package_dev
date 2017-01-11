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
                        @if(Request::route()->getName() == 'admin.service_category.index')
                            @include('admin::templates.service_category.service-category-content')
                        @else
                            @include('admin::templates.service_category.service-category-update')
                        @endif
                   {{-- </div>
                </div>--}}
            </section>
        </div>
    </div>

    @include('admin::templates.service_category.service-category-info-table')

@endsection

@section('scripts')
   {{-- <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/plugin/advanced-datatable/media/js/jquery.dataTables-latest.js')}}"></script>
    <script type="text/javascript"
            src="{{ URL::to('admin/asset/plugin/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{ URL::to('admin/asset/js/common_utility_aii.js')}}"></script>--}}

    <script>
        initDataTable_Custom('service_category_info_table');
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
                var API_URL = "{{ route('admin.service_category.change_status') }}";
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