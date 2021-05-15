<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Manage Products</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Products Details
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Column selectors with Export Options and print table -->
        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">POS Invoice</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Stock</th>
                                                    <th>Price</th>
                                                    <th>Qty <span class="text-danger">*</span></th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th>
                                                        <button type="button" class="btn btn-primary btn-sm" id="add-more"><i class="fa fa-plus-circle"></i></button>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <form id="add_pos_invoice_form" action="" method="post">
                                                    <tbody id="fields">
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2" name="product_id[]" id="product_id">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="stock[]" id="stock">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="price[]" id="price">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" onkeyup="total()" onkeydown="total()" name="quantity[]" id="quantity">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="discount[]" id="discount">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="total_price[]" readonly id="total_price">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-danger btn-sm" id="remove-btn"><i class="fa fa-minus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead class="bg-accent-1">
                                                <tr>
                                                    <th>Total: 0.00</th>
                                                </tr>
                                                </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            ...................
                                                        </td>
                                                    </tr>
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
        </section>
        <!-- Column selectors with Export Options and print table -->

    </div>
</div>
