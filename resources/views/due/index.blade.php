@extends('layouts.layout')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                      <div class="box-body py-5">
                          <form action="{{ route('yearly.customer.due') }}" method="POST">
                            @csrf
                              <div class="form-group">
                                  <label for="">Select Year</label>
                                  <select name="year" id="year" class="form-control select2">
                                    @foreach ($years as $item)
                                    <option {{ @$year==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <button class="btn btn-success">Search</button>

                          </form>
                      </div>
                    </div>
                </div>
              </div><!-- /.row -->
          @isset($customers)
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Customer Payment</h3>
                </div><!-- /.box-header -->
                <hr>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Payable</th>
                        <th>Due</th>
                        <th>Payable Month</th>
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
                        @php
                            $due=App\Payment::where('client_id',$item->id)->sum('due_amount');
                            $payable=App\Payment::where('client_id',$item->id)->sum('payable_amount');
                            $month=App\Payment::where('client_id',$item->id)->where('year_id',$year)->count();

                        @endphp
                        <td>{{ $payable }} Tk</td>
                        <td>{{ $due }} Tk</td>
                        <td>{{ $month }} Month</td>


                      </tr>
                      @endforeach

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          @endisset
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("customer/") }}'+"/"+id)
        }
    </script>
@endsection


