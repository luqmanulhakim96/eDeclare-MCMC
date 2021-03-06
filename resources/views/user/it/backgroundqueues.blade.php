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
                      <div class="card-title">Latar Belakang Sistem</div>
                      <div class="table-responsive">

                      <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                        <!-- Table head -->
                        <thead>
                            <tr>
                              <th class="all">Status</th>
                              <th class="all">Tugas</th>
                              <th class="all">Perincian</th>
                              <th class="all">Perkembangan</th>
                              <th class="all">Tempoh</th>
                              <th class="all">Permulaan</th>
                              <th class="all">Ralat</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                          @foreach($jobs as $job)

                              <tr>
                                  <td>
                                      @if(!$job->isFinished())
                                      <span class="badge m-1 p-2 badge-pill badge-warning" style="font-size:12px;">Running</span>
                                      @elseif($job->hasSucceeded())
                                      <span class="badge m-1 p-2 badge-pill badge-primary" style="font-size:12px;">Success</span>
                                      @else
                                      <span class="badge m-1 p-2 badge-pill badge-danger" style="font-size:12px;">Failed</span>
                                      @endif
                                  </td>

                                  <td>
                                      {{ $job->getBaseName() }}
                                      <span>
                                          #{{ $job->job_id }}
                                      </span>
                                  </td>

                                  <td>
                                      <div class="text-xs">
                                          <span>Queue:</span>
                                          <span>{{ $job->queue }}</span>
                                      </div>

                                      <div class="text-xs">
                                          <span>Attempt:</span>
                                          <span>{{ $job->attempt }}</span>
                                      </div>
                                  </td>

                                  <td>
                                      @if($job->progress !== null)
                                              <div class="flex items-stretch h-3 rounded-full bg-gray-300 overflow-hidden">
                                                  <div class="h-full bg-green-500" style="width: {{ $job->progress }}%"></div>
                                              </div>

                                              <div class="flex justify-center mt-1 text-xs text-gray-800 font-semibold">
                                                  {{ $job->progress }}%
                                              </div>
                                      @else
                                          -
                                      @endif
                                  </td>

                                  <td>
                                      {{ sprintf('%02.2f', (float) $job->time_elapsed) }} s
                                  </td>

                                  <td>
                                      {{ $job->started_at->diffForHumans() }}
                                  </td>

                                  <td>
                                      @if($job->hasFailed() && $job->exception_message !== null)
                                          <textarea rows="4" class="w-64 text-xs p-1 border" readonly>{{ $job->exception_message }}</textarea>
                                      @else
                                          -
                                      @endif
                                  </td>

                              </tr>

                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
            </div>
            <br><br><br><br>
            
        </main>
        <script type="text/javascript">
        $(document).ready(function() {
            var buttonCommon = {
              exportOptions: {
                   // Any other settings used
                   grouped_array_index: 0,
              },
            };
            var groupColumn = 1;

            var tableTitle = $('.card-title').html();
            var table = $('#example').DataTable({
                 dom: 'Bfrtip',
                 "buttons": [
                     {
                         extend: 'excel',
                         orientation: 'landscape',
                         pageSize: 'A4',
                         title: tableTitle,
                     },
                     {
                         extend: 'pdfHtml5',
                         orientation: 'landscape',
                         pageSize: 'A4',
                         title: tableTitle,
                     },
                     {
                         extend: 'print',
                         text: 'Cetak',
                         pageSize: 'LEGAL',
                         title: tableTitle,
                         customize: function(win)
                         {

                             var last = null;
                             var current = null;
                             var bod = [];

                             var css = '@page { size: landscape; }',
                                 head = win.document.head || win.document.getElementsByTagName('head')[0],
                                 style = win.document.createElement('style');

                             style.type = 'text/css';
                             style.media = 'print';

                             if (style.styleSheet)
                             {
                               style.styleSheet.cssText = css;
                             }
                             else
                             {
                               style.appendChild(win.document.createTextNode(css));
                             }

                             head.appendChild(style);
                      },
                     },
                 ],
                 "language": {
                     "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
                     "zeroRecords": "Maaf, tiada rekod.",
                     "info": "Memaparkan halaman _PAGE_ daripada _PAGES_",
                     "infoEmpty": "Tidak ada rekod yang tersedia",
                     "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
                     "search": "Carian",
                     "previous": "Sebelum",
                     "paginate": {
                         "first":      "Pertama",
                         "last":       "Terakhir",
                         "next":       "Seterusnya",
                         "previous":   "Sebelumnya"
                     },
                 },
             } );
         } );
         </script>
@endsection
