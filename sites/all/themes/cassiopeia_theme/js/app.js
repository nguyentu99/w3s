(function ($) {
	$(document).ready(function () {
		var owl = $('.slider-banner').owlCarousel({
			items:1,
			dots: false,
			loop: true,
			nav:false,
			autoplay:true,
			animateOut: 'fadeOut',
			autoplayTimeout:5000,
			autoplayHoverPause:true,
		})
		var owl = $('.slider-seen-more').owlCarousel({
			items:3,
			loop:true,
			nav: false,
			dots: false,
			margin:30,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
		})

		$('#imageGallery').lightSlider({
			gallery:true,
			item:1,
			loop:true,
			thumbItem:6,
			slideMargin:0,
			enableDrag: false,
			currentPagerPosition:'left',
			onSliderLoad: function(el) {
				el.lightGallery({
					selector: '#imageGallery .lslide'
				});
			}
		});

		var _toTop_ = 0;
		$(window).on("scroll", function () {
			$("header").toggleClass("active", window.scrollY > _toTop_);
		});

		$(window).on("scroll", function () {
			if ($(".slider-img-detail .lSPager ").length > 0) {
				var _top = $(".slider-img-detail .lSPager ").offset().top + 30;
				$(".co-view-links").toggleClass(
					"active",
					$(window).scrollTop() > _top
				);
			}
		});
		$(".co-view-links ul li a").on("click", function (e) {
			e.preventDefault();
			var _href = $(this).attr("href");
			$(".co-view-links ul li a").removeClass("active");
			$(this).addClass("active");
			$("html, body").animate(
				{
					scrollTop: $(_href).offset().top - 90,
				},
				800
			);
		});

		// iframe-video-img
		$(".box-play-vid").click(function () {
			var src = $(this).attr("data-src");
			$("#modalVideo .modal-body").html(
				'<iframe width="560" height="315" src="' + src + '?autoplay=1&rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
			);
			// $(this).remove();
			$("#modalVideo").modal("show");
		});
		$("#modalVideo").on("hidden.bs.modal", function () {
			$("#modalVideo .modal-body").html("");
		});


	});
})(jQuery);
