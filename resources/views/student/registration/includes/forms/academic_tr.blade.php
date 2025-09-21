@if(isset($academicInfoRow) && $academicInfoRow->count() >0)
    @foreach($academicInfoRow as $row)
        <tr class="option_value">
            <td>
                {{ $row->title }}
                {!! Form::hidden('board[]', $row->title, ["class" => "col-md-12"]) !!}
                {{--["class" => "col-xs-10 col-sm-11"]--}}
            </td>
            <td>
                {!! Form::number('pass_year[]', null, ["class" => "col-md-12", "required", "min" => "1900",
                    "max" => date('Y'), "placeholder" => "e.g. 2023",
                    "oninput" => "if(this.value.length > 4) this.value = this.value.slice(0,4);"]) !!}
            </td>
            <td>
                {!! Form::text('institution[]', null, ["class" => "col-md-12", "required", "maxlength" => "50"]) !!}
            </td>
            <td>
                {!! Form::text('roll_no[]', null, ["class" => "col-md-12", "required", "maxlength" => "10"]) !!}
            </td>

            <td>
                {!! Form::text('major_subjects[]', null, ["class" => "col-md-12", "required", "maxlength" => "20"]) !!}
            </td>

            <td>
                {!! Form::number('mark_obtained[]', null, ["class" => "col-md-12 mark-obtained calculate-percent",
                 "oninput" => "if(this.value.length > 4) this.value = this.value.slice(0,4);", "required"]) !!}
            </td>

            <td>
                {!! Form::number('maximum_mark[]', null, ["class" => "col-md-12 maximum-mark calculate-percent",
                 "oninput" => "if(this.value.length > 4) this.value = this.value.slice(0,4);", "required"]) !!}
            </td>

            <td>
                {!! Form::number('percentage[]', null, ["class" => "col-md-12 percent-value","readonly",
                 "oninput" => "if(this.value.length > 3) this.value = this.value.slice(0,3);"]) !!}
            </td>
            <td></td>

        </tr>
    @endforeach
@endif
@section('js')
<script>
    $(function() {
        $('.calculate-percent').change(function() {
            $obtainMark = $(this).closest('tr').find('.mark-obtained').val();
            $maximumMark = $(this).closest('tr').find('.maximum-mark').val();
            $percentage = (($obtainMark * 100) / $maximumMark).toFixed(2);
            $(this).closest('tr').find('.percent-value').val($percentage);
        });
    });
</script>
@endsection


