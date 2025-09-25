<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */
    'student'   =>
                [
                    'tabs' =>   [
                        'general_info'      =>  'General Info',
                        'academic_info'     =>  'Academic Info',
                        'profile_image'     =>  'Profile Image',
                        'annexure'          =>  'Attach Document',
                        'extra_info'        =>  'Extra Info',
                    ],
                    'section_label' =>[
                        'general_info'      =>  'General Info',
                        'enroll_info'      =>  'Course Info',
                        'student_info'      =>  'Student Info',
                        'contact_info'      =>    'Contact Info',
                        'address'           =>    'Permanent Address',
                        'temp_address'      =>    'Temporary Address',
                        'parent_info'       =>  'Parental Info',
                        'grand_father'      =>  'Grand Father\'s Detail',
                        'father'            =>  'Father\'s Detail',
                        'mother'            =>  'Mothers\'s Detail',
                        'guardian'            =>  'Guardian\'s Detail',
                    ],
                    'fields' =>
                        [
                            'cnic_no'                       =>  'CNIC/Form B',
                            'reg_no'                        =>  'Admission.No.',
                            'reg_date'                      =>  'Admission. Date',
                            'test_date'                     =>  'Test Date',
                            'university_reg'                =>  'Unique ID',
                            'special_category'              =>  'Special Category',
                            'weightage_claim'               =>  'Weightage Claim',
                            'faculty'                       =>  __('academic.child.academic_level.child.faculty'),
                            'semester'                      =>  __('academic.child.academic_level.child.semester'),
                            'academic_status'               =>  'Academic Status',
                            'batch'                         =>  __('academic.child.academic_level.child.batch'),
                            'name_of_student'               =>  'Name of Student',
                            'first_name'                    =>  'First Name',
                            'middle_name'                   =>  'Middle Name',
                            'last_name'                     =>  'Last Name',
                            'date_of_birth'                 =>  'D.O.B',
                            'gender'                        =>  'Gender',
                            'blood_group'                   =>  'Blood Group',
                            'religion'                      =>  'Religion',//Religion
                            'domicile_id'                   =>  'Domicile',
                            'religion_default'              =>  '',//Default PlaceHolder
                            'nationality'                   =>  'Nationality',
                            'email'                         =>  'E-mail',
                            'extra_info'                    =>  'Extra Info',
                            'student_image'                 =>  'Student Profile Picture',
                            'student_signature'             =>  'Student Signature',
                            'reg_fee'                       =>  'Registration Fee',
                            'sbi_collect_no'                =>  'Bank Collect No',
                            'bank_ref_no'                   =>  'Bank Ref. No.',
                            'admission_payment_ref_no'      =>  'Admission Payment Ref No.',
                            'payment_date'                  =>  'Payment Date',
                            'university_enrollment_no'      =>  'University Enrollment No.',
                            'old_school_slc_no'             =>  'Old School SLC#',
                            'old_school_slc_date'           =>  'SLC Date.',
                            'old_school_leaving_reason'     =>  'Leaving Reason',
                            'old_school_name'               =>  'School Name',
                            'admission_date'                =>  'Admission Date',
                            'admission_no'                  =>  'Admission No.',
                            'admission_course_fee'          =>  'Admission Course Fee',

                            'home_phone'                    =>  'Home Phone',
                            'mobile_1'                      =>  'Mobile No.',
                            'mobile_2'                      =>  'Mobile 2',
                            'address'                       =>  'Address',
                            'state'                         =>  'Province',
                            'country'                       =>  'Country',
                            'postal_code'                   =>  'Postal Code',

                            'grandfather_name'              =>  'Grand Father Name',
                            'grandfather_first_name'        =>  'Grand Father First Name',
                            'grandfather_middle_name'       =>  'Grand Father Middle Name',
                            'grandfather_last_name'         =>  'Grand Father Last Name',
                            'father_name'                   =>  'Father Name',
                            'father_first_name'             =>  'Father First Name',
                            'father_middle_name'            =>  'Father Middle Name',
                            'father_last_name'              =>  'Father Last Name',
                            'father_cnic'                   =>  'Father CNIC',
                            'mother_name'                   =>  'Mother Father Name',
                            'mother_first_name'             =>  'Mother First Name',
                            'mother_middle_name'            =>  'Mother Middle Name',
                            'mother_last_name'              =>  'Mother Last Name',
                            'eligibility'                   =>  'Qualification',
                            'occupation'                    =>  'Occupation',
                            'office'                        =>  'Office',
                            'office_number'                 =>  'Office Number',
                            'residence_number'              =>  'Residence Number',
                            'father_image'                  =>  'Father Image',
                            'mother_image'                  =>  'Mother Image',

                            'guardian_name'                 =>  'Name of Guardian',
                            'guardian_first_name'           =>  'Guardian First Name',
                            'guardian_middle_name'          =>  'Guardian Middle Name',
                            'guardian_last_name'            =>  'Guardian Last Name',
                            'relation'                      =>  'Relation',
                            'guardian_image'                =>  'Guardian Image',



                        ]
                ],
        'staff'   =>
                [
                    'tabs' =>[
                        'general_info'      =>  'General Info',
                        'profile_image'     =>  'Profile Image',
                        'extra_info'        =>  'Extra Info',
                    ],
                    'fields' =>
                        [
                            'designation'                   =>  'Designation',


                        ]
                ],



    ];

