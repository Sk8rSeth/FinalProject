<script id="template-comment">
	<div class="comment" comment-id="@{{comment_id}}">
		<div class="score"><div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";} else{echo Auth::user()->user_id;}?>"></div><div>@{{comment_score}}</div><div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div></div>
		<div class="username">@{{username}}- @{{user_score}}</div>
		<div class="comment_description">@{{comment_body}}</div>
	</div>
</script>

<script id="template-commentsAll">
	@{{#each data}}
	<div class="comment" comment-id="@{{comment_id}}">
		<div class="score"><div class="fa fa-sort-asc" user-id="<?php if(Auth::guest()) {echo "";} else{echo Auth::user()->user_id;}?>"></div><div>@{{comment_score}}</div><div class="fa fa-sort-desc" user-id="<?php if(Auth::guest()) {echo "";}else{echo Auth::user()->user_id;}?>"></div></div>
		<div class="username">@{{username}}- @{{user_score}}</div>
		<div class="comment_description">@{{comment_body}}</div>
	</div>
	@{{/each}}
</script>