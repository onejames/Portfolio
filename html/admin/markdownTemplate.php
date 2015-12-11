<div>
	<h2>[@articleTitle]</h2>
	<input type="hidden" id="markdownPath" value="[@markdownPath]" />
	<input type="hidden" id="jsonPath" value="[@jsonPath]" />
	<textarea id="markdownEditor" class="markdownEditor">
[@rawMarkdown]
	</textarea>
	
	<p>
		<button onclick="updatePreview();" >Preview</button> &nbsp;
		<button onclick="saveArticle();" >save</button>
	</p>

	<fieldset>
		<legend>Preview</legend>
		<div id="markdownPreview">
			[@markdownPreview]
		</div>
	</fieldset>

	<fieldset>
		<legend>Properties</legend>
		<div id="markdownPreview">
			<form id="jsonPropertiesForm" >
				[@jsonProperties]
			</form>
		</div>
	</fieldset>
</div>
