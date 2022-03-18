<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-list-alt"></i> Medicine Category</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            @if(session('message-danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>! </strong> {{session('message-danger')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('message-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>! </strong> {{session('message-success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session('message-warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>! </strong> {{session('message-warning')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Medicine Category</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('category.create') }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-plus"></i> Add Category
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                   class="btn btn-sm btn-success text-white">
                                                    <i class="fa fa-edit"></i> edit
                                                </a>
                                                <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger text-white">
                                                        <i class="fa fa-trash"></i> delete
                                                    </button>
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
    @endsection
</x-master>
