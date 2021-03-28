@extends('layouts.layout')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Customer Update Form</h3>
                  <a href="{{ route('customer.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> All Customer</a>
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
                    <form action="{{ route('customer.update',$client->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder=" Name" value="{{ $client->name }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="{{ $client->address}}">
                        </div>
                        <div class="form-group">
                            <label for="house_number">House Number</label>
                            <input name="house_number" id="house_number" type="text" class="form-control" placeholder="House Number" value="{{ $client->house_number }}">
                        </div>

                        <div class="form-group">
                            <label for="registration_date">Registration Date</label>
                            <input name="registration_date" id="registration_date" type="date" class="form-control"  value="{{ $client->registration_date }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update Now</button>
                    </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection
