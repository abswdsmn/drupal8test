//(function($) {
//    Drupal.behaviors.myBehavior = {
//      attach: function (context, settings) {	
//    $(window).one("load",function() {

$(window).load(function() {
		
      var a=$(".slider").attr("data-settings");
      var b=JSON.parse(a);
      $('.slider').gridSlide(b);
//      $('.slider').gridSlide({
//			menu: 'grid',
//			imgGrid: true,
//			title: true,
//			speed: 100
//        });
	});
