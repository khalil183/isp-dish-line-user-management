@extends('layouts.layout')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="row">
              <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Payment Form</h3>
                  <a href="{{ route('payment.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> Payment History</a>
                </div><!-- /.box-header -->
                <hr>
                <div class="box-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('payment.store') }}" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label for="">Customer</label>
                            <select name="customer" id="" class="form-control select2">
                                <option value="">Select Customer</option>
                                @foreach ($customers as $item)
                                <option {{ old('customer')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Years</label>
                            <select name="year" id="" class="form-control select2">
                                <option value="">Select Year</option>
                                @foreach ($years as $item)
                                <option {{ old('year')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Month</label>
                            <select name="month" id="" class="form-control select2">
                                <option value="">Select Month</option>
                                @foreach ($months as $item)
                                <option {{ old('month')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->month }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input name="total_amount" id="total_amount" type="text" class="form-control" placeholder="100" value="{{ old('total_amount') }}">
                        </div>
                        <div class="form-group">
                            <label for="payable_amount">Payable Amount</label>
                            <input name="payable_amount" oninput="payable()" id="payable_amount" type="text" class="form-control" placeholder="100" value="{{ old('payable_amount') }}">
                        </div>

                        <div class="form-group">
                            <label for="due_amount">Due Amount</label>
                            <input name="due_amount" id="due_amount" type="text" class="form-control" placeholder="0" value="{{ old('due_amount') }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input name="date" id="date" type="date" class="form-control" value="{{ old('date') }}">
                        </div>

                        <button type="submit" class="btn btn-success">Add New</button>
                    </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script>
          function payable(){
              var amount=$("#payable_amount").val();
              var total=$("#total_amount").val();
              console.log(total-amount);
              $("#due_amount").val(total-amount)



          }
      </script>

@endsection
