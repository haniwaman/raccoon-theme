jQuery(function() {
	/* is Loading */
	jQuery("body")
		.delay(3000)
		.queue(function() {
			jQuery(this)
				.attr("data-loading", "true")
				.dequeue();
		});
	jQuery(window).on("load", function() {
		jQuery("body").attr("data-loading", "true");
	});

	/* is Scroll */
	jQuery(window).on("scroll", function() {
		if (100 < jQuery(this).scrollTop()) {
			jQuery("body").attr("data-scroll", "true");
		} else {
			jQuery("body").attr("data-scroll", "false");
		}
	});

	/* Smooth Scroll */
	jQuery('a[href^="#a-"]').click(function() {
		var header = 0;
		var speed = 300;
		var id = jQuery(this).attr("href");
		var target = jQuery("#a-top" === id ? "html" : id);
		console.log(id);
		var position = jQuery(target).offset().top - header;

		if ("fixed" === jQuery(".l-header").css("position")) {
			header = jQuery(".l-header").height();
			position = position - header;
		}
		if (0 > position) {
			position = 0;
		}
		jQuery("html, body").animate(
			{
				scrollTop: position
			},
			speed
		);
	});

	/* floating */
	jQuery(window).on("scroll", function() {
		if (500 < jQuery(this).scrollTop()) {
			jQuery(".p-floating").show();
		} else {
			jQuery(".p-floating").hide();
		}
	});

	/* Global Navigation */
	jQuery(".p-header-nav > ul > li.menu-item-has-children").on("hover", function() {
		console.log("ホバーされました！");
		jQuery(".p-header-nav > ul > li.menu-item-has-children > a + .sub-menu").removeClass("is-show");
		jQuery(this)
			.children(".sub-menu")
			.addClass("is-show");
	});

	jQuery(".p-header-nav > ul > li > a").on("focus", function() {
		jQuery(".p-header-nav > ul > li.menu-item-has-children > a + .sub-menu").removeClass("is-show");
	});

	jQuery(".p-header-nav > ul > li.menu-item-has-children > a").on("focus", function() {
		console.log("フォーカスされました！");
		jQuery(this)
			.next(".sub-menu")
			.addClass("is-show");
	});

	/* Drawer Nav */
	jQuery("<button>")
		.appendTo(".p-drawer-nav > ul > li.menu-item-has-children > a")
		.addClass("js-toggle-child-item");
	jQuery(".js-toggle-child-item").on("click", function(event) {
		event.preventDefault();
		jQuery(this)
			.closest(".menu-item-has-children")
			.toggleClass("m-open");
		console.log("クリックされました！");
	});

	/* Widget Nav */
	jQuery("<button>")
		.appendTo(".widget_nav_menu .menu > li.menu-item-has-children > a")
		.addClass("js-toggle-child-item");
	jQuery(".js-toggle-child-item").on("click", function(event) {
		event.preventDefault();
		jQuery(this)
			.closest(".menu-item-has-children")
			.toggleClass("m-open");
		console.log("クリックされました！");
	});

	// Drawer
	jQuery(".js-drawer").on("click", function(event) {
		event.preventDefault();
		let targetClass = jQuery(this).attr("data-target");
		if (jQuery("." + targetClass).hasClass("is-checked")) {
			jQuery("." + targetClass).removeClass("is-checked");
			jQuery("." + targetClass + " a:first").focus();
		} else {
			jQuery("." + targetClass).addClass("is-checked");
		}
		return false;
	});

	jQuery(document).on("click", function() {
		jQuery(".p-header-nav > ul > li.menu-item-has-children > a + .sub-menu").removeClass("is-show");
	});

	jQuery(document).on("focus", "*", function(e) {
		if (jQuery(".for-drawer01").hasClass("is-checked")) {
			if (
				jQuery(e.target)
					.parents()
					.hasClass("for-drawer01")
			) {
			} else {
				jQuery(".for-drawer01").removeClass("is-checked");
				jQuery("button.js-drawer").focus();
			}
		}
	});

	jQuery(document).keydown(function(event) {
		if (event.keyCode === 27) {
			if (jQuery(".for-drawer01").hasClass("is-checked")) {
				jQuery(".for-drawer01").removeClass("is-checked");
				jQuery("button.js-drawer").focus();
			}
		}
	});

	// Tel Link
	let userAgent = navigator.userAgent;
	if (userAgent.indexOf("iPhone") < 0 && userAgent.indexOf("Android") < 0) {
		jQuery('a[href^="tel:"]')
			.css("cursor", "default")
			.on("click", function(event) {
				event.preventDefault();
			});
	}
});
