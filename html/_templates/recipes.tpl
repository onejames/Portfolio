<script type="text/template" id="recipesTemplate">

<li onclick="window.location.href = '<%= link %>';" class="surge-column-2/2 surge-column-tablet-1/2 sectionsUl">
	<div class="surge-column-tablet-1/24">&nbsp;</div>
	<div class="surge-column-2/2 surge-column-tablet-20/24 sectionsLi">
		<img class="surge-column-2/2 surge-column-tablet-1/4 " src="<%= image %>" />
		<span class="sectionTitle"><%= title %></span>
		<p><%= description %></p>
	</div>
	<div class="surge-column-tablet-1/24">&nbsp;</div>
</li>

</script>