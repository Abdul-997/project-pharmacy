<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-list-alt"></i> Add Category</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Category Information</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="{{ route('category.store') }}"
                                  id="add-category" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                @csrf
                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <input type="text"
                                               name="name"
                                               class="form-control has-feedback-left
                                                         @error('name') is-invalid @enderror"
                                               placeholder="Category Name">
                                        <span class="fa fa-medkit form-control-feedback left"
                                              aria-hidden="true"></span>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <input type="text"
                                               name="description"
                                               class="form-control has-feedback-left
                                                       @error('description') is-invalid @enderror"
                                               placeholder="Category Description">
                                        <span class="fa fa-map form-control-feedback left"
                                              aria-hidden="true"></span>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 offset-md-2">
                                        <a href="{{ route('medicine.category') }}">
                                            <button class="btn btn-primary" type="button">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
</x-master>
