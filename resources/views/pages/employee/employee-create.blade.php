@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Register employees')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <a href="/employee"><button class="btn btn-secondary">Back</button></a>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Register employees</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <br>
              <form name="formCreateEmployee"action="employee-create" method="POST">

                {{csrf_field()}}
                <div class="form-group">
                  <label for="first_name">First Name<span class="text-danger">&nbsp;*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name"  required>
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name<span class="text-danger">&nbsp;*</span></label>
                  <input type="last_name" class="form-control" id="last_name" name="last_name">
                </div>

                <div class="form-group">
                  <label for="rua">Company<span class="text-danger">&nbsp;*</span></label><br>
                  <select class="custom-select col-md-12" id="id_company" name="id_company" required>
                    <option value="" disabled selected>Selecione..</option>
                    @foreach ($companies as $company)
                      <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input 
                  type="text" 
                  class="form-control" 
                  id="phone" 
                  name="phone"
                  minlength="9"
                  maxlength="16">
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
