<div class="wrap">
	<div class="stars">
		<label class="rate">
			<input type="radio" name="radio1" id="star1" value="star1">
			<div class="face"></div>
			<i class="far fa-star star one-star"></i>
		</label>
		<label class="rate">
			<input type="radio" name="radio1" id="star2" value="star2">
			<div class="face"></div>
			<i class="far fa-star star two-star"></i>
		</label>
		<label class="rate">
			<input type="radio" name="radio1" id="star3" value="star3">
			<div class="face"></div>
			<i class="far fa-star star three-star"></i>
		</label>
		<label class="rate">
			<input type="radio" name="radio1" id="star4" value="star4">
			<div class="face"></div>
			<i class="far fa-star star four-star"></i>
		</label>
		<label class="rate">
			<input type="radio" name="radio1" id="star5" value="star5">
			<div class="face"></div>
			<i class="far fa-star star five-star"></i>
		</label>
	</div>
	</div>

    <script>
        $(function() {

	$(document).on({
		mouseover: function(event) {
			$(this).find('.far').addClass('star-over');
			$(this).prevAll().find('.far').addClass('star-over');
		},
		mouseleave: function(event) {
			$(this).find('.far').removeClass('star-over');
			$(this).prevAll().find('.far').removeClass('star-over');
		}
	}, '.rate');


	$(document).on('click', '.rate', function() {
		if ( !$(this).find('.star').hasClass('rate-active') ) {
			$(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
			$(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
			$(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
		} else {
			console.log('has');
		}
	});

});

    </script>
