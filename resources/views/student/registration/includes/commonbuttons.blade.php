<div class="clearfix hidden-print ">
    <div class="easy-link-menu align-center">
        <a class="{!! request()->is('student/scrutiny*')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('student.scrutiny') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Scrutiny</a>
        <a class="{!! request()->is('student/interview*')?'btn-success':'btn-primary' !!} btn-sm" href="{{ route('student.interview') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Interview</a>
        <a class="{!! request()->is('student/meritlist*')?'btn-success':'btn-primary' !!} btn-sm " href="{{ route('student.meritlist') }}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Merit List</a>
        <a class="{{ request()->is('student/confirmadmission*') ? 'btn-success' : 'btn-primary' }} btn-sm" href="{{ route('student.confirmadmission') }}">
            <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Confirm Admission
        </a>
    </div>
    <hr class="hr-6">
</div>
