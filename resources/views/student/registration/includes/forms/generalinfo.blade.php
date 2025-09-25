<!-- @section("css")
<style>
    .header-color-green {
            background-color: #82af6f;
            color: #fff;
            border-color: #82af6f;
        }
</style>

@endsection -->
@if(Config::get('edufirmconfig.student.registration.tabs.general_info.general_info') == 1)

    <div class="widget-box">
        <div class="widget-header widget-header-small header-color-green">
            <h4 class="widget-title lighter">
                <i class="ace-icon fa fa-info-circle blue"></i>
                {{ __('form_fields.student.section_label.general_info')}}
            </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">

                {{-- Registration Info --}}
                <div class="form-group">
                    {!! Form::label('reg_no', '<i class="fa fa-hashtag"></i> ' . __('form_fields.student.fields.reg_no'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::text('reg_no', null, ["class" => "form-control border-form input-mask-registration"]) !!}
                        <span
                            class="help-block text-danger">@include('includes.form_fields_validation_message', ['name' => 'reg_no'])</span>
                    </div>

                    {!! Form::label('reg_date', '<i class="fa fa-calendar"></i> ' . __('form_fields.student.fields.reg_date'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        <span class="input-icon">
                            {!! Form::text('reg_date', null, ["class" => "form-control date-picker border-form input-mask-date", "required", 'autocomplete' => 'off']) !!}
                            <i class="ace-icon fa fa-calendar green"></i>
                        </span>
                        <span
                            class="help-block text-danger">@include('includes.form_fields_validation_message', ['name' => 'reg_date'])</span>
                    </div>

                    <!-- {!! Form::label('university_reg', '<i class="fa fa-university"></i> ' . __('form_fields.student.fields.university_reg'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::text('university_reg', null, ["class" => "form-control border-form"]) !!}
                        <span
                            class="help-block text-danger">@include('includes.form_fields_validation_message', ['name' => 'university_reg'])</span>
                    </div> -->
                </div>

                {{-- Faculty & Semester --}}
                @if (!isset($data['row']))
                    <div class="form-group">
                        {!! Form::label('faculty', '<i class="fa fa-graduation-cap"></i> ' . __('form_fields.student.fields.faculty'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                        <div class="col-sm-2">
                            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Choose a Faculty...', 'required', 'onchange' => 'loadSemesters(this)']) !!}
                        </div>

                        {!! Form::label('semester', '<i class="fa fa-book"></i> ' . __('form_fields.student.fields.semester'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                        <div class="col-sm-2">
                            <select id="semester" name="semester" class="form-control border-form semester" required
                                onchange="loadSubject(this)"></select>
                            <span
                                class="help-block text-danger">@include('includes.form_fields_validation_message', ['name' => 'semester'])</span>
                        </div>
                        {!! Form::label('batch', 'Session', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-2">
                            {!! Form::select('batch', $data['batch'], null, [ 'class'=>'form-control border-form',"required",'readonly']) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'batch'])
                        </div>

                    </div>
                @else
                    <div class="form-group">
                        {!! Form::label('faculty', '<i class="fa fa-graduation-cap"></i> ' . __('form_fields.student.fields.faculty'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                        <div class="col-sm-5">
                            {!! Form::select('faculty', $data['faculties'], null, ['class' => 'form-control border-form', "disabled"]) !!}
                        </div>

                        {!! Form::label('semester', '<i class="fa fa-book"></i> ' . __('form_fields.student.fields.semester'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                        <div class="col-sm-3">
                            {!! Form::select('semester', $data['semester'], null, ['class' => 'form-control border-form', "disabled"]) !!}
                        </div>
                    </div>
                @endif

                {{-- Name, DOB, CNIC --}}
                <div class="form-group">
                    {!! Form::label('first_name', '<i class="fa fa-user"></i> ' . __('form_fields.student.fields.name_of_student'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::text('first_name', null, ["class" => "form-control border-form upper", "required", "placeholder" => "First Name"]) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('last_name', null, ["class" => "form-control border-form upper", "placeholder" => "Last Name"]) !!}
                    </div>

                    {!! Form::label('date_of_birth', '<i class="fa fa-birthday-cake"></i> ' . __('form_fields.student.fields.date_of_birth'), ['class' => 'col-sm-1 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        <span class="input-icon">
                            {!! Form::text('date_of_birth', null, ["class" => "form-control border-form input-mask-date","required", "autocomplete" => "off", "max" => \Carbon\Carbon::now()->subYears(17)->format('Y-m-d')]) !!}
                            <i class="ace-icon fa fa-calendar pink"></i>
                        </span>
                    </div>


                    {!! Form::label('cnic_no', '<i class="fa fa-credit-card"></i> ' . __('form_fields.student.fields.cnic_no'), ['class' => 'col-sm-1 control-label'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::text('cnic_no', null, [
                            "placeholder" => "CNIC (13 digits)",
                            "class" => "form-control border-form upper",
                            "required",
                            "maxlength" => "13",
                            "id" => "cnic_no",
                            "inputmode" => "tel"   // better than "numeric" for mobile
                        ]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'cnic_no'])
                    </div>
                </div>

                {{-- Gender, Blood Group, Nationality --}}
                <div class="form-group">
                    {!! Form::label('gender', '<i class="fa fa-venus-mars"></i> ' . __('form_fields.student.fields.gender'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::select('gender', __('common.gender'), null, ['class' => 'form-control border-form', "required"]) !!}
                    </div>

                    {!! Form::label('blood_group', '<i class="fa fa-tint"></i> ' . __('form_fields.student.fields.blood_group'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::select('blood_group', __('common.blood_group'), null, ['class' => 'form-control border-form']) !!}
                    </div>

                    {!! Form::label('nationality', '<i class="fa fa-flag"></i> ' . __('form_fields.student.fields.nationality'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        {!! Form::select('nationality', ['Pakistani' => 'Pakistani', 'Other' => 'Other'], null, ["class" => "form-control border-form upper", "required"]) !!}
                    </div>
                </div>

                {{-- Religion --}}
                <div class="form-group">
                    {!! Form::label('religion', '<i class="fa fa-leaf"></i> ' . __('form_fields.student.fields.religion'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-3">
                        {!! Form::select('religion', ['Islam' => 'Islam', 'Christian' => 'Christian', 'Hindu' => 'Hindu', 'Sikh' => 'Sikh', 'Other' => 'Other'], null, ["class" => "form-control border-form upper", "required"]) !!}
                    </div>

                    {!! Form::label('email', '<i class="fa fa-envelope"></i> ' . __('form_fields.student.fields.email'), ['class' => 'col-sm-1 control-label no-padding-right'], false) !!}
                    <div class="col-sm-2">
                        <span class="input-icon" style="width:100%">
                            {!! Form::text('email', null, ["class" => "form-control border-form", "placeholder" => "Student Email", "required"]) !!}
                            <i class="ace-icon fa fa-envelope orange"></i>
                        </span>
                    </div>

                    <label class="col-sm-2 control-label">{{__('form_fields.student.fields.academic_status')}}</label>
                    <div class="col-sm-2">
                        {!! Form::select('academic_statuses', $data['academic_statuses'], old('academic_status', $data["row"]->academic_status ?? 1), ['class' => 'form-control']) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'academic_status'])
                    </div>

                </div>

                {{-- Email & Extra Info --}}
                <div class="form-group">
                    {!! Form::label('extra_info', '<i class="fa fa-info-circle"></i> ' . __('form_fields.student.fields.extra_info'), ['class' => 'col-sm-2 control-label no-padding-right'], false) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('extra_info', null, ["class" => "form-control border-form", "rows" => "3"]) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif


{{-- Contact Info --}}
@if(Config::get('edufirmconfig.student.registration.tabs.general_info.contact_info') == 1)
    <div class="widget-box">
        <div class="widget-header widget-header-small header-color-green">
            <h4 class="widget-title lighter">
                <i class="ace-icon fa fa-phone green"></i>
                {{ __('form_fields.student.section_label.contact_info')}}
            </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="form-group">
                    {!! Form::label('home_phone', '<i class="fa fa-phone"></i> Home', ['class' => 'col-sm-1 control-label no-padding-right'], false) !!}
                    <div class="col-sm-3">
                        {!! Form::text('home_phone', null, ["class" => "form-control border-form input-mask-phone", "placeholder" => "Residence Phone"]) !!}
                    </div>

                    {!! Form::label('mobile_1', '<i class="fa fa-mobile"></i> Primary', ['class' => 'col-sm-1 control-label no-padding-right'], false) !!}
                    <div class="col-sm-3">
                        {!! Form::text('mobile_1', null, ["class" => "form-control border-form input-mask-mobile", "required", "placeholder" => "Primary Mobile"]) !!}
                    </div>

                    {!! Form::label('mobile_2', '<i class="fa fa-mobile"></i> Secondary', ['class' => 'col-sm-1 control-label no-padding-right'], false) !!}
                    <div class="col-sm-3">
                        {!! Form::text('mobile_2', null, ["class" => "form-control border-form input-mask-mobile", "placeholder" => "Secondary Mobile"]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


{{-- Permanent Address --}}
@if(Config::get('edufirmconfig.student.registration.tabs.general_info.address') == 1)
    <div class="widget-box">
        <div class="widget-header widget-header-small header-color-orange">
            <h4 class="widget-title lighter">
                <i class="ace-icon fa fa-map-marker orange"></i>
                {{ __('form_fields.student.section_label.address')}}
            </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="form-group">
                    {!! Form::label('state', 'Province', ['class' => 'col-sm-1 control-label no-padding-right']) !!}
                    <div class="col-sm-3">
                        {!! Form::select('state', $data['state'], null, ['class' => 'form-control', "required", "id" => "state"]) !!}
                    </div>

                    {!! Form::label('address', 'Address', ['class' => 'col-sm-1 control-label no-padding-right']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('address', null, ["class" => "form-control border-form upper", "required", "placeholder" => "Permanent Address", "id" => "paddress"]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


{{-- Temporary Address --}}
@if(Config::get('edufirmconfig.student.registration.tabs.general_info.temp_address') == 1)
    <div class="widget-box">
        <div class="widget-header widget-header-small header-color-purple">
            <h4 class="widget-title lighter">
                <i class="ace-icon fa fa-map purple"></i>
                {{ __('form_fields.student.section_label.temp_address')}}
            </h4>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <div class="control-group col-sm-12">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('permanent_address_copier', '', false, ['class' => 'ace', "onclick" => "CopyAddress(this.form)"]) !!}
                            <span class="lbl"> Same as Permanent Address</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('temp_state', 'Province', ['class' => 'col-sm-1 control-label no-padding-right']) !!}
                    <div class="col-sm-3">
                        {!! Form::select('temp_state', $data['state'], null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::label('temp_address', 'Address', ['class' => 'col-sm-1 control-label no-padding-right']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('temp_address', null, ["class" => "form-control border-form upper", "placeholder" => "Temporary Address"]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@section('js')
    @include('student.registration.includes.student-common-script')
    @include('includes.scripts.datepicker_script')
    <script>
        $(document).ready(function () {
            $('.input-mask-date').inputmask('9999-99-99');
            $('.input-mask-date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                orientation: "bottom"
            });

            $(".input-mask-mobile").inputmask("0399-9999999");
            if (/Mobi|Android/i.test(navigator.userAgent)) {
                document.addEventListener("DOMContentLoaded", function() {
                    const cnicField = document.getElementById("cnic_no");
                
                    cnicField.addEventListener("input", function(e) {
                        let value = e.target.value.replace(/\D/g, ""); // digits only
                
                        if (value.length > 13) {
                            value = value.substr(0, 13);
                        }
                
                        // Apply CNIC format: 5-7-1 digits
                        let formatted = value;
                        if (value.length > 5) {
                            formatted = value.substr(0, 5) + '-' + value.substr(5);
                        }
                        if (value.length > 12) {
                            formatted = formatted.substr(0, 13) + '-' + formatted.substr(13);
                        }
                
                        e.target.value = formatted;
                    });
                });
                
                
            } else {
                $("#cnic_no").inputmask("9999999999999");
            }
        });
    </script>
@endsection