@extends('admin.layout.admin')

@section('content')

{{-- @include('admin.layout.partialLayouts.alert') --}}
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Employer's package List
            </h3>
        </div>

    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand"></i>
        </div>
        <div class="m-alert__text">
            There will be a short instruction about Employer's package operation
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Employer's package List Table
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">


            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
                                <div class="m-form__group m-form__group--inline">
                                    <div class="m-form__label">
                                        <label>
                                            Status:
                                        </label>
                                    </div>
                                    <div class="m-form__control">
                                        <select class="form-control m-bootstrap-select" id="m_form_status">
                                            <option value="">
                                                All
                                            </option>
                                            <option value="pending">
                                                Pending
                                            </option>
                                            <option value="approved">
                                                Approved
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-md-none m--margin-bottom-10"></div>
                            </div>

                            <div class="col-md-4">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->

            <table class="m-datatable" id="scrolling_horizontal" width="100%">
                <thead>
                    <tr>
                        <th title="Field #1">
                            ID
                        </th>
                        <th title="Field #2">
                            Employer Name
                        </th>
                        <th title="Field #3">
                            Package
                        </th>
                        <th title="Field #4">
                            Start Date
                        </th>
                        <th title="Field #5">
                            Expired Date
                        </th>
                        <th title="Field #6">
                            Remain Amount
                        </th>
                        <th title="Field #7">
                            Status
                        </th>
                        <th title="Field #8">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 0;
                    @endphp
                    @foreach($packages as $package)
                    @php
                        $id++;
                    @endphp
                    <tr>

                        <td>
                            {{ $id }}
                        </td>
                        <td>
                            {{ $package->employer->fname }} {{ $package->employer->lname }}
                        </td>
                        <td>
                            {{( $package->jobPackage['name'] ) ?  $package->jobPackage['name']  : $package->featurePackage['name'] }}
                            {{-- {{ $package->jobPackage['name'] }} --}}

                        </td>
                        <td>
                            {{ $package->start_date }}
                        </td>
                        <td>
                            {{ $package->expired_date }}
                        </td>
                        <td>
                            {{ $package->remain_amount }}
                        </td>
                        <td>
                            <a href="{{ route('admin.employer.package.approve', $package->id) }}" class="m-badge {{ ($package->is_verified) ? 'm-badge--success' : 'm-badge--danger' }} m-badge--wide text-white">{{ ($package->is_verified) ? 'Approved' : 'Pending' }}</a>
                        </td>

                        <td>
                            <a href="javascript: void(0);" data-toggle="modal" data-target="#employer_modal" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill employer_view" data-packageindex="{{ json_encode($package) }}">
                                <i class="la la-eye"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>

<div class="modal fade" id="employer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Employer Info
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td style="font-weight: bold; width: 150px;">Package:</td>
                            <td id="package_name"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 150px;">price:</td>
                            <td id="price"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 150px;">Discount:</td>
                            <td id="discount"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 150px;">Transaction Type:</td>
                            <td id="transaction_type"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 150px;">Transaction ID:</td>
                            <td class="text-danger" id="transaction_id"></td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/css/iziToast.min.css" />
@endpush



@push('js')

<!--begin::Page Resources -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.3.0/js/iziToast.min.js"></script>


<script>
    $(document).ready(function() {
        var base_url = "{{ url('/admin/') }}";
        $('#employer_modal').on('show.bs.modal', function (event) {
            var modal = $(this);
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('packageindex'); // Extract info from data-* attributes
            var employerId = recipient.employer_id;
            var jobPackageId = recipient.job_package_id;
            var featurePackageId = recipient.featured_package_id;


            $.ajax({
				url: base_url+"/employer/package/payment/",
				type: "post",
				headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                data: { employer_package_id: recipient.id, employer_id: employerId},
				success: function(data){

                    var payment = JSON.parse(data);

                    modal.find('#package_name').text(payment.package);
                    modal.find('#price').text(payment.price);
                    modal.find('#discount').text(payment.discount);
                    modal.find('#transaction_type').text(payment.transaction_type);
                    modal.find('#transaction_id').text(payment.transaction_id);

				}
			});

        });
    });
</script>


<script>
    var DatatableHtmlTableDemo = {
    init: function () {
        var e;
        e = $(".m-datatable").mDatatable({
            data: {
                saveState: {
                    cookie: !1
                }
            },
            search: {
                input: $("#generalSearch")
            },

            }), $("#m_form_status").on("change", function () {
                e.search($(this).val().toLowerCase(), "Status")
            }), $("#m_form_status, #m_form_type").selectpicker()
        }
    };
    jQuery(document).ready(function () {
        DatatableHtmlTableDemo.init();
    });
</script>

@endpush