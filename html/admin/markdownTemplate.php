<div>
	<h2>[@articleTitle]</h2>
	<input type="hidden" id="markdownPath" value="[@markdownPath]" />
	<textarea id="markdownEditor" class="markdownEditor">
[@rawMarkdown]
	</textarea>
	
	<p>
		<button onclick="updatePreview();" >Preview</button> &nbsp;
		<button onclick="saveMarkdown();" >save</button>
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
			[@jsonProperties]
		</div>
	</fieldset>
</div>
