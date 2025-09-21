<div class="form-group">
    {!! Form::label('fee_head_title', 'Head', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('fee_head_title', null, ["placeholder" => "e.g. Monthly Fee", "class" => "form-control border-form upper","required"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'fee_head_title'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('fee_head_amount', 'Amount', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('fee_head_amount', null, ["placeholder" => "e.g. 5000", "class" => "form-control border-form upper"]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'fee_head_amount'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('fine_applicable', 'Fine Applicable', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <label class="checkbox-inline">
            {!! Form::checkbox('fine_applicable', 1, null, ['id' => 'fine_applicable']) !!} Yes
        </label>
        @include('includes.form_fields_validation_message', ['name' => 'fine_applicable'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('per_day_fine', 'Fine Amount', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::number('per_day_fine', null, [
            "placeholder" => "e.g. 50", 
            "class" => "form-control border-form", 
            "id" => "per_day_fine", 
            "disabled"
        ]) !!}
        @include('includes.form_fields_validation_message', ['name' => 'per_day_fine'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('fine_frequency', 'Fine Frequency', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('fine_frequency', [
            'N/A' => 'N/A',
            'daily' => 'Daily',
            'monthly' => 'Monthly',
            'once' => 'One-time'
        ], null, ['class' => 'form-control border-form', 'id' => 'fine_frequency']) !!}
        @include('includes.form_fields_validation_message', ['name' => 'fine_frequency'])
    </div>
</div>

<div class="hr hr-24"></div>
