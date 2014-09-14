$(document).ready(function(){
	$(".datainfo").on("click", function(e){
 	 e.preventDefault();
        var temp=false;
		var dataset = $(this);
		var savebtn = $(this).nextAll("a");
		var theid   = dataset.attr("id");
		var newid   = theid+"-form";
		var currval = dataset.text();
        if($('#'+newid).attr("value")){}
        else{ 
         sessionStorage.setItem('price', currval);
		dataset.empty();
		$('<input type="text" name="new" id="'+newid+'"  value="'+currval+'" class="hlite">').appendTo(dataset)
		savebtn.css("display", "block");
        }
	});
	$(".savebtn").on("click", function(e){
		e.preventDefault();
		var dataset = $(this).prev(".datainfo");
		var newid   = dataset.attr("id");
		
		var cinput  = "#"+newid+"-form";
		var einput  = $(cinput);
		var newval  = einput.attr("value");
		
        $.ajax({
                  type: "POST",
                  url: "/price/update",
                  data: "price="+newval+"&id="+newid,
                  success: function(val){
                    alert(val)
                  }
                });
        
		$(this).css("display", "none");
        $(this).next("a").css("display", "none");
		einput.remove();
		dataset.html(newval);
		
	});
    $(".cancelbtn").on("click", function(e){
		e.preventDefault();
		var dataset = $(this).prevAll(".datainfo");
		var newid   = dataset.attr("id");
		
		var cinput  = "#"+newid+"-form";
		var einput  = $(cinput);
		var newval  = einput.attr("value");
		
		$(this).css("display", "none");
        $(this).prev("a").css("display", "none");
		einput.remove();
        var price=sessionStorage.getItem('price');
		dataset.html(price);
		
	});
});