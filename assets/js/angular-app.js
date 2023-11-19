const appFiler = angular.module('appFiler', []);

appFiler.controller('myCtrlFilter', ($scope, $location, $http) => {
    $scope.colors = [
        '#1f1f1f',
        '#f9f9f9',
        '#3b86ff',
        '#ff6f61',
        '#795548',
        '#bababa',
        '#17a2b8',
        '#e83e8c',
    ];

    // Khởi tạo selectedColors là một đối tượng trống
    $scope.selectedColors = {};

    // Đọc màu đã chọn từ URL
    var params = $location.search();
    if (params.filter_color) {
        var selectedColors = params.filter_color.split(',');
        selectedColors.forEach(function (color) {
            $scope.selectedColors[color] = true;
        });
    }

    // Xử lý sự kiện khi checkbox thay đổi
    $scope.filterProducts = function () {
        var selectedColors = Object.keys($scope.selectedColors).filter(function (color) {
            return $scope.selectedColors[color];
        });

        // Cập nhật URL với các màu đã chọn
        $location.search('filter_color', selectedColors.join(','));

        // Trigger AJAX request to update product list based on selected colors
        // (You'll need to implement the server-side logic for this)
    };

    /**
     * Chức năng filter danh mục sản phẩm
     */
    $http.get('/wp-json/wc/v3/products/categories')
        .then(function(response) {
            $scope.categories = response.data;
        })
        .catch(function(error) {
            console.error('Error fetching categories:', error);
        });
});
