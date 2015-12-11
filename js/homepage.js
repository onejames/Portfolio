$(document).ready(function(){
	initHomepage();
});

function initHomepage()
{
	$.ajax({
        url: domain+'ajax/homepageSections',
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

function populateSections(sections)
{

	var _html = '';
	var template = $("#homepageSections").html();

	console.log(sections.length);

	_.each(sections, function(section){
		_html += _.template( template, section )
	});


	$("#sections").html(_html);

	applyBehavior();
}

function applyBehavior()
{
	$('#sections li').on("mouseenter", function(){
		
		// $(this).css('width', '822px');
		
		// var rect = this.getBoundingClientRect();
		// console.log(rect.top, rect.right, rect.bottom, rect.left);
		// $(this).css('top', rect.top);
		// console.log(getChildNumber(this));
	});

	$('#sections li').on("mouseleave", function(){
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

