$jq =jQuery.noConflict();
 
$jq(document).ready(function() {
 
    $jq(“#main-container”).calendar({
        tipsy_gravity: ‘s’, // How do you want to anchor the tipsy notification?
        post_dates : [“1″,”2”],
        click_callback: calendar_callback, // Callback to return the clicked date
        year: “2012”, // Optional, defaults to current year – pass in a year – Integer or String
        scroll_to_date: false // Scroll to the current date?
    });
 
    $jq(“.pop_cls”).on(“click”,function() {
        $jq(“#popup_events”).fadeOut(“slow”);
    });
});