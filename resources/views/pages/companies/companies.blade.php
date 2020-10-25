@extends('layouts.app', ['activePage' => 'companies', 'titlePage' => __('Companies')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <a href="/company-create"><button class="btn btn-primary">Register</button></a>

        </div>

        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Companies</h4>
            <p class="card-category">Registered Companies</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="container-fluid">
                <table class="table table-hover table-sm">
                  <thead class=" text-primary">
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Website
                    </th>
                    <th>
                      Actions
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($companies as $company)
                      <tr>
                        <td> {{$company->name}} </td>
                        <td> {{$company->email}} </td>
                        <td> {{$company->website}} </td>
                        <td>
                          <a href="{{ url('/company-edit', ['id' => $company->id]) }}">
                            <button class="btn btn-warning btn-sm">
                              <span class="material-icons">edit</span>
                            </button>
                          </a>

                          <a href="{{ url('/company-delete', ['id' => $company->id]) }}">
                            <button class="btn btn-danger btn-sm">
                              <span class="material-icons">delete</span>
                            </button>
                          </a>

                        </td>
                      </tr>
                    @endforeach
                    {{-- <button onclick="chamar()">aqui</button> --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
