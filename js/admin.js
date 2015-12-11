function updatePreview()
{
	$.ajax({
        url: domain+'ajax/markdown',
        data: {
        	'content': $('#markdownEditor').val(),
        	'action': 'preview'
        },
        type: "GET",
        success: function(data) {
            console.log(data);
            $('#markdownPreview').html(data);
        },
        error: function(_error){
            console.log(_error);
        }
	});
}

function saveMarkdown()
{
	if(window.confirm("Are you sure you want to update this article?") != true) {
		return;
	}

	$.ajax({
        url: domain+'ajax/markdown',
        data: {
        	'content':      $('#markdownEditor').val(),
        	'action':       'save',
        	'markdownPath': $('#markdownPath').val(),
        },
        type: "POST",
        success: function(data) {
            alert(data);
        },
        error: function(_error){
            console.log(_error);
        }
	});
}