<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-medkit"></i> Medicine</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Medicine Information</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" action="{{ route('medicine.store') }}"
                          id="medicine-create" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <input type="text" name="generic_name"
                                       class="form-control has-feedback-left
                                                @error('generic_name') is-invalid @enderror"
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
                                    <option value="" selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
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

                            <div class="col-md-12 col-sm-12 ">
                                <a href="{{ route('medicine') }}">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-master>
