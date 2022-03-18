<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Order Information</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-inline">
                    <div class="form-group mb-2 col-lg-4">
                        <label for="item" class="form-control-plaintext">Select Product</label>
                        <select id="item" class="form-control col-lg-12">
                            <option>Discount Type</option>
                            <option>fixed</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 col-lg-4">
                        <label for="staticEmail2" class="form-control-plaintext">  Quantity</label>
                        <input type="text" class="form-control"
                               id="staticEmail2" >
                    </div>
                    <div class="form-group mb-2 ml-4">
                        <label for="button_submit" class="form-control-plaintext"><samp>*</label>
                        <button type="submit" class="btn btn-primary ">Confirm identity</button>
                    </div>
                </form>
                <div class="clearfix"></div>
                <hr>
                <div class="col-md-3 col-sm-3  profile_left">
                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker"></i> San Francisco, California, USA
                        </li>

                        <li>
                            <i class="fa fa-phone"></i> +6399812765251
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> cashier@gmail.com
                        </li>
                        <li>
                            <i class="fa fa-globe"></i> pharmacare.com.ph
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Order Number <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="ORD-101-21">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Payment Type <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="Cash" readonly style="border:none">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 col-sm-12 ">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price <span class="required">($)</span></th>
                            <th>Discount Type</th>
                            <th>Discount</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <select class="form-control">
                                    <option>Select Med</option>
                                    <option>Medicine one</option>
                                    <option>Medicine two</option>
                                    <option>Medicine three</option>
                                    <option>Medicine four</option>
                                </select>
                            </td>
                            <td><input type="text" required="required" class="form-control" placeholder="Enter Qty"></td>
                            <td><input type="text" required="required" class="form-control" placeholder="Unit Price"></td>
                            <td></td>
                            <td><input type="text" required="required" class="form-control" placeholder="Discount Price"></td>
                            <td><input type="text" required="required" class="form-control" placeholder="0.00" readonly></td>
                        </tr>
                        </tbody>
                    </table>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="#" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                    </ul>
                    <ul class="nav navbar-left panel_toolbox">
                        <a href="#" class="btn btn-sm btn-success text-white"><i class="fa fa-plus"></i> Add More</a>
                    </ul><br><br><br>
                </div>
                <div class="col-md-3 col-sm-3  profile_left">
                </div>
                <div class="col-md-9 col-sm-9  profile_left">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Sub Total <span class="required">($)</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control"  readonly placeholder="0.00">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Discount <span class="required">($)</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="0.00" readonly style="border:none">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Tax <span class="required">($)</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Tax Amount <span class="required">($)</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="0.00" readonly style="border:none">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" >Grand Total <span class="required">($)</span>
                            </label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" required="required" class="form-control" placeholder="0.00" readonly style="border:none">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9  offset-md-3">
                                <button type="submit" class="btn btn-success">Submit Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
