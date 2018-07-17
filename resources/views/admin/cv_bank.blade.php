
@extends('admin.layout.admin')

@section('content')
@include('admin.layout.partialLayouts.alert')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                CV Bank
            </h3>
        </div>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        CV List
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            {{-- Add Industry --}}
            <div class="m-form m-form--label-align-right  m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <form class="m-form m-form--fit m-form--label-align-right" method='post' action="{{ route('admin.jobCategories.store') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <label>
                                    Add New Job Category
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Add New Job Category" name="job_category">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            ADD
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="mdl-data-table table table-striped table-bordered" id="html_table" width="100%">
                <thead>

                    <tr>

                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Job Category
                        </th>
                        <th title="Field #3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id= 1;
                    @endphp

                    @foreach( $cvs as $cv )
                    <tr>
                        <td>
                            {{ $id++ }}
                        </td>
                        <td>
                            {{ $cv->fname }}
                        </td>
                        <td>
                            <span style="overflow: visible; position: relative; width: 110px;">
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
@endpush


@push('js')

<!--begin::Page Resources -->
{{--  <script src="/admin/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>  --}}
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
    var box = $('.m-portlet__body');
    $('#add_industry').on('click', function (e) {
        e.preventDefault();
        box.toggleClass('d-none');

    });
</script>

<script>

$('#html_table').DataTable( {
    columnDefs: [
        {
            targets: [ 0, 1, 2 ],
            className: 'mdl-data-table__cell--non-numeric'
        }
    ],
    responsive: true
});

</script>


@endpush