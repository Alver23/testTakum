/**
 * Created by agrisales on 19/01/17.
 */

app.controller('ProductController', function($scope, $http, API_URL) {
  //retrieve products listing from API
  $http.get(API_URL + "products")
    .then(function(response) {
      $scope.products = response.data.products
    });

  //show modal form
  $scope.toggle = function(modalstate, id) {
    $scope.modalstate = modalstate

    switch (modalstate) {
      case 'add':
        $scope.form_title = "Add New Product"
        break
      case 'edit':
        $scope.form_title = "Product Detail"
        $scope.id = id
        $http.get(API_URL + 'products/' + id.$oid + '/edit')
          .then(function(response) {
            console.log(response)
            $scope.product = response.data
          });
        break;
      default:
        break;
    }
    console.log(id);
    $('#myModal').modal('show');
  }
  //save new record / update existing record
  $scope.save = function(modalstate, id) {
    var url = API_URL + "products"
    var method = 'POST';

    //append product id to the URL if the form is in edit mode
    if (modalstate === 'edit'){
      url += "/update"
    }
    console.log($scope.product)
    $http({
      method: method,
      url: url,
      data: $.param($scope.product),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(function(response) {
      console.log(response)
      location.reload()
    })
  }

  $scope.confirmDelete = function(id) {
    console.log(id)
    var isConfirmDelete = confirm('Are you sure you want this record?');
    if (isConfirmDelete) {
      $http({
        method: 'DELETE',
        url: API_URL + 'products/' + id.$oid
      }).
      then(function(data) {
        console.log(data)
        location.reload()
      })
    } else {
      return false
    }
  }
});
