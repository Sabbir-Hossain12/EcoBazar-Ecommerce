    // product filter sidebar mobile menu
    let mobile_filter_btn = document.getElementById("mobile-filter-btn");
    let responsive_filter_sidebar = document.getElementById("responsive-filter-sidebar");
    let product_filter_left_sidebar = document.querySelector(".product-filter-left-sidebar");
    let product_filter_left_sidebar_overlay = document.querySelector(".product-filter-left-sidebar-overlay");

    mobile_filter_btn.addEventListener("click", function(){
        product_filter_left_sidebar.classList.add('mobile-filter-sidebar');
        product_filter_left_sidebar_overlay.classList.add('mobile-filter-sidebar');
    })

    responsive_filter_sidebar.addEventListener("click", function(){
        product_filter_left_sidebar.classList.remove('mobile-filter-sidebar');
        product_filter_left_sidebar_overlay.classList.remove('mobile-filter-sidebar');
    })

    product_filter_left_sidebar_overlay.addEventListener("click", function(){
        product_filter_left_sidebar.classList.remove('mobile-filter-sidebar');
        product_filter_left_sidebar_overlay.classList.remove('mobile-filter-sidebar');
    })