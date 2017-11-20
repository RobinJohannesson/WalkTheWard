$(document).ready(function(){
    var starsAmount = 3;
    $("button").click(function(){
        $(this).hide();
        console.log(this.className);
        console.log($(this).attr('class').split(' ')[1]);
        if ($(this).attr('class').split(' ')[1] == "correct-answer"){
            console.log("smartass");
            $("button").off("click");
        };

        if ($(this).attr('class').split(' ')[1] != "correct-answer"){
            console.log("It's wrong dude");
            starsAmount = starsAmount - 1;
            console.log(starsAmount);
        };
    });
});
