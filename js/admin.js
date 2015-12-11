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

function saveArticle()
{
	if(window.confirm("Are you sure you want to update this article?") != true) {
		return;
	}

    saveMarkdown();
}

function saveMarkdown()
{
    $.ajax({
        url: domain+'ajax/markdown',
        data: {
            'content':      $('#markdownEditor').val(),
            'action':       'save',
            'markdownPath': $('#markdownPath').val(),
        },
        type: "POST",
        success: function(data) {
            saveJsonProperties(data);
        },
        error: function(_error){
            console.log(_error);
        }
    });
}

function saveJsonProperties(priorMessage)
{
    var data = {
            'content':  $('#jsonPropertiesForm').serializeArray(),
            'action':   'save',
            'jsonPath': $('#jsonPath').val(),
        };
        console.log(data);
    $.ajax({
        url: domain+'ajax/json',
        data: data,
        type: "POST",
        success: function(data) {
            alert(priorMessage + data);
        },
        error: function(_error){
            console.log(_error);
        }
    });
}