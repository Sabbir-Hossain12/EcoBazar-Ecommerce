
 // Shopping cart button increase and decrease 
  $(document).ready(function(){
    $(".bx-minus").on('click', function(){
        var $input = $(this).siblings('.quantity');
        var value = parseInt($input.val());
        if (value > 1) {
            $input.val(value - 1);
        }
    });

    $(".bx-plus").on('click', function(){
        var $input = $(this).siblings('.quantity');
        var value = parseInt($input.val());
        if (value < 10) {
            $input.val(value + 1);
        }
    });

});


// Header Responsive Menu
let hamBurger_icon = document.getElementById("hamBurger-icon");
let mobile_menu_close = document.querySelector(".mobile-menu-close");
let header_sidebar_overlay = document.querySelector(".header-sidebar-overlay");
let responsive_header_sidebar = document.querySelector(".responsive-header-sidebar");

    hamBurger_icon.addEventListener("click", function() {
        responsive_header_sidebar.classList.add("active_sideBar");
        header_sidebar_overlay.classList.add("active_sideBar");
    })

    mobile_menu_close.addEventListener("click", function() {
        responsive_header_sidebar.classList.remove("active_sideBar");
        header_sidebar_overlay.classList.remove("active_sideBar");
    })

    header_sidebar_overlay.addEventListener("click", function() {
        responsive_header_sidebar.classList.remove("active_sideBar");
        header_sidebar_overlay.classList.remove("active_sideBar");
    })
 
    // Toggle Account menu
    let accounts_menu = document.querySelector('.accounts-menu');
    let accounts_menu_list = document.querySelector('.accounts-menu-list');

    accounts_menu.addEventListener('click', function(){
        accounts_menu_list.classList.toggle('toggle');
    });


    // category-menu toggle
    let categories_menu = document.querySelector('.categories-menu');
    let all_categories_show = document.querySelector('.all-categories-show');

    categories_menu.addEventListener('click', function(){
        all_categories_show.classList.toggle('category_active');
    });


    // Cart sidebar Opening function
    let cart_sidebar_overlay = document.querySelector(".cart-sidebar-overlay"); 
    let shopping_cart = document.querySelector("#shopping-cart"); 
    let cart_sidebar = document.querySelector(".cart-sidebar"); 
    let cart_close = document.querySelector("#cart-close"); 

    shopping_cart.addEventListener('click', function(){
        cart_sidebar.classList.add('cart_active');
        cart_sidebar_overlay.classList.add('cart_active');
    });

    cart_sidebar_overlay.addEventListener('click', function(){
        cart_sidebar_overlay.classList.remove('cart_active');
        cart_sidebar.classList.remove('cart_active');
    });

    cart_close.addEventListener('click', function(){
        cart_sidebar.classList.remove('cart_active');
        cart_sidebar_overlay.classList.remove('cart_active');
    });


    // Responsive Header Tab Menu
    let tab_menu = document.querySelectorAll('.tab-menu ul li');
    let menu_content = document.querySelectorAll('.menu-content');

    tab_menu.forEach((menu, index) =>{
        menu.addEventListener('click', function(){
            menu.classList.add('active_menu');

            tab_menu.forEach((item, i) =>{
                if( index === i ){
                    item.classList.add('active_menu');
                }
                else{
                    item.classList.remove('active_menu'); 
                }
            })

            menu_content.forEach((content, i) =>{
                if( index === i ){
                    content.classList.add('active_menu');
                }
                else{
                    content.classList.remove('active_menu'); 
                }
            })
        });
    })

    // 
    let product_tab_menu = document.querySelectorAll(".product-tab-menu");
    let description_contents = document.querySelectorAll(".description-contents");

    product_tab_menu.forEach((items, index) =>{
        items.addEventListener("click", function(e) {
            description_contents[index].classList.add('active_desc');
            product_tab_menu[index].classList.add('active_desc');

            product_tab_menu.forEach((item, i) =>{
                if( index === i ){
                    description_contents[i].classList.add('active_desc');  
                    product_tab_menu[i].classList.add('active_desc');
                }
                else{
                    description_contents[i].classList.remove('active_desc');
                    product_tab_menu[i].classList.remove('active_desc');   
                }
            })
        })
    })



