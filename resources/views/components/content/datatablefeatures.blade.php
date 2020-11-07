<div class="box">
    <div class="box-header">
        <h3 class="box-title"> {{ $title } </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="data-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                
                @foreach($menu_header in $menu_headers)
                    <th>{{ $menu_header }}</th>
                @endforeach

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet
                Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
            </tr>
            <tr>
                <td>Trident</td>
                <td>Internet
                Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
            </tr>   
        </tbody>
        <tfoot>
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
        </tr>
        </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
          <!-- /.box -->
      