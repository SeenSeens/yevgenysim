jQuery(document).ready(function($) {
    $(".owl-carousel").owlCarousel({
        loop: true, // Vòng lặp vô hạn
        responsive: {
            0: {
                items: 1 // Số lượng slide hiển thị trên màn hình nhỏ hơn
            },
            768: {
                items: 2 // Số lượng slide hiển thị trên màn hình vừa
            },
            992: {
                items: 4 // Số lượng slide hiển thị trên màn hình lớn hơn
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"], // Thêm nút Pre và Next
        rewind: true // Cho phép tua lại slide sau khi đến slide cuối cùng
    });
});

