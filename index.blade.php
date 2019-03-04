<link rel="stylesheet" href="{{ asset('datatables.bundle.css') }}">
.
.
<div class="table-responsive">
    <table class="table table-striped- table-bordered table-hover table-checkable id="m_table_1" data-url="{{ route('komponen-gaji.datatable') }}">
    	<thead class="text-center">
    		<tr>
                  <th width="1%">No</th>
                  <th>Nama Komponen</th>
                  <th>Deskripsi</th>
                  <th>Kategori</th>
                  <th>Sub Kategori</th>
                  <th>Kode Akun</th>
                  <th>Jumlah (Rp)</th>
                  <th>Default</th>
                  <th class="text-center" width="10%">Aksi</th>
    		</tr>
    	</thead>
    	<tbody class="text-left"></tbody>
    </table>
</div>
.
.
<script type="text/javascript" src="{{ asset('datatables.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('script.js') }}"></script>
<script>
        $(document).ready( function () {
          var t = $('#m_table_1').DataTable({
                    processing : true,
                    serverSide : true,
                    lengthChange : true,
                    searching : false,
                    info : true,
                    dom: customDomPosition,
                    oLanguage: customLanguageDatatable,
                    ajax : {
                        url: '{!! route('consultants.datatable') !!}',
                        data: function (d) {
                            d.item_name = $('input[name=item_name]').val();
                        }
                    },
                    columns:[
                        { data:'id', name:'id', class:'text-center'},
                        { data:'item_name', name:'item_name'},
                        { data:'description', name:'description'},
                        { data:'category', name:'category'},
                        { data:'subcategory_name', name:'subcategory_name'},
                        { data:'account_name', name:'account_name'},
                        { data:'amounts', name:'amounts'},
                        { data:'default', name:'default'},
                        { data:'action', name:'action', orderable: false, searchable: false, class:'text-center'}
                    ]
                  });
          t.on( 'order.dt search.dt', function () {
              t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                  cell.innerHTML = i+1;
              });
          }).draw();
          
          $('form').on('submit', function(e) {
              t.on('order.dt search.dt', function () {
                  t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                  });
              }).draw();
           
             var item_name = document.getElementById('item_name').value;
             if (item_name == ''){
                 item_name = 'null'
             }

             e.preventDefault()
         });
      });
    </script>
