jQuery(document).ready(function($){
$(".like_ico").click(function(){
var pathToMyPage = window.location.pathname;
$.cookie("post-like-count", "1", { expires:1, path: pathToMyPage }); 
heart = $(this);
post_id = heart.data("post_id");
$.ajax({
type: "post",
url: ajax_var.url,
data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
success: function(count){
if(count != "already"){
heart.addClass("voted");
$(".count").text(count);
$('.post-like').hide();
$('.nopost-like').show();
}
}
});
return false;
});
 
if ( $.cookie("post-like-count") == null){
    $('.post-like').show();
    $('.nopost-like').hide();
}else{
    $('.post-like').hide();
    $('.nopost-like').show();
}
 
 
});
jQuery.cookie=function(name,value,options){if(typeof value!='undefined'){options=options||{};if(value===null){value='';options.expires=-1}var expires='';if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){var date;if(typeof options.expires=='number'){date=new Date();date.setTime(date.getTime()+(options.expires*24*60*60*1000))}else{date=options.expires}expires='; expires='+date.toUTCString()}var path=options.path?'; path='+(options.path):'';var domain=options.domain?'; domain='+(options.domain):'';var secure=options.secure?'; secure':'';document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('')}else{var cookieValue=null;if(document.cookie&&document.cookie!=''){var cookies=document.cookie.split(';');for(var i=0;i<cookies.length;i++){var cookie=jQuery.trim(cookies[i]);if(cookie.substring(0,name.length+1)==(name+'=')){cookieValue=decodeURIComponent(cookie.substring(name.length+1));break}}}return cookieValue}};