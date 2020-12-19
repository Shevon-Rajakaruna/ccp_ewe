@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <section class="content">
    <h1>All Faculties</h1>
    <div class="container-fluid">
    
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- <div class="card-title">                       
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div> -->
                              
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <!-- <th>Faculty ID</th> -->
                      <th>Name</th>
                      <th>Description</th>
                      <th>Action</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($faculty as $tt)  
                    <tr border="none">  
                      <!-- <td>{{$tt->id}}</td>   -->
                      <td>{{$tt->name}}</td> 
                      <td>{{$tt->desp}}</td>   
                      <td>
                        <div class="btn-group">
                          <form action="{{ route('faculty.edit', [$tt->id])}}" method="GET">  
                            @csrf  
                             
                            <button class="btn btn-warning" type="submit">Edit</button>  
                          </form>

                          <form action="{{ route('faculty.delete', $tt->id)}}" method="post">  
                            @csrf  
                           <!-- // @method('DELETE')  -->
                            <button class="btn btn-danger" type="submit">Delete</button>  
                          </form>
                        </div>
                      </td>  
              
                    </tr>  
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <h1>All Departments</h1>
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- <div class="card-title">                       
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div> -->
                                
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <!-- <th>Department ID</th> -->
                        <th>Name</th>
                        <th>Faculty</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($departments as $tt)  
                      <tr border="none">  
                        <!-- <td>{{$tt->id}}</td>   -->
                        <td>{{$tt->desp}}</td> 
                        <td>{{$tt->name}}</td> <!-- this is faculty name --> 
                        <td>
                          <div class="btn-group">
                            <form action="{{ route('department.edit', [$tt->id])}}" method="GET">  
                              @csrf  
                               
                              <button class="btn btn-warning" type="submit">Edit</button>  
                            </form>

                            <form action="{{ route('department.delete', $tt->id)}}" method="post">  
                              @csrf  
                             <!-- // @method('DELETE')  -->
                              <button class="btn btn-danger" type="submit">Delete</button>  
                            </form>
                          </div>
                        </td>  
                
                      </tr>  
                      @endforeach  
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<style type="text/css">
h1 {
  color: #ffffff;
  background-color: #6500F9;
}
</style>


@endsection