@extends('layouts.Moderator.backend')
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
                        <h2>Default Example <small>Users</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                                    <div id="datatable_wrapper"
                                        class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                      
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable"
                                                    class="table table-striped table-bordered dataTable no-footer"
                                                    style="width: 100%;" role="grid"
                                                    aria-describedby="datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="datatable" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 193px;">Serial Number</th>

                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Position: activate to sort column ascending"
                                                                style="width: 298px;">Place Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Age: activate to sort column ascending"
                                                                style="width: 77px;">Posted</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Age: activate to sort column ascending"
                                                                style="width: 77px;">Date</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Age: activate to sort column ascending"
                                                                style="width: 77px;">Images</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Start date: activate to sort column ascending"
                                                                style="width: 140px;">Status</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Salary: activate to sort column ascending"
                                                                style="width: 116px;">Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @php($sl=1)
                                                        @foreach ($blog as $blog)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $sl++ }}</td>
                                                            <td class="sorting_1">{{ $blog->blog_header }}</td>
                                                            <td>{{ $blog->blog_posted }}</td>
                                                            <td>{{ $blog->blog_date }}</td>
                                                            <td>
                                                                <img class="img-responsive avatar-view" src="{{asset('storage/back/media/blog/'.$blog->blog_main_image)}}" style="width: 40%;height:auto;" alt="Avatar" title="Change the avatar">
                                                            </td>
                                                            <td>
                                                                @if($blog->blog_status == 1)
                                                                    <form action="{{ route('moderator.blog.updatestatus', $blog->blog_id  ) }}" method="POST">
                                                                @csrf
                                                                    <input type="hidden" name="status" value="0">
                                                                    <button type="submit" class="btn btn-success">Available</button>
                                                                </form>
                                                                @else
                                                                    <form action="{{ route('moderator.blog.updatestatus', $blog->blog_id  ) }}" method="POST">
                                                                    @csrf
                                                                        <input type="hidden" name="status" value="1">
                                                                        <button type="submit" class="btn btn-danger">Unavailable</button>
                                                                </form>
                                                                @endif      
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('moderator.blog.edit', $blog->blog_id  ) }}"><i
                                                                        class="fa fa-pencil"></i></a>
                                                                <a href="{{ route('moderator.blog.del', $blog->blog_id  ) }}"><i
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


        </div>
    </div>
</div>
@endsection