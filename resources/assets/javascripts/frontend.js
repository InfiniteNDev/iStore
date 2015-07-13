
var iStoreFront = angular.module('iStoreFront', []);

/*=================================
=            cart form            =
=================================*/
iStoreFront.controller('cartController', function ($scope, $http) {

  // get all cart items
  $scope.cart = {
    items:[]
  };
  $http.get("cart/all").success(function(items) {
    $scope.cart.items = items;
  });

  // get total price
  $scope.total = function() {
    var total = 0;
    angular.forEach($scope.cart.items, function(item) {
      total += item.qty * item.price;
    })

    return total;
  }

  $scope.update = function(item) {
    var req = {
     method: 'POST',
     url: 'cart/update',
     data: item
   }
   $http(req);
 }

}).config(function($interpolateProvider) {
  // To prevent the conflict of `{{` and `}}` symbols
  // between Blade template engine and AngularJS templating we need
  // to use different symbols for AngularJS.

  // $interpolateProvider.startSymbol('<%=');
  // $interpolateProvider.endSymbol('%>');
});


/*-----  End of cart form  ------*/

