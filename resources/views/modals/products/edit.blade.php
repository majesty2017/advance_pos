<!-- Modal -->
<div class="modal fade text-left" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="editProductForm" method="post" enctype="multipart/form-data">

                    @method('put')

                    @csrf

                    <input type="hidden" name="id" id="e_id">

                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control round" name="product_name" id="e_product_name" placeholder="Enter Product Name">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control round" name="brand" id="e_brand" placeholder="Enter Brand">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="cost_price">Cost Price</label>
                                <input type="text" class="form-control round" onkeyup="profit()" onkeydown="profit()" name="cost_price" id="e_cost_price" placeholder="Enter Selling Price">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input type="text" class="form-control round" onkeyup="profit()" onkeydown="profit()" name="selling_price" id="e_selling_price" placeholder="Enter Selling Price">
                            </fieldset>
                            <div id="e_profit"></div>
                        </div>
                        <div class="col-xl-6 col-md-6  col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="quantity">Quantity</label>
                                <div class="input-group">
                                    <input type="number" name="quantity" id="e_quantity" class="touchspin form-control" value="0">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="quantity">Alert Stock</label>
                                <div class="input-group">
                                    <input type="number" name="stock" id="e_alert_stock" class="touchspin form-control" value="0">
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                            <fieldset class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control round" name="description" id="e_description" cols="1" placeholder="Description"></textarea>
                                <div class="ml-2" id="e_count_words"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer pull-left">
                        <button type="submit" data-loading-text="Processing" id="save-changes" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
