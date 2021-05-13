<!-- Modal -->
<div class="modal fade text-left" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control round" name="product_name" id="product_name" placeholder="Enter Product Name">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control round" name="brand" id="brand" placeholder="Enter Brand">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="cost_price">Cost Price</label>
                                <input type="text" class="form-control round" name="cost_price" id="cost_price" placeholder="Enter Selling Price">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input type="text" class="form-control round" name="selling_price" id="selling_price" placeholder="Enter Selling Price">
                            </fieldset>
                        </div>
                        <div class="col-xl-3 col-md-3 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="quantity">Quantity</label>
                                <div class="input-group">
                                    <input type="number" name="quantity" id="quantity" class="touchspin form-control" value="0">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-9 col-md-9 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control round" name="description" id="description" cols="1" placeholder="Description"></textarea>
                                <div class="ml-2" id="count_words"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer pull-left">
                        <button type="submit" data-loading-text="Processing" id="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
