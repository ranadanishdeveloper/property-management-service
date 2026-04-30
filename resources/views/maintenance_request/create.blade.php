@php
    $user = \Auth::user();
    $tenant = $user->tenants;
@endphp
{{ Form::open(['url' => 'maintenance-request', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="modal-body">
    @php
        $subscriptionData = currentSubscription();
    @endphp
    @if (Auth::user()->type === 'super admin' ||
            ($subscriptionData['pricing_feature_settings'] === 'off' ||
                $subscriptionData['subscription']->enabled_openai == 1))
        <div class="text-start">
            <a href="javascript:void(0)" class="btn btn-primary mb-2 aiModal" data-size="lg"
                data-url="{{ route('generate.template', ['maintenance_request']) }}"
                data-title="{{ __('AI Content Generator') }}">
                <span>{{ __('AI Content Generator') }}</span>
            </a>
        </div>
    @endif
    <div class="row">
        @if ($user->type == 'tenant')
            {{ Form::hidden('property_id', !empty($tenant) ? $tenant->property : null, ['class' => 'form-control']) }}
            {{ Form::hidden('unit_id', !empty($tenant) ? $tenant->unit : null, ['class' => 'form-control']) }}
        @else
            <div class="form-group col-md-6 col-lg-6">
                {{ Form::label('property_id', __('Property'), ['class' => 'form-label']) }}
                {{ Form::select('property_id', $property, null, ['class' => 'form-control hidesearch', 'id' => 'property_id']) }}
            </div>
            <div class="form-group col-lg-6 col-md-6">
                {{ Form::label('unit_id', __('Unit'), ['class' => 'form-label']) }}
                <div class="unit_div">
                    <select class="form-control hidesearch unit" id="unit_id" name="unit_id">
                        <option value="">{{ __('Select Unit') }}</option>
                    </select>
                </div>
            </div>
        @endif

        <div class="form-group  col-md-6 col-lg-6">
            {{ Form::label('request_date', __('Request Date'), ['class' => 'form-label']) }}
            {{ Form::date('request_date', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{ Form::label('maintainer_id', __('Maintainer'), ['class' => 'form-label']) }}
            {{ Form::select('maintainer_id', $maintainers, null, ['class' => 'form-control hidesearch']) }}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{ Form::label('issue_type', __('Issue Type'), ['class' => 'form-label']) }}
            {{ Form::select('issue_type', $types, null, ['class' => 'form-control hidesearch']) }}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
            {{ Form::select('status', $status, null, ['class' => 'form-control hidesearch']) }}
        </div>
        <div class="form-group  col-md-12 col-lg-12">
            {{ Form::label('issue_attachment', __('Issue Attachment'), ['class' => 'form-label']) }}
            {{ Form::file('issue_attachment', ['class' => 'form-control']) }}
        </div>
        <div class="form-group  col-md-12 col-lg-12">
            {{ Form::label('notes', __('Notes'), ['class' => 'form-label']) }}
            {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>
<div class="modal-footer">
    {{ Form::submit(__('Create'), ['class' => 'btn btn-secondary btn-rounded']) }}
</div>
{{ Form::close() }}
<script>
    $('#property_id').on('change', function() {
        "use strict";
        var property_id = $(this).val();
        var url = '{{ route('property.unit', ':id') }}';
        url = url.replace(':id', property_id);
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                property_id: property_id,
            },
            contentType: false,
            processData: false,
            type: 'GET',
            success: function(data) {
                $('.unit').empty();
                var unit =
                    `<select class="form-control hidesearch unit" id="unit_id" name="unit_id"></select>`;
                $('.unit_div').html(unit);

                $.each(data, function(key, value) {
                    $('.unit').append('<option value="' + key + '">' + value + '</option>');
                });
                $(".hidesearch").each(function() {
                    var basic_select = new Choices(this, {
                        searchEnabled: false,
                        removeItemButton: true,
                    });
                });
            },

        });
    });
</script>
