<!DOCTYPE html>
<html lang="es" ng-app="productRecords">
<head>
    <title>Test Takum</title>

    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h2>Products Database</h2>
            <div  ng-controller="ProductController">

                <!-- Table-to-load-the-data Part -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Language</th>
                            <th>Category</th>
                            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Products</button></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="product in products">
                                <td>{{ product.name }}</td>
                                <td>{{ product.language }}</td>
                                <td>{{ product.category }}</td>
                                <td>
                                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', product._id)">Edit</button>
                                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(product._id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End of Table-to-load-the-data Part -->
                <!-- Modal (Pop up when detail button clicked) -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                            </div>
                            <div class="modal-body">
                                <form name="formProduct" novalidate="">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group error">
                                                <label for="name">Name:</label>
                                                <input type="text" class="form-control" name="name" id="name" ng-model="product.name" ng-required="true" value="{{name}}">
                                                <span class="help-inline" ng-show="formProduct.name.$invalid && formProduct.name.$touched">Name field is required</span>
                                            </div>
                                            <div class="form-group error">
                                                <label for="language">Language:</label>
                                                <input type="text" class="form-control" name="language" id="language" ng-model="product.language" ng-required="true" value="{{name}}">
                                                <span class="help-inline" ng-show="formProduct.language.$invalid && formProduct.language.$touched">Language field is required</span>
                                            </div>
                                            <div class="form-group error">
                                                <label for="category">Category:</label>
                                                <input type="text" class="form-control" name="category" id="category" ng-model="product.category" ng-required="true" value="{{name}}">
                                                <span class="help-inline" ng-show="formProduct.category.$invalid && formProduct.category.$touched">Category field is required</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formProduct.$invalid">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controller/product.js') ?>"></script>
</body>
</html>