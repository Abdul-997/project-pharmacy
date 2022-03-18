<x-master>
    @section('content')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-check-square-o"></i>Stock</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Stock Information</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="{{ route('stock.update', $stock) }}"
                                id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">
                                        <strong><i class="fa fa-sitemap"></i> Item Information</strong>
                                    </label>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Name:</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <select name="medicine_id" required
                                                class="form-control @error('medicine_id') is-invalid @enderror" >
                                            <option value="{{ $stock->medicine_id }}" selected>
                                                {{ $stock->medicine->generic_name }}
                                            </option>
                                            @foreach($medicines as $medicine)
                                                <option value="{{ $medicine->id }}">
                                                    {{ $medicine->generic_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('medicine_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input value="{{ $stock->quantity  }}"
                                               name="quantity" required
                                               class="form-control @error('quantity') is-invalid @enderror"
                                               type="text" placeholder="00">
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">
                                        <strong><i class="fa fa-shopping-cart"></i> Production Information</strong>
                                    </label>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" >
                                         <span class="required">Manufactured - Expiring *</span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 ">
                                        <input value="{{ $stock->manu_date }}"
                                               id="manufactured" name="manu_date"
                                               class="date-picker form-control @error('manu_date') is-invalid @enderror"
                                               placeholder="Date Manufactured"
                                               type="text" required="required" type="text"
                                               onfocus="this.type='date'" onmouseover="this.type='date'"
                                               onclick="this.type='date'" onblur="this.type='text'"
                                               onmouseout="timeFunctionLong(this)">
                                        @error('manu_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                            $('#manufactured').datepicker({
                                                format: "yyyy-mm-dd",
                                                weekStart: 0,
                                                calendarWeeks: true,
                                                autoclose: true,
                                                todayHighlight: true,
                                                orientation: "auto"
                                            });
                                        </script>
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <input value="{{ $stock->exp_date }}"
                                               id="expired" name="exp_date"
                                               class="date-picker form-control @error('exp_date') is-invalid @enderror"
                                               placeholder="Expiring date"
                                               type="text" required="required" type="text"
                                               onfocus="this.type='date'" onmouseover="this.type='date'"
                                               onclick="this.type='date'" onblur="this.type='text'"
                                               onmouseout="timeFunctionLong(this)">
                                        @error('exp_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                            $('#expired').datepicker({
                                                format: "yyyy-mm-dd",
                                                weekStart: 0,
                                                calendarWeeks: true,
                                                autoclose: true,
                                                todayHighlight: true,
                                                orientation: "auto"
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" >
                                        <span class="required">Purchased *</span>
                                    </label>

                                    <div class="col-md-4 col-sm-4 ">
                                        <input value="{{ $stock->pur_date }}"
                                               id="purchased" name="pur_date"
                                               class="date-picker form-control @error('pur_date') is-invalid @enderror"
                                               placeholder="Purchased date"
                                               type="text" required="required" type="text"
                                               onfocus="this.type='date'" onmouseover="this.type='date'"
                                               onclick="this.type='date'" onblur="this.type='text'"
                                               onmouseout="timeFunctionLong(this)">
                                        @error('pur_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                            $('#purchased').datepicker({
                                                format: "yyyy-mm-dd",
                                                weekStart: 0,
                                                calendarWeeks: true,
                                                autoclose: true,
                                                todayHighlight: true,
                                                orientation: "auto"
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a href="{{ route('stock') }}">
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
