var nav = $("#topNav");

//add indicators and hovers to submenu parents
nav.find("li").each(function() {
    if ($(this).find("ul").length > 0) {

        $("<span>").text("^").appendTo($(this).children(":first"));

        //show subnav on hover
        $(this).click(function() {
            $(this).find("ul").stop(true, true).slideToggle();
        });
    }
});