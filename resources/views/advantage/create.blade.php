{{ Form::open(['url' => 'advantage']) }}

<div class="modal-body">
    @php
        $subscriptionData = currentSubscription();
    @endphp
    @if (Auth::user()->type === 'super admin' ||
            ($subscriptionData['pricing_feature_settings'] === 'off' ||
                $subscriptionData['subscription']->enabled_openai == 1))
        <div class="text-start">
            <a href="javascript:void(0)" class="btn btn-primary mb-2 aiModal" data-size="lg"
                data-url="{{ route('generate.template', ['property_advantage']) }}"
                data-title="{{ __('AI Content Generator') }}">
                <span>{{ __('AI Content Generator') }}</span>
            </a>
        </div>
    @endif
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Amenity Name')]) }}
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) }}
    </div>
</div>
<div class="modal-footer">
    {{ Form::submit(__('Create'), ['class' => 'btn btn-secondary btn-rounded']) }}
</div>
{{ Form::close() }}
