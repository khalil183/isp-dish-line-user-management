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
                  <h3 class="box-title">Month Update Form</h3>
                  <a href="{{ route('month.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> All month</a>
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
                    <form action="{{ route('month.update',$month->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="month">Year</label>
                            <input name="month" id="month" type="text" class="form-control"  value="{{ $month->month }}">
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
