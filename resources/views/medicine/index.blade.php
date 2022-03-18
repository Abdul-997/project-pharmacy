<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-medkit"></i> Medicine </h3>
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
                            <h2>List of Medicines</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a href="{{ route('medicine.create') }}"
                                    class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-plus"></i>
                                    Add New Medicine
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Medicine Code</th>
                                    <th>Name</th>
                                    <th>Purchase Price</th>
                                    <th>Retail Price</th>
                                    <th>Quantity (Grams)</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->medicine_code }}</td>
                                        <td>{{ $medicine->generic_name }}</td>
                                        <td>{{ $medicine->purchase_price }}</td>
                                        <td>{{ $medicine->retail_price }}</td>
                                        <td>{{ $medicine->grams }}</td>
                                        <td>
                                            {{ \App\Models\MedicineCategory::find($medicine->category_id)->name }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-sm btn-info text-white"
                                                   data-toggle="modal"
                                                   data-target="#view-medicine">
                                                    <i class="fa fa-eye"></i>
                                                    details
                                                </a>
                                                <a href="{{ route('medicine.edit', $medicine->id) }}"
                                                   class="btn btn-sm btn-success text-white">
                                                    <i class="fa fa-edit"></i>
                                                    edit
                                                </a>
                                                <form method="POST" action="{{ route('medicine.destroy', $medicine->id) }}">
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
                            <!-- Modal -->
                            <div class="modal fade" id="view-medicine" tabindex="-1"
                                 role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle">Medicine Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" name="generic_name"
                                                           class="form-control has-feedback-left
                                                @error('generic_name') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Generic Name">
                                                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                                                    @error('generic_name')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" name="purchase_price"
                                                           class="form-control has-feedback-left
                                               @error('purchase_price') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Purchase Price">
                                                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                                    @error('purchase_price')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" name="retail_price"
                                                           class="form-control has-feedback-left
                                              @error('retail_price') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Retail Price">
                                                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                                    @error('retail_price')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" name="medicine_code"
                                                           class="form-control has-feedback-left
                                                @error('medicine_code') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Medicine Code">
                                                    <span class="fa fa-hourglass-o form-control-feedback left" aria-hidden="true"></span>
                                                    @error('medicine_code')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="text" name="grams"
                                                           class="form-control has-feedback-left
                                              @error('grams') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Grams">
                                                    <span class="fa fa-balance-scale form-control-feedback left" aria-hidden="true"></span>
                                                    @error('grams')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-4 col-sm-4">
                                                    <select name="category_id"
                                                            class="form-control @error('category') is-invalid @enderror">
                                                        <option value=""
                                                                selected>
                                                            </option>
{{--                                                        @foreach($categories as $category)--}}
{{--                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                                        @endforeach--}}
                                                    </select>
                                                    @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" name="medicine_name"
                                                           class="form-control has-feedback-left
                                              @error('medicine_name') is-invalid @enderror"
                                                           value=""
                                                           placeholder="Medicine Name">
                                                    <span class="fa fa-medkit form-control-feedback left" aria-hidden="true"></span>
                                                    @error('medicine_name')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <br><br><br>
                                                <div class="col-md-12 col-sm-12">
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Medicine Description"></textarea>
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                                <br><br><br>
                                                <br><br><br>

{{--                                                <div class="col-md-12 col-sm-12 ">--}}
{{--                                                    <a href="{{ route('medicine') }}">--}}
{{--                                                        <button class="btn btn-primary" type="button">Cancel</button>--}}
{{--                                                    </a>--}}
{{--                                                    <button type="submit" class="btn btn-success">Submit</button>--}}
{{--                                                </div>--}}
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
</x-master>
