    <fieldset>
    <legend>{{ __('form_fields.student.section_label.enroll_info')}}</legend>
    <div class="form-group">
        {!! Form::label('batch', 'Session', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::select('batch', $data['batch'], null, [ 'class'=>'form-control border-form',"required",'readonly']) !!}
            @include('includes.form_fields_validation_message', ['name' => 'batch'])
        </div>

        <label class="col-sm-2 control-label">{{ __('form_fields.student.fields.faculty')}}</label>
        <div class="col-sm-4">
            <select name="faculty" class="form-control chosen-select"  data-placeholder="Choose a Faculty..."  onChange ="loadFirstSemesters(this)" required="required">
                @foreach( $data['faculties'] as $key => $faculty)
                    <option value="{{ $key }}">{{ $faculty }}</option>
                @endforeach
            </select>
            <input type="hidden" name="semester" id="semester"/>
        </div>

        <!-- <label class="col-sm-1 control-label">{{__('form_fields.student.fields.semester')}}</label>
        <div class="col-sm-2">
            <select id="semester" name="semester" required onChange ="loadSubject(this)" class="form-control border-form semester"> </select>
            @include('includes.form_fields_validation_message', ['name' => 'semester'])
        </div> -->
    </div>
        @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.subject_info') == 1)
            <div class="form-group">
                <div id="subjects_wrapper">
                </div>
            </div>
        @endif
    </fieldset>
    @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.general_info') == 1)
        <fieldset>
            <legend>{{ __('form_fields.student.section_label.student_info')}}</legend>
            <div class="form-group">
                {!! Form::label('first_name', __('form_fields.student.fields.first_name'), ['class' => 'col-sm-1 control-label',]) !!}
                <div class="col-sm-2">
                    {!! Form::text('first_name', null, ["class" => "form-control border-form upper","required", "placeholder" => "First Name"]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'first_name'])
                </div>
                <!--<div class="col-sm-2">-->
                <!--    {!! Form::text('middle_name', null, ["class" => "form-control border-form upper", "placeholder" => "Middle Name"]) !!}-->
                <!--    @include('includes.form_fields_validation_message', ['name' => 'middle_name'])-->
                <!--</div>-->
                {!! Form::label('first_name', __('form_fields.student.fields.last_name'), ['class' => 'col-sm-1 control-label',]) !!}
                <div class="col-sm-2">
                    {!! Form::text('last_name', null, ["class" => "form-control border-form upper", "placeholder" => "Last Name", "required", "id" => "last_name"]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'last_name'])
                </div>

                {!! Form::label('date_of_birth', __('form_fields.student.fields.date_of_birth'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::text('date_of_birth', null, ["class" => "form-control border-form input-mask-date","required", "autocomplete" => "off", "max" => \Carbon\Carbon::now()->subYears(17)->format('Y-m-d')]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'date_of_birth'])
                </div>

                {!! Form::label('gender', __('form_fields.student.fields.gender'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('gender', __('common.gender'), null, ['class'=>'form-control border-form',"required"]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'gender'])
                </div>

            </div>

            <div class="form-group">
                {!! Form::label('blood_group', __('form_fields.student.fields.blood_group'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-1">
                    {!! Form::select('blood_group', __('common.blood_group'), null,
                    [ 'class'=>'form-control border-form']) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'blood_group'])
                </div>
                {!! Form::label('nationality', __('form_fields.student.fields.nationality'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-2">
                                    {!! Form::select('nationality', 
                        ['Pakistani' => 'Pakistani', 'Other' => 'Other'], 
                        null, 
                        ["class" => "form-control border-form upper", "required"]) 
                    !!}
                    @include('includes.form_fields_validation_message', ['name' => 'nationality'])
                </div>


                {!! Form::label('cnic_no', __('form_fields.student.fields.cnic_no'), ['class' => 'col-sm-2 control-label']) !!}
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


                

                {!! Form::label('mobile_1', __('form_fields.student.fields.mobile_1'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::text('mobile_1', null, ["class" => "form-control border-form input-mask-mobile","required","maxlength" => "12",
                        "inputmode" => "tel"  ]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'mobile_1'])
                </div>
            </div>

            <div class="form-group">
                
                {!! Form::label('email', __('form_fields.student.fields.email'), ['class' => 'col-sm-1 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::email('email', null, ["class" => "form-control border-form ","Required", "maxlength" => "120"]) !!}
                    @include('includes.form_fields_validation_message', ['name' => 'email'])
                </div>

                {!! Form::label('religion', __('form_fields.student.fields.religion'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('religion', 
                        ['Islam' => 'Islam', 'Christian' => 'Christian',
                        "Hindu" => "Hindu", "Sikh" => "Sikh", "Other" => "Other"], 
                        null, 
                        ["class" => "form-control border-form upper", "required"]) 
                    !!}
                    @include('includes.form_fields_validation_message', ['name' => 'religion'])
                </div>


                <!-- {!! Form::label('domicile_id', __('form_fields.student.fields.domicile_id'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('domicile_id', 
                        ['Islam' => 'Islam', 'Christian' => 'Christian',
                        "Hindu" => "Hindu", "Sikh" => "Sikh", "Other" => "Other"], 
                        null, 
                        ["class" => "form-control border-form upper", "required"]) 
                    !!}
                    @include('includes.form_fields_validation_message', ['name' => 'domicile_id'])
                </div> -->
            </div>
        </fieldset>
    @endif
    @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.contact_info') == 1)
        <legend>{{ __('form_fields.student.section_label.contact_info')}}</legend>
        <div class="form-group">
            {!! Form::label('home_phone', __('form_fields.student.fields.home_phone'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('home_phone', null, ["class" => "form-control border-form input-mask-phone"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'home_phone'])
            </div>

            {!! Form::label('mobile_1', __('form_fields.student.fields.mobile_1'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('mobile_1', null, ["class" => "form-control border-form input-mask-mobile","required",
                        "inputmode" => "tel"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'mobile_1'])
            </div>

            {!! Form::label('mobile_2', __('form_fields.student.fields.mobile_2'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::text('mobile_2', null, ["class" => "form-control border-form input-mask-mobile",
                        "inputmode" => "tel"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'mobile_2'])
            </div>
        </div>
    @endif
    @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.address') == 1)
        <div class="label label-warning arrowed-in arrowed-right arrowed">{{ __('form_fields.student.section_label.address')}}</div>
        <hr class="hr-8">
        <div class="form-group">

            {!! Form::label('state', __('form_fields.student.fields.state'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::select('state', $data['state'],null, ['class' => 'form-control',"required"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'state'])
            </div>

            {!! Form::label('address', __('form_fields.student.fields.address'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-7">
                {!! Form::text('address', null, ["class" => "form-control border-form upper","required"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'address'])
            </div>
        </div>
    @endif
    @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.temp_address') == 1)
        <div class="label label-warning arrowed-in arrowed-right arrowed">{{ __('form_fields.student.section_label.temp_address')}}</div>

        <div class="control-group col-sm-12">
            <div class="radio">
                <label>
                    {!! Form::checkbox('permanent_address_copier', '', false, ['class' => 'ace', "onclick"=>"CopyAddress(this.form)"]) !!}
                    <span class="lbl"> Temporary Address Same As Permanent Address</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('state', __('form_fields.student.fields.state'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-3">
                {!! Form::select('temp_state', $data['state'],null, ['class' => 'form-control']) !!}
                @include('includes.form_fields_validation_message', ['name' => 'temp_state'])
            </div>

            {!! Form::label('temp_address', __('form_fields.student.fields.address'), ['class' => 'col-sm-1 control-label']) !!}
            <div class="col-sm-7">
                {!! Form::text('temp_address', null, ["class" => "form-control border-form upper"]) !!}
                @include('includes.form_fields_validation_message', ['name' => 'temp_address'])
            </div>
        </div>
    @endif
    @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.parent_info') == 1)
        <fieldset>
            @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.grand_father') == 1)
                <legend>{{ __('form_fields.student.section_label.parent_info')}}</legend>

                <div class="label label-warning arrowed-in arrowed-right arrowed">{{ __('form_fields.student.section_label.grand_father')}}</div>
                <hr class="hr-8">
                <div class="form-group">
                    {!! Form::label('grandfather_name', __('form_fields.student.fields.grandfather_name'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-3">
                        {!! Form::text('grandfather_first_name', null, [ "class" => "form-control border-form upper"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'grandfather_first_name'])
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('grandfather_last_name', null, [ "class" => "form-control border-form upper"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'grandfather_last_name'])
                    </div>
                </div>
            @endif
            @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.father') == 1)
                <div class="label label-warning arrowed-in arrowed-right arrowed">{{ __('form_fields.student.section_label.father')}}</div>
                <hr class="hr-8">

                <div class="form-group">
                    {!! Form::label('father_name', __('form_fields.student.fields.father_name'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-3">
                        {!! Form::text('father_first_name', null, [ "class" => "form-control border-form upper","required", "placeholder" => "Father's First Name", "maxlength" => "25"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_first_name'])
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('father_last_name', null, [ "class" => "form-control border-form upper", "placeholder" => "Father's Last Name", "maxlength" => "25"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_last_name'])
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('father_eligibility', __('form_fields.student.fields.eligibility'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_eligibility', null, ["placeholder" => "", "class" => "form-control border-form upper", "maxlength" => "25"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_eligibility'])
                    </div>

                    {!! Form::label('father_occupation', __('form_fields.student.fields.occupation'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_occupation', null, ["placeholder" => "", "class" => "form-control border-form upper", "maxlength" => "25"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_occupation'])
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('father_office', __('form_fields.student.fields.office'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_office', null, ["placeholder" => "", "class" => "form-control border-form upper"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_office'])
                    </div>

                    {!! Form::label('father_office_number', __('form_fields.student.fields.office_number'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_office_number', null, ["placeholder" => "", "class" => "form-control border-form upper",
                        "inputmode" => "tel", "maxlength" => "12"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_office_number'])
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('father_residence_number', __('form_fields.student.fields.residence_number'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_residence_number', null, ["class" => "form-control border-form input-mask-mobile", "maxlength"=>"12",
                        "inputmode" => "tel"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_residence_number'])
                    </div>

                    {!! Form::label('father_mobile_1', __('form_fields.student.fields.mobile_1'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_mobile_1', null, ["class" => "form-control border-form input-mask-mobile", "maxlength"=>"12",
                        "inputmode" => "tel"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_mobile_1'])
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('father_mobile_2', __('form_fields.student.fields.mobile_2'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_mobile_2', null, ["class" => "form-control border-form input-mask-mobile", "maxlength"=>"12",
                        "inputmode" => "tel"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_mobile_2'])
                    </div>

                    {!! Form::label('father_email', __('form_fields.student.fields.email'), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('father_email', null, ["class" => "form-control border-form", "maxlength"=>"120"]) !!}
                        @include('includes.form_fields_validation_message', ['name' => 'father_email'])
                    </div>
                </div>
            @endif
            @if(Config::get('edufirmconfig.student.online_registration.tabs.general_info.guardian') == 1)
                <div class="label label-warning arrowed-in arrowed-right arrowed">{{ __('form_fields.student.section_label.guardian')}}</div>

                <div class="control-group col-sm-12">
                    <div class="radio">
                        <label>
                            {!! Form::radio('guardian_is', 'father_as_guardian', false, ['class' => 'ace', "onclick"=>"FatherAsGuardian(this.form)"]) !!}
                            <span class="lbl"> Father is Guardian</span>
                        </label>
                        <label>
                            {!! Form::radio('guardian_is', 'self_guardian', true, ['class' => 'ace', "onclick"=>"SelfGuardian(this.form)"]) !!}
                            <span class="lbl"> Self</span>
                        </label>
                        <label>
                            {!! Form::radio('guardian_is', 'other_guardian', true, ['class' => 'ace', "onclick"=>"OtherGuardian(this.form)"]) !!}
                            <span class="lbl"> Other's</span>
                        </label>
                        @if(request()->is('online-registration*')!=1)
                            <label>
                                {!! Form::radio('guardian_is', 'link_guardian', false, ['class' => 'ace', "onclick"=>"linkGuardian(this.form)"]) !!}
                                <span class="lbl"> Link Guardian</span>
                            </label>
                        @endif
                    </div>
                </div>
                <hr>
                <div id="guardian-detail">
                    <hr class="hr-8">
                    <div class="form-group">
                        {!! Form::label('guardian_name', __('form_fields.student.fields.guardian_name'), ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::text('guardian_first_name', null, [ "class" => "form-control border-form upper","required", "maxlength" => "20"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_first_name'])
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('guardian_last_name', null, [ "class" => "form-control border-form upper", "maxlength" => "20"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_last_name'])
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('guardian_eligibility', __('form_fields.student.fields.eligibility'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_eligibility', null, ["placeholder" => "", "class" => "form-control border-form upper", "maxlength" => "35"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_eligibility'])
                        </div>

                        {!! Form::label('guardian_occupation', __('form_fields.student.fields.occupation'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_occupation', null, ["placeholder" => "", "class" => "form-control border-form upper", "maxlength" => "35"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_occupation'])
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('guardian_office', __('form_fields.student.fields.office'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_office', null, ["placeholder" => "", "class" => "form-control border-form upper", "maxlength" => "50"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_office'])
                        </div>

                        {!! Form::label('guardian_office_number', __('form_fields.student.fields.office_number'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_office_number', null, ["placeholder" => "", "class" => "form-control border-form upper"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_office_number'])
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('guardian_residence_number', __('form_fields.student.fields.residence_number'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_residence_number', null, ["class" => "form-control border-form input-mask-mobile",
                        "inputmode" => "tel"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_residence_number'])
                        </div>

                        {!! Form::label('guardian_mobile_1', __('form_fields.student.fields.mobile_1'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_mobile_1', null, ["class" => "form-control border-form input-mask-mobile",
                        "inputmode" => "tel"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_mobile_1'])
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('guardian_mobile_2', __('form_fields.student.fields.mobile_2'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_mobile_2', null, ["class" => "form-control border-form input-mask-mobile",
                        "inputmode" => "tel"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_mobile_2'])
                        </div>

                        {!! Form::label('guardian_email', __('form_fields.student.fields.email'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_email', null, ["class" => "form-control border-form", "maxlength" => "60"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_email'])
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('guardian_relation', __('form_fields.student.fields.relation'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_relation', null, ["class" => "form-control border-form upper","required", "maxlength" => "25"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_relation'])
                        </div>

                        {!! Form::label('guardian_address', __('form_fields.student.fields.address'), ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-4">
                            {!! Form::text('guardian_address', null, ["class" => "form-control border-form upper", "required", "maxlength" => "120"]) !!}
                            @include('includes.form_fields_validation_message', ['name' => 'guardian_address'])
                        </div>
                    </div>
                </div>
                @if(request()->is('online-registration*')!=1)
                        <div id="link-guardian-detail">
                            <div class="form-group">
                                {!! Form::label('guardian_info', 'Find Guardian Using Name | Mobile Number | Email & Click on Link Now ', ['class' => 'col-sm-12 control-label align-center']) !!}
                                <div class="col-sm-12">
                                    {!! Form::select('guardian_link_id', [], null, ["placeholder" => "Type Student Reg.No. or Guardians Name...", "class" => "col-xs-12 col-sm-12", "style" => "width: 100%;"]) !!}
                                    @include('includes.form_fields_validation_message', ['name' => 'guardian_info'])

                                    <hr>
                                    <div class="align-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="load-guardian-html-btn">
                                            <i class="fa fa-link bigger-120"></i> Link Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div id="guardian_wrapper">
                            </div>
                        </div>
                @else
                        <div id="link-guardian-detail"></div>
                @endif
            @endif

        </fieldset>
    @endif