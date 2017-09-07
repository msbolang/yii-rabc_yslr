/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 
 * @type window.location.pathname|DOMString 则栏定位
 */
var pathname = window.location.pathname;
$("li a").each(function() {
var href = $(this).attr("href");
if(pathname == href){
$(this).parents("ul").parent("li").addClass("active");
$(this).parent("li").addClass("active");
}
});

