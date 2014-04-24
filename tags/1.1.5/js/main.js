/**
 * Main JavaScript File
 * @author Codeinwp - http://www.codeinwp.com
 */

jQuery(document).ready(function($){

	// Review Pie Charts
	var initPieChart = function() {

	        returnColor = function(percent) {
				var c1 = "#ff7f66"; // salmon
				var c2 = "#ffce55"; // yellow
				var c3 = "#50c1e9"; // blue
				var c4 = "#8dc153"; // green

	        // Sets color based on value
	                if (percent > 0 && percent <= 25) {
	                    return c1;
	                } else if (percent > 25 && percent <= 50) {
	                    return c2;
	                } else if (percent > 50 && percent <= 75) {
	                    return c3;
	                } else if (percent > 75) {
	                    return c4;
	                }
	        }

	$('.percentage').easyPieChart({
	    barColor: function(percent) {
	        return returnColor(percent);
	    },
	    trackColor: '#ebebeb',
	    scaleColor: false,
	    lineCap: 'butt',
	    rotate: 0,
	    lineWidth: 15,
	    animate: 1,
	    onStep: function(value) {
	    	var c = returnColor(value);
	    	// Sets the value inside empty span
	        this.$el.find('span').text(~~value/10);
	        this.$el.find('span').css({color: c});
	    }
	});
		};

	/**
	 * Main Menu Arrow Script (In case of submenu)
	 */
	$(".main-menu ul li ul").addClass("sub-menu");
	$(".main-menu ul li ul.sub-menu").each(function(){
		var $this = $(this);
		if($this.children().length > 0) {
			$this.parent().children("a").append("<i class='icon-caret-down'></i>");
		}
	});

	/**
	 *  Main Menu DropDown Slide Down on Hover
	 */
	// Changing the caret down icon.
	$(".main-menu ul li:has(ul)").hover(function(){
		$(this).children("a").css("background", "url('../images/mm-submenu-hover.png') no-repeat bottom center");
	}, function(){
		$(this).children("a").css("background", "none");	
	});

	// Sliding the submenu.
	$('.main-menu ul').superfish();

	// Initiates the pie script.
	initPieChart();

	// Initiate the main page carousel.
	$("#carousel").cycle();

	// Article Tabbed Content Script 
	$('.tabbed-content .tc-menu li a:not(:first)').addClass('inactive'); 
	$('.tabbed-content .tc-contents .tc-tab:not(:first)').hide(); 
	$('.tabbed-content .tc-menu li a').click(function(){
	    var t = $(this).attr('href');
	    if($(this).hasClass('inactive')){ //this is the start of our condition 
		    $('.tabbed-content .tc-menu li a').addClass('inactive');		 
		    $(this).removeClass('inactive');
		    $('.tabbed-content .tc-tab').hide();
		    $(t).fadeIn('slow');	
		}
	    return false;
	});

	// Review System Page 
	function wuReview() {
		$(".rev-option").each(function(){
			var grade = $(this).attr("data-value");
			var x = 10;
			for(var i=0; i<x; i++) {
				$(this).children("ul").append("<li style='margin-right: 2%;'></li>");
			}
		$(this).children("ul").children("li:nth-child(-n+" + Math.ceil(grade/10) + ")").css("background", returnColor(grade));
		$(this).children("div").children("span").text(grade/10 + "/10");
		});
	}

	// Load wuReview Function
	wuReview(); 

	// Make Review's Comments Sliders
	$(".comment_meta_slider").each(function(){
		var comm_meta_input = $(this).parent(".comment-form-meta-option").children("input");
		$(this).slider({
			min: 0,
			max: 100,
			value: 0,
			slide: function(event, ui) {
				$(comm_meta_input).val(ui.value/10);
			}
		});
	});

	// Color user's comment rating bar.
	$(".comment-meta-option .comment-meta-grade").each(function(){

		var theBarWidth = ( 100 * parseFloat($(this).css('width')) / parseFloat($(this).parent().css('width')) );
		$(this).css("background", returnColor(theBarWidth));
	});

	// Making the menu responsive
	$(".main-header .main-menu li a").addClass("top-level");
	$(".main-header .main-menu .sub-menu li a").addClass("second-level");

	$("<select class='main-dropdown'/>").appendTo(".main-header .main-menu");

	$("<option />", {
		"selected"	: "selected",
		"value"		: "",
		"text"		: "Main Navigation"
	}).appendTo(".main-header .main-menu select");

	$(".main-header .main-menu li a").each(function(){
		var link = $(this);
		$("<option />", {
			"value"		: link.attr("href"),
			"text"		: link.text(),
			"class"		: link.attr("class")
		}).appendTo(".main-header .main-menu select");
	});

	$(".main-header .main-menu select").change(function(){
		window.location = $(this).find("option:selected").val();
	});

	$("<p>- </p>").prependTo("option.second-level");


});