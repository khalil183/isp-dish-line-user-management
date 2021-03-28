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
                  <h3 class="box-title">Customer Table</h3>
                  <a href="{{ route('customer.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</a>
                </div><!-- /.box-header -->
                <hr>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>SN</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>House Number</th>
                        <th>Reg. Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($customers as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->house_number }}</td>
                        <td>{{ $item->registration_date }}</td>
                        <td>
                            <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit    "></i></a>
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
            $("#deleteForm").attr("action",'{{ url("customer/") }}'+"/"+id)
        }
    </script>
@endsection


