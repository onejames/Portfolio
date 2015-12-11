$(document).ready(function(){
	initRecipes();
});

function initRecipes()
{
	$.ajax({
        url: domain+'ajax/recipes',
        data: {},
        type: "GET",
        success: function(data) {
			console.log(data);
            populateSections(JSON.parse(data));
        },
        error: function(_error){
            console.log(_error);
        }
	});
}

function populateSections(recipies)
{

	var _html = '';
	var template = $("#recipesTemplate").html();

	_.each(recipies, function(recipe){
		_html += _.template( template, recipe )
	});


	$("#recipes").html(_html);

	applyBehavior();
}

function applyBehavior()
{
	$('#recipes li').on("mouseenter", function(){
		
		// $(this).css('width', '822px');
		
		// var rect = this.getBoundingClientRect();
		// console.log(rect.top, rect.right, rect.bottom, rect.left);
		// $(this).css('top', rect.top);
		// console.log(getChildNumber(this));
	});

	$('#recipes li').on("mouseleave", function(){
		// $(this).css('width', '380px');
	});

	// var that = this;

	// setTimeout(function() {   //calls click event after a certain time
	//    $(that).css("height", "300px");
	//    alert('changing height');
	// }, 10000);
}

function getChildNumber(that)
{
	var num = 0;
	while( (child = child.previousSibling) != null ) {
		num++;
	}

	return num;
}

