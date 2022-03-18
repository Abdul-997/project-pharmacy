<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-shopping-cart"></i> Sales</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <strong>SLS-101-21</strong>
                                <small class="text-success">{{ date("F j, Y")}}</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('sale.create') }}"
                                    class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-plus"></i>
                                    Add Sales
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>item Code</th>
                                    <th>Medicine Name</th>
                                    <th>Grams</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->medicine->medicine_code }}</td>
                                        <td>{{ $sale->medicine->generic_name }}</td>
                                        <td>{{ $sale->medicine->grams }}</td>
                                        <td>
                                            {{ \App\Models\MedicineCategory::find($sale->medicine->category_id)->name }}
                                        </td>
                                        <td>{{ $sale->retail_price }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{ $sale->total_price }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
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
