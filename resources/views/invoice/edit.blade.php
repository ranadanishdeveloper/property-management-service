@extends('layouts.app')
@section('page-title')
    {{ __('Invoice') }}
@endsection
@push('script-page')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
    <script>
        $('#property_id').on('change', function() {
            "use strict";

            var property_id = $(this).val();
            if (!property_id) return;

            var url = '{{ route('property.unit', ':id') }}'.replace(':id', property_id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {

                    $('.unit_div').html(`
                <select class="form-control hidesearch unit" id="unit" name="unit_id"></select>
            `);

                    $('.tenant_div').html(`
                <select class="form-control hidesearch tenant" id="tenant" name="tenant">
                    <option value="">{{ __('Select Tenant') }}</option>
                </select>
            `);

                    var editUnit = {{ $invoice->unit_id }};
                    var firstKey = null;
                    console.log(editUnit);

                    $.each(data, function(key, value) {
                        if (!firstKey) firstKey = key;
                        var selected = (key == editUnit) ? 'selected' : '';
                        $('#unit').append('<option value="' + key + '" ' + selected + '>' +
                            value + '</option>');
                    });

                    $(".hidesearch").each(function() {
                        new Choices(this, {
                            searchEnabled: false,
                            removeItemButton: true,
                        });
                    });

                    if (editUnit) {
                        $('#unit').val(editUnit).trigger('change');
                    }
                }
            });
        });

        $('#property_id').trigger('change');
    </script>

    <script>
        $(document).on('change', '#unit', function() {
            "use strict";

            var unit_id = $(this).val();
            if (!unit_id) return;

            var url = '{{ route('unit.by.tenant', ':id') }}'.replace(':id', unit_id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {

                    $('.tenant_div').html(`
                        <select class="form-control hidesearch tenant" id="tenant" name="tenant">
                            <option value="">{{ __('Select Tenant') }}</option>
                        </select>
                    `);

                    var editTenant = {{ $invoice->tenant }};


                    $.each(data, function(key, value) {
                        var selected = (key == editTenant) ? 'selected' : '';
                        $('#tenant').append('<option value="' + key + '" ' + selected + '>' +
                            value + '</option>');
                    });

                    $(".hidesearch").each(function() {
                        new Choices(this, {
                            searchEnabled: false,
                            removeItemButton: true,
                        });
                    });
                },
                error: function() {
                    console.log('Error fetching tenants');
                }
            });
        });
    </script>

    <script>
        var selector = "body";
        if ($(selector + " .repeater").length) {
            var $dragAndDrop = $("body .repeater tbody").sortable({
                handle: '.sort-handler'
            });
            var $repeater = $(selector + ' .repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'status': 1
                },
                show: function() {
                    $(".hidesearch").each(function() {
                        var basic_select = new Choices(this, {
                            searchEnabled: false,
                            removeItemButton: true,
                        });
                    });

                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        var el = $(this).parent().parent();
                        var id = $(el.find('.type_id')).val();
                        $.ajax({
                            url: '{{ route('invoice.type.destroy') }}',
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                'id': id
                            },
                            cache: false,
                            success: function(data) {
                                $(this).slideUp(deleteElement);
                                $(this).remove();
                            },
                        });


                    }
                },
                ready: function(setIndexes) {
                    $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });
            var value = $(selector + " .repeater").attr('data-value');
            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
            }
        }
    </script>
@endpush
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('invoice.index') }}">{{ __('Invoice') }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{ __('Edit') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    {{ Form::model($invoice, ['route' => ['invoice.update', $invoice->id], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="info-group">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('property_id', __('Property'), ['class' => 'form-label']) }}
                                {{ Form::select('property_id', $property, null, ['class' => 'form-control hidesearch']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('unit_id', __('Unit'), ['class' => 'form-label']) }}
                                <div class="unit_div">
                                    <select class="form-control hidesearch unit" id="unit" name="unit_id">
                                        <option value="">{{ __('Select Unit') }}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('tenant', __('Tenant'), ['class' => 'form-label']) }}
                                <div class="tenant_div">
                                    <select class="form-control hidesearch tenant" id="tenant" name="tenant">
                                        <option value="">{{ __('Select Tenant') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-lg-4">
                                <div class="form-group">
                                    {{ Form::label('invoice_id', __('Invoice Number'), ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text ">
                                            {{ invoicePrefix() }}
                                        </span>
                                        {{ Form::text('invoice_id', $invoiceNumber, ['class' => 'form-control', 'placeholder' => __('Enter Invoice Number'), 'disabled']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('invoice_month', __('Invoice Month'), ['class' => 'form-label']) }}
                                {{ Form::month('invoice_month', date('Y-m', strtotime($invoice->invoice_month)), ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('end_date', __('Invoice End Date'), ['class' => 'form-label']) }}
                                {{ Form::date('end_date', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-4">
                                {{ Form::label('notes', __('Notes'), ['class' => 'form-label']) }}
                                {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Notes')]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card repeater" data-value='{!! json_encode($invoice->types) !!}'>

                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">{{ __('Invoice Type') }}</h5>

                        <a class="btn btn-secondary d-flex align-items-center gap-2" href="#" data-repeater-create="">
                            <i class="ti ti-circle-plus align-text-bottom"></i>{{ __('Add Type') }}
                        </a>

                    </div>

                </div>
                <div class="card-body">
                    <table class="display dataTable cell-border" data-repeater-list="types">
                        <thead>
                            <tr>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody data-repeater-item>
                            <tr>
                                {{ Form::hidden('id', null, ['class' => 'form-control type_id']) }}
                                <td width="30%">
                                    {{ Form::select('invoice_type', $types, null, ['class' => 'form-control hidesearch']) }}
                                </td>
                                <td>
                                    {{ Form::number('amount', null, ['class' => 'form-control']) }}
                                </td>
                                <td>
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 1]) }}
                                </td>
                                <td>
                                    <a class="text-danger" data-repeater-delete data-bs-toggle="tooltip"
                                        data-bs-original-title="{{ __('Detete') }}" href="#"> <i
                                            data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="group-button text-end">
                {{ Form::submit(__('Update'), ['class' => 'btn btn-secondary btn-rounded', 'id' => 'invoice-submit']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
