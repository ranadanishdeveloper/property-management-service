{{ Form::open(['url' => 'subscriptions']) }}
<div class="modal-body">
    @php
        $subscriptionData = currentSubscription();
    @endphp
    @if (Auth::user()->type === 'super admin' ||
            ($subscriptionData['pricing_feature_settings'] === 'off' ||
                $subscriptionData['subscription']->enabled_openai == 1))
        <div class="text-start">
            <a href="javascript:void(0)" class="btn btn-primary mb-2 aiModal" data-size="lg"
                data-url="{{ route('generate.template', ['subscription']) }}" data-title="{{ __('AI Content Generator') }}">
                <span>{{ __('AI Content Generator') }}</span>
            </a>
        </div>
    @endif
    <div class="row">
        <div class="form-group">
            {{ Form::label('title', __('Title'), ['class' => 'form-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter subscription title'), 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('interval', __('Interval'), ['class' => 'form-label']) }}
            {!! Form::select('interval', $intervals, null, [
                'class' => 'form-control basic-select',
                'required' => 'required',
            ]) !!}
        </div>
        <div class="form-group">
            {{ Form::label('package_amount', __('Package Amount'), ['class' => 'form-label']) }}
            {{ Form::number('package_amount', null, ['class' => 'form-control', 'placeholder' => __('Enter package amount'), 'step' => '0.01']) }}
        </div>
        <div class="form-group">
            {{ Form::label('user_limit', __('User Limit'), ['class' => 'form-label']) }}
            {{ Form::number('user_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter user limit'), 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('property_limit', __('Property Limit'), ['class' => 'form-label']) }}
            {{ Form::number('property_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter property limit'), 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tenant_limit', __('Tenant Limit'), ['class' => 'form-label']) }}
            {{ Form::number('tenant_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter tenant limit'), 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-switch custom-switch-v1 mb-2">
                <input type="checkbox" class="form-check-input input-secondary" name="enabled_logged_history"
                    id="enabled_logged_history">
                {{ Form::label('enabled_logged_history', __('Show User Logged History'), ['class' => 'form-label']) }}
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-switch custom-switch-v1 mb-2">
                <input type="checkbox" class="form-check-input input-secondary" name="enabled_openai"
                    id="enabled_openai" value="1">
                <label for="enabled_openai" class="form-label">
                    {{ __('Open Ai Support') }}
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-check form-switch custom-switch-v1 mb-2">
                <input type="checkbox" class="form-check-input input-secondary" name="enabled_n8n"
                    id="enabled_n8n" value="1">
                <label for="enabled_n8n" class="form-label">
                    {{ __('N8n') }}
                </label>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    {{ Form::submit(__('Create'), ['class' => 'btn btn-secondary btn-rounded']) }}
</div>
{{ Form::close() }}
