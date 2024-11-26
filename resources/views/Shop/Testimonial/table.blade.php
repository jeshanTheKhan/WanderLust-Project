@extends('layouts.shop.backend')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Responsive example<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Serial Number</th>
                          <th>Client Name</th>
                          <th>Place</th>
                          <th>Comment</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($sl=1)
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $data->client_name }}</td>
                            <td>{{ $data->client_location }}
                            </td>
                            <td>{{ Str::limit($data->client_comment, 100, '...') }}
                            </td>
                            <td>
                                @if($data->status == 1)
                                     <form action="{{ route('shop.testimonial.updatestatus', $data->testimonial_id ) }}" method="POST">
                                @csrf
                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn btn-success">Available</button>
                                    </form>
                                @else
                                    <form action="{{ route('shop.testimonial.updatestatus', $data->testimonial_id ) }}" method="POST">
                                @csrf
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn-danger">Unavailable</button>
                                    </form>
                             @endif  
                            </td>
                            <td>
                                <a href="{{ route('shop.testimonial.edit', $data->testimonial_id ) }}"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="{{ route('shop.testimonial.del', $data->testimonial_id ) }}"><i
                                    class="fa fa-trash"></i></a>
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


        </div>
    </div>
</div>
@endsection