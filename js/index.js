var saleIndex = 1;
var timer = 5000; /* Время анимации */
function shopRotator() {
    $(".shop").hide();
    $(".shop" + saleIndex).show();
    $(".sale_hr").animate({width: "90%"}, timer-500);
    $(".sale_hr").animate({opacity: "0" }, 300);
    $(".sale_hr").animate({width: "0" }, 1);
    $(".sale_hr").css({"opacity":"1"});
    var shopCount = 3; /* Кол-во баннеров акции */
    saleIndex++;
    if(saleIndex > shopCount) {
        saleIndex = 1;
    }
}

$(document).ready(function() {
    shopRotator();
    setInterval(shopRotator, timer);
});