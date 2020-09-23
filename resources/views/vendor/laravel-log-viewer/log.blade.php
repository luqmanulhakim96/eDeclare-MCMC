@extends('user.layouts.app')
@section('content')
            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <!-- <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small> -->
                </div>
                <!-- Small card component -->
                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Ralat & Sistem Log</div>

                      <div class="table-responsive">
                        @if ($logs === null)
                          <div>
                            Log file >50M, please download it.
                          </div>
                        @else
                        <table id="example" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
                          <thead>
                          <tr>
                            @if ($standardFormat)
                              <th>Tahap</th>
                              <th>Konteks</th>
                              <th>Tarikh</th>
                            @else
                              <th>Line number</th>
                            @endif
                            <th>Kandungan</th>
                          </tr>
                          </thead>
                          <tbody>

                          @foreach($logs as $key => $log)
                            <tr data-display="stack{{{$key}}}">
                              @if ($standardFormat)
                                <td class="nowrap text-{{{$log['level_class']}}}">
                                  <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                </td>
                                <td class="text">{{$log['context']}}</td>
                              @endif
                              <td class="date">{{{$log['date']}}}</td>
                              <td class="text">
                                @if ($log['stack'])
                                  <button type="button"
                                          class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                          data-display="stack{{{$key}}}">
                                    <span class="fa fa-search"></span>
                                  </button>
                                @endif
                                {{{$log['text']}}}
                                @if (isset($log['in_file']))
                                  <br/>{{{$log['in_file']}}}
                                @endif
                                @if ($log['stack'])
                                  <div class="stack" id="stack{{{$key}}}"
                                       style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                  </div>
                                @endif
                              </td>
                            </tr>
                          @endforeach

                          </tbody>
                        </table>
                        @endif
                        <div class="p-3">
                          @if($current_file)
                            <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                              <span class="fa fa-download"></span> Muat turun fail
                            </a>
                            -
                            <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                              <span class="fa fa-sync"></span> Bersih fail
                            </a>
                            -
                            <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                              <span class="fa fa-trash"></span> Buang Fail
                            </a>
                            @if(count($files) > 1)
                              -
                              <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                <span class="fa fa-trash-alt"></span> Buang semua fail
                              </a>
                            @endif
                          @endif
                        </div>
                    </div>

                  </div>
                </div>
            </div>

            <script type="text/javascript">
            $(document).ready(function() {
                var buttonCommon = {
                  exportOptions: {
                       // Any other settings used
                       grouped_array_index: 0,
                  },
                };
                var groupColumn = 1;
                var table = $('#example').DataTable({
                     dom: 'Bfrtip',
                     "order": [[ 2, "desc" ]],
                     buttons: [
                     $.extend( true, {}, buttonCommon, {
                         extend: 'copyHtml5'
                     } ),
                     $.extend( true, {}, buttonCommon, {
                         extend: 'excelHtml5'
                     } ),
                     $.extend( true, {}, buttonCommon, {
                         extend: 'pdfHtml5'
                     } )
                 ]
                 } );
             } );
             </script>
@endsection
