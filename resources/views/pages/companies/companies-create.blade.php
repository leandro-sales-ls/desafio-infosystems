@extends('layouts.app', ['activePage' => 'company', 'titlePage' => __('Register employees')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <a href="/companies"><button class="btn btn-secondary">Back</button></a>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Register employees</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <br>
              <form name="formCreateCompany"action="company-create" method="POST">

                {{csrf_field()}}
                <div class="form-group">
                  <label for="name">Name<span class="text-danger">&nbsp;*</span></label>
                  <input type="text" class="form-control" id="name" name="name"  required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" class="form-control" id="website" name="website">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
