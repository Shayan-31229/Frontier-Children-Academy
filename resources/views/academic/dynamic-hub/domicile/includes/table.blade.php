
        @include('includes.data_table_header')
        <!-- div.table-responsive -->
        <div class="table-responsive">

                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>{{ __('common.s_n')}}</th>
                            <th>{{ $panel }}</th>
                            <th>{{ __('common.district')}}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data['domiciles']) && $data['domiciles']->count() > 0)
                            @php($i=1)
                            @foreach($data['domiciles'] as $customer_status)
                                <tr>
                                    <td class="center first-child">
                                        <label>
                                            <input type="checkbox" name="chkIds[]" value="{{ encrypt($customer_status->id) }}" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $customer_status->district }} - [{{ $customer_status->id }}]</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a class="btn btn-success btn-minier" href="{{ route($base_route.'.edit', ['id' => encrypt($customer_status->id)]) }}">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-130" title="Edit"></i>
                                            </a>

                                            <a href="{{ route($base_route.'.delete', ['id' => encrypt($customer_status->id)]) }}" class="btn btn-danger btn-minier bootbox-confirm">
                                        <i class="ace-icon fa fa-trash-o bigger-130" title="Delete"></i>
                                    </a>
                                        </div>
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No {{ $panel }} data found.</td>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

        </div>