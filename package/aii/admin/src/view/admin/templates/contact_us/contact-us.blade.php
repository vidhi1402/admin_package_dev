@extends('admin::layout.master-layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/asset/jquery-multi-select/css/multi-select.css')}}"/>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Request::route()->getName() == 'admin.contact_us.index')
                    @include('admin::templates.contact_us.contact-us-info-table')
                @else
                @endif

            </section>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" language="javascript"
            src="{{ URL::to('admin/asset/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>

    <script>
        initDataTable_Custom('contact_us_info_table');
        </script>

    <script type="text/javascript">
        // for multiple imagage
        function viewMessage(id) {
            var API_URL = "{{ route('admin.contact_us.get_message') }}";
            $.ajax({
                url: API_URL,
                type: 'POST',
                data: {'id': id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    console.log(JSON.stringify(data, null, 4));

                    if (data.status == 1) {
                        $('#modal_contact_message').modal('show');
                        $('#message_Detail').html(data.html);
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
    </script>

@endsection