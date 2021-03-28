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
                      <form action="{{ url('search-monthly-payment') }}" method="POST">
                        @csrf
                          <div class="form-group">
                              <label for="">Select Year</label>
                              <select name="year" id="year" class="form-control select2">
                                @foreach ($years as $item)
                                <option {{ old('year')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="">Select Month</label>
                            <select name="month" id="month" class="form-control select2">
                                @foreach ($months as $item)
                                <option {{ old('month')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->month }}</option>
                                @endforeach
                            </select>
                          </div>

                          <button class="btn btn-success">Search</button>

                      </form>
                  </div>
                </div>
            </div>
            @isset($payments)
             <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Monthly Payment History</h3>
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
                            <td>{{ $item->year->year }}</td>
                            <td>{{ $item->month->month }}</td>
                            <td>{{ $item->payable_amount }}</td>
                            <td>{{ $item->due_amount }}</td>
                            <td>{{ $item->date }}</td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->

            </div><!-- /.col -->

            @endisset

          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@endsection


