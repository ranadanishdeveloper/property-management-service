@extends('layouts.app')
@section('page-title')
    {{ agreementPrefix() . $agreement->agreement_id }}
@endsection
@php
    $main_logo = getSettingsValByName('company_logo');
    $settings = settings();

@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('agreement.index') }}">{{ __('Rental Agreement') }}</a></li>
    <li class="breadcrumb-item" aria-current="page">{{ agreementPrefix() . $agreement->agreement_id }}</li>
@endsection
@push('css-page')
<style>
@media print {

    @page {
        size: A4;
        margin: 15mm;
    }

    html, body {
        width: 210mm;
        height: 297mm;
        margin: 0;
        padding: 0;
        background: #fff !important;
        font-size: 12px;
    }

    /* Reset */
    * {
        box-shadow: none !important;
        background: transparent !important;
    }

    /* Show only invoice */
    #invoice-print {
        display: block !important;
        width: 100%;
        margin: 0 auto;
    }

    /* Remove card look */
    .card,
    .card-body {
        border: none !important;
        padding: 0 !important;
    }

    /* Header */
    .codex-brand {
        display: flex !important;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .codex-brand img {
        max-height: 70px;
    }

    .codex-brand ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: right;
    }

    /* Titles */
    h3 {
        font-size: 15px !important;
        margin-bottom: 6px;
        color: #000 !important;
    }

    h5 {
        font-size: 12px !important;
        font-weight: bold;
        margin-bottom: 2px;
    }

    p {
        font-size: 11.5px !important;
        line-height: 1.5;
        text-align: justify;
    }

    hr {
        border-top: 1px solid #000;
        margin: 8px 0;
    }

    /* Grid */
    .row {
        display: flex !important;
        flex-wrap: wrap;
    }

    .col-md-4 { width: 33.33%; }
    .col-md-12 { width: 100%; }

    .detail-group {
        padding: 8px;
        min-height: 70px;
    }

    /* Badge */
    .badge {
        padding: 2px 6px;
        font-size: 10px;
    }

    /* Signature bottom */
    .text-end {
        position: fixed;
        bottom: 25mm;
        right: 20mm;
        font-size: 13px;
        font-weight: bold;
    }

    /* No UI */
    .btn,
    .print,
    .breadcrumb,
    .card-header {
        display: none !important;
    }

    /* Prevent ugly breaks */
    p, .detail-group {
        page-break-inside: avoid;
    }
}
</style>

@endpush
@section('content')
    <div class="row">
        <div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="list-inline ms-auto mb-0 d-flex justify-content-end flex-wrap">
                            <li class="list-inline-item align-bottom me-2">
                                <a href="javascript:void(0);" class="avtar avtar-s btn-link-secondary print"
                                    data-bs-toggle="tooltip" data-bs-original-title="{{ __('Print') }}">
                                    <i class="ph-duotone ph-printer f-22"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body cdx-invoice" id="invoice-print">
                        <div id="cdx-invoice">
                            <div class="head-invoice">
                                <div class="codex-brand row d-flex align-items-center">
                                    <div class="col-sm-12 col-md-10">
                                        <a class="codexdark-logo" href="Javascript:void(0);">
                                            <img class="img-fluid"
                                                src="{{ asset(Storage::url('upload/logo/')) . '/' . (isset($settings['company_logo']) && !empty($settings['company_logo']) ? $settings['company_logo'] : 'logo.png') }}"
                                                alt="invoice-logo">
                                        </a>
                                    </div>
                                    <ul class="col-sm-12 col-md-2" style="list-style: none;">
                                        <li>
                                            <i class="fa fa-user text-secondary f-18"></i>
                                            <span class="mb-2 ms-2">{{ $settings['company_name'] }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone text-secondary f-18"></i>
                                            <span class="mb-2 ms-2">{{ $settings['company_phone'] }}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope text-secondary f-18"></i>
                                            <span class="mb-2 ms-2">{{ $settings['company_email'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    <h3 class="text-primary mb-10">
                                        {{ __('Agreement') }} : </h3>

                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="detail-group">
                                            <h5>{{ __('Agreement ID') }}</h5>
                                            <p class="mb-20">
                                                {{ agreementPrefix() . $agreement->agreement_id }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="detail-group">
                                            <h5>{{ __('Agreement Date') }}</h5>
                                            <p class="mb-20"> {{ dateFormat($agreement->date) }} </p>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                        <div class="detail-group">
                                            <h5>{{ __('Status') }}</h5>
                                            <p class="mb-20">

                                                @if ($agreement->status == 'Draft')
                                                    <span
                                                        class="badge bg-light-dark">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @elseif($agreement->status == 'Pending')
                                                    <span
                                                        class="badge bg-light-warning">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @elseif($agreement->status == 'Completed' || $agreement->status == 'active')
                                                    <span
                                                        class="badge bg-light-success">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @elseif($agreement->status == 'Active' || $agreement->status == 'active')
                                                    <span
                                                        class="badge bg-light-info">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @elseif($agreement->status == 'Cancelled' || $agreement->status == 'active')
                                                    <span
                                                        class="badge bg-light-danger">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @elseif($agreement->status == 'Confirmed' || $agreement->status == 'active')
                                                    <span
                                                        class="badge bg-light-secondary">{{ \App\Models\agreement::status()[$agreement->status] }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <h3 class="text-primary mb-10">
                                        {{ __('Terms & Conditions') }} : </h3>
                                    <div class="col-md-12 col-lg-12 col-sm-4">
                                        <p>
                                            {!! $agreement->terms_condition !!}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h3 class="text-primary mb-10">
                                        {{ __('Description') }} : </h3>
                                    <div class="col-md-12 col-lg-12 col-sm-4">
                                        <p>
                                            {!! $agreement->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-end mt-20">
                                <h3>{{ __('Signature') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script-page')
    <script>
        $(document).on('click', '.print', function() {
            $('.action').addClass('d-none');
            var printContents = document.getElementById('invoice-print').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            $('.action').removeClass('d-none');
        });
    </script>
@endpush
