@extends('layout')

@section('title')
Highest Ranking Story Of The Day!
@stop

	@section('story_header')
		<a href="/story/1"><div class="story_title">{title}</div></a>
		<div class="story_score">{score}</div>
		<a href="/story/1"><div class="feature_story"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque laboriosam expedita doloremque nemo, facilis, beatae consequuntur mollitia odit quos perspiciatis voluptatem, illo natus consectetur recusandae molestias velit optio. Quasi, ullam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet totam excepturi eligendi a soluta alias ducimus illum iusto consectetur eius sequi ipsam impedit, fuga enim velit accusamus aliquam reprehenderit similique nam fugit omnis. Natus hic aperiam blanditiis fuga repudiandae necessitatibus tempore odit non et totam sequi ducimus quas dolores adipisci repellat consectetur quo suscipit porro laborum assumenda dicta soluta dolorum at qui, esse! Dignissimos officia et laboriosam, reiciendis cum possimus sequi natus accusantium omnis voluptates quam consectetur voluptas mollitia iusto perferendis enim impedit eaque ullam culpa earum voluptatum, at nam. Explicabo ex perspiciatis cum praesentium rerum, ducimus possimus atque, aliquid magni, at distinctio voluptas sint eum ea sequi itaque dignissimos maxime. Magnam recusandae ut, quibusdam facilis saepe eum, iste deserunt consequatur, sequi quia nesciunt praesentium fugit earum molestias assumenda nostrum, quasi eveniet ipsam excepturi facere totam accusamus eaque aliquam commodi. In ut molestias temporibus praesentium doloremque rem, itaque labore voluptates repudiandae tempore culpa esse nulla distinctio dignissimos quidem provident reiciendis ex odit. Nam aperiam omnis cum excepturi autem laudantium non fugiat ea porro eligendi beatae, vitae harum saepe eius at ad inventore libero possimus veniam quas? Accusamus asperiores eos inventore totam itaque, est voluptatem libero. Explicabo quos inventore delectus. Quod incidunt iure numquam ipsa adipisci totam accusamus vel tenetur dolore cumque, amet, illum corrupti nam ea. Excepturi ea ipsa veritatis culpa eaque. Soluta, possimus, fuga. Necessitatibus praesentium esse, obcaecati tempore quis libero delectus dignissimos, harum error nihil sed cupiditate dolor. Molestiae ab, doloremque voluptatem itaque delectus ad illo similique explicabo quae neque, animi molestias quod, accusamus voluptates maiores iste ducimus aliquid exercitationem tempore esse aliquam! Odit distinctio eveniet esse porro in expedita molestias quia saepe, molestiae id, consequuntur eum, quo nulla eos obcaecati. Quisquam cum modi dicta dolor minima eos, accusantium enim soluta deserunt. Asperiores, facere at commodi minus. Consectetur accusamus, id, itaque nisi aut ducimus! Delectus exercitationem nisi corporis mollitia iste modi repudiandae at velit, reprehenderit nostrum voluptates id rerum, inventore similique? Beatae provident quidem necessitatibus, consequatur harum possimus sunt commodi rem tempora similique earum placeat quia, minima exercitationem facere fugit officia. Sunt rem aspernatur, officiis eius iste distinctio nostrum quod, dicta porro laboriosam, consectetur quia voluptas, animi maiores quibusdam possimus nemo beatae autem tempora itaque non magnam saepe soluta! Recusandae similique iste, aperiam corporis tenetur. Architecto impedit ab sed voluptate dolor soluta nobis excepturi. Necessitatibus deleniti quidem itaque sed nam ipsum iure, voluptates corporis saepe vitae, eligendi ex neque inventore asperiores quod omnis, similique voluptas impedit pariatur culpa atque? Molestiae blanditiis id assumenda, at dignissimos vel illo, aliquam qui quae enim cupiditate unde tempore facilis fugit asperiores officiis repellendus quidem. In consequuntur minus fugit distinctio optio, alias vitae cum impedit voluptatem eligendi soluta earum odit aliquid temporibus deserunt quam omnis ullam ad perferendis totam sapiente modi pariatur molestiae necessitatibus. Quidem tenetur qui voluptatem eaque aspernatur unde quibusdam. Tenetur ab voluptas quo! Ducimus sit expedita magni hic vero eos quas at molestiae iure possimus, consequatur esse dolorum architecto, itaque rem qui fuga quae minus cumque, nesciunt facilis est officiis?</p></div></a>
		@endsection

	@section('comments')
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
		<div class="comment">
			<div class="score"><div class="fa fa-sort-asc"></div><div>90</div><div class="fa fa-sort-desc"></div></div>
			<div class="username">Sk8rSeth - 32</div>
			<div class="comment_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, ullam?</div>
		</div>
	@endsection

	@section('story_stats')
			<h2>- Stats For This Story -</h2>
			<div><strong># of Commits:</strong> 232</div>
			<div><strong>Start Date:</strong> 2015.03.14</div>
			<div><strong>Word Count:</strong> 2304</div>
			<div><strong>Seed By:</strong> Sk8rSeth</div>
	@endsection
	
	@section('add_comment')
		<div class="feature_add_comment">
			<input type="textarea" placeholder="Please Enter A Comment Here...">
			<button>Comment</button>
		</div>
	@endsection