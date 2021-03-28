@extends('layouts.layout')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Year Table</h3>
                  <a href="{{ route('year.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Year</a>
                </div><!-- /.box-header -->
                <hr>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($years as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->year }}</td>
                        <td>
                            <a href="{{ route('year.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit    "></i></a>
                            <a href="" onclick="deleteData({{ $item->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>

                      </tr>
                      @endforeach

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("year/") }}'+"/"+id)
        }
    </script>
@endsection


