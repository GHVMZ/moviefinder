<footer>
<div class="spacefoot">
<strong>Copyright © Movie Finder 2014</strong><br />
All rights reserved to their respective owners.
<a class="topbtn"href="#topmenu">Back to the top</a>
</div>
</footer>
<script type="text/javascript">
$(document).ready(function(e){

   $('#dropdown').on('click',function(){

      $('.dropdownwrap').fadeToggle("slow", "linear");
		event.preventDefault();
   });

})
</script>

<!--Script found at http://stackoverflow.com/a/12714767-->
<script type="text/javascript">
   $(".topbtn").click(function(event){
         event.preventDefault();
         //calculate destination place
         var dest=0;
         if($(this.hash).offset().top > $(document).height()-$(window).height()){
              dest=$(document).height()-$(window).height();
         }else{
              dest=$(this.hash).offset().top;
         }
         //go to destination
         $('html,body').animate({scrollTop:dest}, 1500,'swing');
     });
</script>

<!--Script found at http://jqueryfordesigners.com/slidedown-animation-jump-revisited/ -->
<script type="text/javascript">
	$(document).ready(function() {
		  $('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');					
 
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Show more info');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Hide');
			  }
			});
		  });
 
		});
</script>
<!--<script src="js/sticky.js" ></script>-->
</html>