<div class="row">
    <div class="col-xs-12">
        <h4 class="header large lighter blue"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;{{ $panel }} List</h4>
        <div class="clearfix">
            <span class="pull-right tableTools-container"></span>
        </div>
        <div class="table-header">
            {{ $panel }}  Record list on table. Filter {{ $panel }} using the filter.
        </div>
            <!-- div.table-responsive -->
        <div class="table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ __('common.s_n')}}</th>
                        <th>{{__('form_fields.student.fields.faculty')}}</th>
                        <th>{{__('form_fields.student.fields.semester')}}</th>
                        <th>Reg. Num.</th>
                        <th>Reg. Date</th>
                        <th>University Reg.</th>
                        <th>{{__('form_fields.student.fields.name_of_student')}}</th>

                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>CNIC No</th>
                        <th>Nationality</th>

                        <th>Religion</th>

                        <th>Email</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Country</th>

                        <th>Temp. Address</th>
                        <th>Temp. State</th>
                        <th>Temp. Country</th>

                        <th>Home Phone</th>
                        <th>Mobile Number</th>

                        <th>Academic Status</th>
                        <th>{{ __('common.status')}}</th>

                        <th>ExtraInfo</th>

                        <th>Total Fee Per Year</th>
                        <th>Bank Name</th>
                        <th>Bank Code</th>
                        <th>Bank Account Number</th>
                        <th>Admission Portal Login ID</th>
                        <th>Admission Portal Login Password</th>

                        <th>Scholarship</th>
                        <th>Scholarship Application ID</th>
                        <th>Scholarship User Name</th>
                        <th>Scholarship Password</th>

                </tr>
                </thead>
                <tbody>
                @if (isset($data['student']) && $data['student']->count() > 0)
                    @php($i=1)
                    @foreach($data['student'] as $student)
                        <tr>
                            <td>{{ $i }}</td>
                            <td> {{  ViewHelper::getFacultyTitle( $student->faculty ) }}</td>
                            <td> {{  ViewHelper::getSemesterTitle( $student->semester ) }}</td>
                            <td><a href="{{ route('student.view', ['id' => encrypt($student->id)]) }}">{{ $student->reg_no }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($student->reg_date)->format('Y-m-d')}} </td>
                            <td>{{ $student->university_reg }}</td>
                            <td><a href="{{ route('student.view', ['id' => encrypt($student->id)]) }}"> {{ $student->first_name.' '.$student->middle_name.' '. $student->last_name }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d')}}</td>

                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->blood_group }}</td>

                            <td>{{ $student->cnic_no }}</td>
                            <td>{{ $student->nationality }}</td>

                            <td>{{ $student->religion }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->state }}</td>
                            <td>{{ $student->country }}</td>
                            <td>{{ $student->temp_address }}</td>
                            <td>{{ $student->temp_state }}</td>
                            <td>{{ $student->temp_country }}</td>
                            <td>{{ $student->home_phone }}</td>
                            <td>
                                @if(isset($student->mobile_2))
                                    {{ $student->mobile_1.', '.$student->mobile_2}}
                                @else
                                    {{ $student->mobile_1}}
                                @endif
                            </td>
                            <td>{{ ViewHelper::getStudentAcademicStatusId($student->academic_status) }}</td>
                            <td>{{ $student->status=="active"?"Active":"In-Active" }}</td>

                            <td>{{ $student->extra_info }}</td>

                            <td>{{ $student->total_fee_per_year }}</td>
                            <td>{{ $student->bank_name }}</td>
                            <td>{{ $student->bank_code }}</td>
                            <td>{{ $student->bank_account_number }}</td>
                            <td>{{ $student->admission_portal_login_id }}</td>
                            <td>{{ $student->admission_portal_login_password }}</td>

                            <td>{{ $student->scholarships_id }}</td>
                            <td>{{ $student->scholarship_application_id }}</td>
                            <td>{{ $student->scholarship_user_name }}</td>
                            <td>{{ $student->scholarship_password }}</td>
                        </tr>
                        @php($i++)
                    @endforeach
                @else
                    <tr>
                        <td colspan="51">No {{ $panel }} data found. Please Filter {{ $panel }} to show. </td>
                    </tr>
                @endif
                </tbody>
            </table>
            {!! Form::close() !!}

        </div>
    </div>
</div>