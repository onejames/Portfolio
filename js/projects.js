$(document).ready(function(){
	initRecipes();
});

function initRecipes()
{
	$.ajax({
        url: domain+'ajax/projects',
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

function populateSections(projects)
{

	var _html = '';
	var template = $("#projectsTemplate").html();

	_.each(projects, function(project){
		_html += _.template( template, project )
	});

	$("#projects").html(_html);

	applyBehavior();
}

function applyBehavior()
{
	$('#projects li').on("mouseenter", function(){
		
		// $(this).css('width', '822px');
		
		// var rect = this.getBoundingClientRect();
		// console.log(rect.top, rect.right, rect.bottom, rect.left);
		// $(this).css('top', rect.top);
		// console.log(getChildNumber(this));
	});

	$('#projects li').on("mouseleave", function(){
		$(this).css('width', '380px');
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

