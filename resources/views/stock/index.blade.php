<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-check-square-o"></i>Stock</h3>
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
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('stock.create') }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-plus"></i>
                                    Add New Stock
                                </a>
                            </ul>
                            <!-- Nav tabs -->
                            <ul class="nav nav-sm" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#available-tab" role="tab"
                                       class="btn btn-sm active-btn"
                                       data-toggle="tab">
                                        <i class="fa fa-file"></i>
                                        Available
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#expired-tab"
                                       class="btn btn-sm "
                                       role="tab" data-toggle="tab">
                                        <i class="fa fa-trash-o"></i>
                                        Expired
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#finished-tab"
                                       class="btn btn-sm "
                                       role="tab" data-toggle="tab">
                                        <i class="fa fa-trash-o"></i>
                                        Finished
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="available-tab">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>
                                                Quantity
                                                <sup><span class="badge bg-green">Remained</span>
                                                </sup>
                                            </th>
                                            <th>Purchased</th>
                                            <th>Manufactured</th>
                                            <th>Expired</th>
                                            <th>StockStatus</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stocks_available as $stock)
                                            <tr>
                                                <td>{{ $stock->medicine->generic_name }}</td>
                                                <td>
                                                    {{ $stock->quantity }}
                                                    <sup>
                                                        <span class="badge bg-green">
                                                        {{ $stock->quantity_remained }}
                                                    </span>
                                                    </sup>
                                                </td>
                                                <td>
                                                    {{\Illuminate\Support\Carbon::parse($stock->pur_date)->diffForhumans() }}
                                                </td>
                                                <td>{{ $stock->manu_date }}</td>
                                                <td>{{ \Carbon\Carbon::parse($stock->exp_date)->diffForHumans() }}</td>

                                                <td>
                                                    @if($stock->status == 0 )
                                                        <span class="badge badge-pill badge-dark text-white">
                                                            Inactive
                                                        </span>
                                                    @elseif($stock->status== 1)
                                                        <span class="badge badge-pill badge-secondary text-white">
                                                            Active
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        @if($stock->status == 0 )
                                                            <form method="POST"
                                                                  action="{{ route('stock.activate', $stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button
                                                                    type="submit" class="btn btn-sm btn-info"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Activate">
                                                                    <i class="fa fa-lock"></i>
                                                                </button>
                                                            </form>
                                                        @elseif($stock->status== 1)
                                                            <form method="POST"
                                                                  action="{{ route('stock.deactivate',$stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button  type="submit" class="btn btn-sm btn-info"
                                                                         data-toggle="tooltip" data-placement="top"
                                                                        title="Deactivate">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        <a href="{{ route('stock.edit', $stock) }}"
                                                           class="btn btn-sm btn-success text-white"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                            <form method="POST"
                                                                  action="{{ route('stock.destroy', $stock) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-sm btn-danger text-white"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="expired-tab">
                                    <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>
                                                Quantity
                                                <sup><span class="badge bg-green">Remained</span>
                                                </sup>
                                            </th>
                                            <th>Purchased</th>
                                            <th>Manufactured</th>
                                            <th>Expired</th>
                                            <th>StockStatus</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stocks_expired as $stock)
                                            <tr>
                                                <td>{{ $stock->medicine->generic_name }}</td>
                                                <td>
                                                    {{ $stock->quantity }}
                                                    <sup>
                                                        <span class="badge bg-green">
                                                        {{ $stock->quantity_remained }}
                                                    </span>
                                                    </sup>
                                                </td>
                                                <td>
                                                    {{\Illuminate\Support\Carbon::parse($stock->pur_date)->diffForhumans() }}
                                                </td>
                                                <td>{{ $stock->manu_date }}</td>
                                                <td>{{ \Carbon\Carbon::parse($stock->exp_date)->diffForHumans() }}</td>

                                                <td>
                                                    @if($stock->status == 0 )
                                                        <span class="badge badge-pill badge-dark text-white">
                                                            Inactive
                                                        </span>
                                                    @elseif($stock->status== 1)
                                                        <span class="badge badge-pill badge-secondary text-white">
                                                            Active
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        @if($stock->status == 0 )
                                                            <form method="POST"
                                                                  action="{{ route('stock.activate', $stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button
                                                                    type="submit" class="btn btn-sm btn-info"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Activate">
                                                                    <i class="fa fa-lock"></i>
                                                                </button>
                                                            </form>
                                                        @elseif($stock->status== 1)
                                                            <form method="POST"
                                                                  action="{{ route('stock.deactivate',$stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button  type="submit" class="btn btn-sm btn-info"
                                                                         data-toggle="tooltip" data-placement="top"
                                                                         title="Deactivate">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        <a href="{{ route('stock.edit', $stock) }}"
                                                           class="btn btn-sm btn-success text-white"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form method="POST"
                                                              action="{{ route('stock.destroy', $stock) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-danger text-white"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="finished-tab">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>
                                                Quantity
                                                <sup><span class="badge bg-green">Remained</span>
                                                </sup>
                                            </th>
                                            <th>Purchased</th>
                                            <th>Manufactured</th>
                                            <th>Expired</th>
                                            <th>StockStatus</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stocks_finished as $stock)
                                            <tr>
                                                <td>{{ $stock->medicine->generic_name }}</td>
                                                <td>
                                                    {{ $stock->quantity }}
                                                    <sup>
                                                        <span class="badge bg-green">
                                                        {{ $stock->quantity_remained }}
                                                    </span>
                                                    </sup>
                                                </td>
                                                <td>
                                                    {{\Illuminate\Support\Carbon::parse($stock->pur_date)->diffForhumans() }}
                                                </td>
                                                <td>{{ $stock->manu_date }}</td>
                                                <td>{{ \Carbon\Carbon::parse($stock->exp_date)->diffForHumans() }}</td>

                                                <td>
                                                    @if($stock->status == 0 )
                                                        <span class="badge badge-pill badge-dark text-white">
                                                            Inactive
                                                        </span>
                                                    @elseif($stock->status== 1)
                                                        <span class="badge badge-pill badge-secondary text-white">
                                                            Active
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        @if($stock->status == 0 )
                                                            <form method="POST"
                                                                  action="{{ route('stock.activate', $stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button
                                                                    type="submit" class="btn btn-sm btn-info"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Activate">
                                                                    <i class="fa fa-lock"></i>
                                                                </button>
                                                            </form>
                                                        @elseif($stock->status== 1)
                                                            <form method="POST"
                                                                  action="{{ route('stock.deactivate',$stock) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button  type="submit" class="btn btn-sm btn-info"
                                                                         data-toggle="tooltip" data-placement="top"
                                                                         title="Deactivate">
                                                                    <i class="fa fa-check"></i>
                                                                </button>
                                                            </form>

                                                        @endif
                                                        <a href="{{ route('stock.edit', $stock) }}"
                                                           class="btn btn-sm btn-success text-white"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form method="POST"
                                                              action="{{ route('stock.destroy', $stock) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-danger text-white"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete">
                                                                <i class="fa fa-trash"></i>
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
            </div>

        </div>
    @endsection
</x-master>
