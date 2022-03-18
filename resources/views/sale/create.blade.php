<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-shopping-cart"></i> Cart</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <form method="POST" ACTION="{{ route('stock.add.cart') }}" class="form-inline">
                @csrf
                <div class="form-group mb-2 col-lg-4">
                    <label for="item" class="form-control-plaintext">Select Product</label>
                    <select id="item" name="stock_id"
                            class="selectpicker form-control col-lg-12 @error('stock_id') is-invalid @enderror"
                            data-live-search="true">
                        @foreach($stocks_available as $stock)
                            <option value="{{ $stock->id }}"
                                    data-tokens="{{ $stock->medicine->medicine_code  }}">
                                {{ $stock->medicine->generic_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('stock_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2 col-lg-4">
                    <label for="staticEmail2" class="form-control-plaintext">  Quantity</label>
                    <input type="text" name="quantity"
                           class="form-control @error('quantity') is-invalid @enderror"
                           id="staticEmail2" >
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2 ml-4">
                    <label for="button_submit" class="form-control-plaintext"><samp>*</samp></label>
                    <button type="submit" class="btn btn-primary ">Add to Cart</button>
                </div>
            </form>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-6 cols-md-6 ">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Item Category</th>
                            <th>Price</th>
                            <th>Quantity Remained</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks_available as $stock)
                            <tr>
                                <td>{{ $stock->medicine->medicine_code }}</td>
                                <td>{{ $stock->medicine->generic_name }}</td>
                                <td>{{ \App\Models\MedicineCategory::find($stock->medicine->category_id)->name }}</td>
                                <td>{{ $stock->medicine->retail_price }}</td>
                                <td>{{ $stock->quantity_remained }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 cols-md-6">
                    <h2>
                        <strong>SLS-101-21</strong>
                        <small class="text-success">{{ date("F j, Y")}}</small>
                    </h2>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Generic Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub(Tsh)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_available as $cart)
                            <tr>
                                <td>{{ $cart->medicine->generic_name }}</td>
                                <td>{{ $cart->retail_price }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->total_price }}</td>
                                <td>
                                    <form method="POST"
                                          action="{{ route('cart.destroy', $cart) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger text-white"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>Tsh {{ $cart_available->sum('total_price') }}</th>
                            <th>
                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-sm btn-success text-white"
                                        data-toggle="modal" data-target="#confirm_cart">
                                    Confirm
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="confirm_cart" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <i class="fa fa-shopping-cart"></i>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="POST" action="{{ route('cart.confirm') }}">
                                @csrf
                                <button class="btn btn-success text-white">
                                    Confirm
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('scripts')
            <script type="text/javascript">
                $(function() {
                    $('.selectpicker').selectpicker();
                });
            </script>
        @endsection
</x-master>
