
    // Popup-subscription Modal
    let subscription_popup_close = document.getElementById('subscription-popup-close');
    let main_popup_subscription = document.querySelector('.main-popup-subscription');
    let popup_overlay = document.querySelector('.popup-overlay');

    subscription_popup_close.addEventListener("click", function(){
    popup_overlay.classList.remove('active_popup');
    main_popup_subscription.classList.remove('active_popup');
    })

    // 5 second later, it will show the popup Subscription Form
    window.addEventListener("load", function() {
    setTimeout(function() {
        popup_overlay.classList.add('active_popup');
        main_popup_subscription.classList.add('active_popup');
    }, 8000); // 8 seconds
});