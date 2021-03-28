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
                  <h3 class="box-title">Payment History</h3>
                  <a href="{{ route('payment.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Payment</a>
                </div><!-- /.box-header -->
                <hr>
                <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped responsive">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Payable</th>
                        <th>Due</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                      @foreach ($payments as $item)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->invoice }}</td>
                        <td>{{ $item->client->name }}</td>
                        <td>{{ $item->client->phone }}</td>
                        <td>{{ @$item->year->year }}</td>
                        <td>{{ $item->month->month }}</td>
                        <td>{{ $item->payable_amount }}</td>
                        <td>{{ $item->due_amount }}</td>
                        <td>{{ $item->date }}</td>
                      </tr>
                      @endforeach

                    </tfoot>
                  </table>
                </div>
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


