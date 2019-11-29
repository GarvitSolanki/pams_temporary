<div class="modal fade" id="assignProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">@lang('global.app_SelectProject')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-md-12'>

                        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}


                                <label for="csv_file" class="col-md-4 control-label">@lang('global.app_college_list')</label>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <select name="fields">
                                        <option value=''>Please select</option>
                                        @foreach($colleges as $key => $college)
                                            <option value="{{ $college->college_name }}" {{--{{ strtolower($header) === strtolower($college) ? 'selected' : '' }}>{{ $college }}--}}>{{ $college->college_name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> @lang('global.app_file_contains_header_row')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('global.app_parse_csv')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>