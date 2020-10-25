@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Employees')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <a href="/employee-create"><button class="btn btn-primary">Register</button></a>

        </div>

        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Employees</h4>
            <p class="card-category">Registered Employees</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="container-fluid">
                <table class="table table-hover table-sm">
                  <thead class=" text-primary">
                    <th>
                      First Name
                    </th>
                    <th>
                      Last Name
                    </th>
                    <th>
                      Company
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Phone
                    </th>
                    <th>
                      Actions
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($employee as $emp)
                      <tr>
                        <td> {{ $emp->first_name}} </td>
                        <td> {{$emp->last_name}} </td>
                        <td> {{$emp->name}} </td>
                        <td> {{$emp->email}} </td>
                        <td> {{$emp->phone}} </td>
                        <td>
                          <a href="{{ url('/employee-edit', ['id' => $emp->id]) }}">
                            <button class="btn btn-warning btn-sm">
                              <span class="material-icons">edit</span>
                            </button>
                          </a>

                          <a href="{{ url('/employee-delete', ['id' => $emp->id]) }}">
                            <button class="btn btn-danger btn-sm">
                              <span class="material-icons">delete</span>
                            </button>
                          </a>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-12 d-flex justify-content-center">
                    {{$employee->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
