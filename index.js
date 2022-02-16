$(document).ready(function(){
    $(".hov a").mouseenter(function () {
            $(".navbar-nav>li>.dropdown-menu").show();            
        }
    );
    $(".hov a").mouseleave(function () {
            $(".navbar-nav>li>.dropdown-menu").hide();            
        }
    );
})