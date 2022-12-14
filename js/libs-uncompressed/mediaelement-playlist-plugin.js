"use strict";
!function (a) {
	a.extend(mejs.MepDefaults, {
		loopText: "Repeat On/Off",
		shuffleText: "Shuffle On/Off",
		nextText: "Next Track",
		prevText: "Previous Track",
		playlistText: "Show/Hide Playlist",
		fullscreenText: "Show/Hide Fullscreen"
	}), a.extend(MediaElementPlayer.prototype, {
		buildloop: function (b, c, d, e) {
			var f = this,
				g = a('<div class="mejs-button mejs-loop-button ' + (b.options.loopplaylist ? "mejs-loop-on" : "mejs-loop-off") + '"><button type="button" aria-controls="' + b.id + '" title="' + b.options.loopText + '"></button></div>').appendTo(c).click(function () {
					b.options.loopplaylist = !b.options.loopplaylist, a(e).trigger("mep-looptoggle", [b.options.loopplaylist]), b.options.loopplaylist ? g.removeClass("mejs-loop-off").addClass("mejs-loop-on") : g.removeClass("mejs-loop-on").addClass("mejs-loop-off")
				});
			f.loopToggle = f.controls.find(".mejs-loop-button")
		}, loopToggleClick: function () {
			var a = this;
			a.loopToggle.trigger("click")
		}, buildshuffle: function (b, c, d, e) {
			var f = this,
				g = a('<div class="mejs-button mejs-playlist-plugin-button mejs-shuffle-button ' + (b.options.shuffle ? "mejs-shuffle-on" : "mejs-shuffle-off") + '"><button type="button" aria-controls="' + b.id + '" title="' + b.options.shuffleText + '"></button></div>').appendTo(c).click(function () {
					b.options.shuffle = !b.options.shuffle, a(e).trigger("mep-shuffletoggle", [b.options.shuffle]), b.options.shuffle ? g.removeClass("mejs-shuffle-off").addClass("mejs-shuffle-on") : g.removeClass("mejs-shuffle-on").addClass("mejs-shuffle-off")
				});
			f.shuffleToggle = f.controls.find(".mejs-shuffle-button")
		}, shuffleToggleClick: function () {
			var a = this;
			a.shuffleToggle.trigger("click")
		}, buildprevtrack: function (b, c, d, e) {
			var f = this,
				g = a('<div class="mejs-button mejs-playlist-plugin-button mejs-prevtrack-button mejs-prevtrack"><button type="button" aria-controls="' + b.id + '" title="' + b.options.prevText + '"></button></div>');
			g.appendTo(c).click(function () {
				a(e).trigger("mep-playprevtrack"), b.playPrevTrack()
			}), f.prevTrack = f.controls.find(".mejs-prevtrack-button")
		}, prevTrackClick: function () {
			var a = this;
			a.prevTrack.trigger("click")
		}, buildnexttrack: function (b, c, d, e) {
			var f = this,
				g = a('<div class="mejs-button mejs-playlist-plugin-button mejs-nexttrack-button mejs-nexttrack"><button type="button" aria-controls="' + b.id + '" title="' + b.options.nextText + '"></button></div>');
			g.appendTo(c).click(function () {
				a(e).trigger("mep-playnexttrack"), b.playNextTrack()
			}), f.nextTrack = f.controls.find(".mejs-nexttrack-button")
		}, nextTrackClick: function () {
			var a = this;
			a.nextTrack.trigger("click")
		}, buildplaylist: function (b, c, d, e) {
			var f = this,
				g = a('<div class="mejs-button mejs-playlist-plugin-button mejs-playlist-button ' + (b.options.playlist ? "mejs-hide-playlist" : "mejs-show-playlist") + '"><button type="button" aria-controls="' + b.id + '" title="' + b.options.playlistText + '"></button></div>');
			g.appendTo(c).click(function () {
				f.togglePlaylistDisplay(b, d, e)
			}), f.playlistToggle = f.controls.find(".mejs-playlist-button")
		}, playlistToggleClick: function () {
			var a = this;
			a.playlistToggle.trigger("click")
		}, buildaudiofullscreen: function (b, c, d, e) {
			if (!b.isVideo) {
				var f = this;
				f.fullscreenBtn = a('<div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="' + f.id + '" title="' + f.options.fullscreenText + '" aria-label="' + f.options.fullscreenText + '"></button></div>'), f.fullscreenBtn.appendTo(c);
				var g = !mejs.MediaFeatures.hasTrueNativeFullScreen && mejs.MediaFeatures.hasSemiNativeFullScreen && !f.media.webkitEnterFullscreen;
				if ("native" === f.media.pluginType && !g || !f.options.usePluginFullScreen && !mejs.MediaFeatures.isFirefox) f.fullscreenBtn.click(function () {
					var a = mejs.MediaFeatures.hasTrueNativeFullScreen && mejs.MediaFeatures.isFullScreen() || b.isFullScreen;
					a ? b.exitFullScreen() : b.enterFullScreen()
				}); else {
					var h = "manual-fullscreen";
					f.fullscreenBtn.click(function () {
						var c = b.container.hasClass(h);
						c ? (a(document.body).removeClass(h), b.container.removeClass(h), b.resetSize(), f.isFullScreen = !1) : (f.normalHeight = f.container.height(), f.normalWidth = f.container.width(), a(document.body).addClass(h), b.container.addClass(h), f.container.css({
							width: "100%",
							height: "100%"
						}), b.layers.children().css("width", "100%").css("height", "100%"), f.containerSizeTimeout = setTimeout(function () {
							f.container.css({
								width: "100%",
								height: "100%"
							}), b.layers.children().css("width", "100%").css("height", "100%"), f.setControlsSize()
						}, 500), b.setControlsSize(), f.isFullScreen = !0)
					})
				}
			}
		}, buildplaylistfeature: function (b, c, d, e) {
			var f = this, g = a('<div class="mejs-playlist mejs-layer"><ul class="mejs"></ul></div>').appendTo(d);
			a(e).data("showplaylist") && (b.options.playlist = !0, a("#" + b.id).find(".mejs-overlay-play").hide()), b.options.playlist || g.hide();
			var h, i = function (a) {
				var b = a.split("/");
				return b.length > 0 ? decodeURIComponent(b[b.length - 1]) : ""
			}, j = [], k = "";
			a("#" + b.id).find(".mejs-mediaelement source").each(function () {
				if (a(this).parent()[0] && a(this).parent()[0].canPlayType ? h = a(this).parent()[0].canPlayType(this.type) : a(this).parent()[0] && a(this).parent()[0].player && a(this).parent()[0].player.media && a(this).parent()[0].player.media.canPlayType ? h = a(this).parent()[0].player.media.canPlayType(this.type) : console.error("Cannot determine if we can play this media (no canPlayType()) on" + a(this).toString()), k || "maybe" !== h && "probably" !== h || (k = this.type), k && this.type === k && "" !== a.trim(this.src)) {
					var b = {};
					b.source = a.trim(this.src), "" !== a.trim(this.title) ? b.name = a.trim(this.title) : b.name = i(b.source), b.poster = a(this).data("poster"), j.push(b)
				}
			});
			for (var l in j) {
				var m = a('<li data-url="' + j[l].source + '" data-poster="' + j[l].poster + '" title="' + j[l].name + '"><span>' + j[l].name + "</span></li>");
				d.find(".mejs-playlist > ul").append(m), a(b.media).hasClass("mep-slider") && m.css({"background-image": 'url("' + m.data("poster") + '")'})
			}
			b.videoSliderTracks = j.length, d.find("li:first").addClass("current played"), b.isVideo || b.changePoster(d.find("li:first").data("poster"));
			var n = a('<a class="mep-prev">'), o = a('<a class="mep-next">');
			b.videoSliderIndex = 0, d.find(".mejs-playlist").append(n), d.find(".mejs-playlist").append(o), a("#" + b.id + ".mejs-container.mep-slider").find(".mejs-playlist ul li").css({transform: "translate3d(0, -20px, 0) scale3d(0.75, 0.75, 1)"}), n.click(function () {
				var c = !0;
				b.videoSliderIndex -= 1, b.videoSliderIndex < 0 && (b.videoSliderIndex = 0, c = !1), b.videoSliderIndex === b.videoSliderTracks - 1 ? o.fadeOut() : o.fadeIn(), 0 === b.videoSliderIndex ? n.fadeOut() : n.fadeIn(), c === !0 && (b.sliderWidth = a("#" + b.id).width(), a("#" + b.id + ".mejs-container.mep-slider").find(".mejs-playlist ul li").css({transform: "translate3d(-" + Math.ceil(b.sliderWidth * b.videoSliderIndex) + "px, -20px, 0) scale3d(0.75, 0.75, 1)"}))
			}).hide(), o.click(function () {
				var c = !0;
				b.videoSliderIndex += 1, b.videoSliderIndex > b.videoSliderTracks - 1 && (b.videoSliderIndex = b.videoSliderTracks - 1, c = !1), b.videoSliderIndex === b.videoSliderTracks - 1 ? o.fadeOut() : o.fadeIn(), 0 === b.videoSliderIndex ? n.fadeOut() : n.fadeIn(), c === !0 && (b.sliderWidth = a("#" + b.id).width(), a("#" + b.id + ".mejs-container.mep-slider").find(".mejs-playlist ul li").css({transform: "translate3d(-" + Math.ceil(b.sliderWidth * b.videoSliderIndex) + "px, -20px, 0) scale3d(0.75, 0.75, 1)"}))
			}), d.find(".mejs-playlist > ul li").click(function () {
				a(this).hasClass("current") ? b.media.paused ? b.play() : b.pause() : (a(this).addClass("played"), b.playTrack(a(this)))
			}), e.addEventListener("ended", function () {
				b.playNextTrack()
			}, !1), e.addEventListener("playing", function () {
				b.container.removeClass("mep-paused").addClass("mep-playing"), b.isVideo && f.togglePlaylistDisplay(b, d, e, "hide")
			}, !1), e.addEventListener("play", function () {
				b.isVideo || d.find(".mejs-poster").show()
			}, !1), e.addEventListener("pause", function () {
				b.container.removeClass("mep-playing").addClass("mep-paused")
			}, !1)
		}, playNextTrack: function () {
			var a, b = this, c = b.layers.find(".mejs-playlist > ul > li"), d = c.filter(".current"),
				e = c.not(".played");
			e.length < 1 && (d.removeClass("played").siblings().removeClass("played"), e = c.not(".current"));
			var f = !1;
			if (b.options.shuffle) {
				var g = Math.floor(Math.random() * e.length);
				a = e.eq(g)
			} else a = d.next(), a.length < 1 && (b.options.loopplaylist || b.options.autoRewind) && (a = d.siblings().first(), f = !0);
			b.options.loop = !1, 1 == a.length && (a.addClass("played"), b.playTrack(a), b.options.loop = b.options.loopplaylist || b.options.continuous && !f)
		}, playPrevTrack: function () {
			var a, b = this, c = b.layers.find(".mejs-playlist > ul > li"), d = c.filter(".current"),
				e = c.filter(".played").not(".current");
			if (e.length < 1 && (d.removeClass("played"), e = c.not(".current")), b.options.shuffle) {
				var f = Math.floor(Math.random() * e.length);
				a = e.eq(f)
			} else a = d.prev(), a.length < 1 && b.options.loopplaylist && (a = d.siblings().last());
			1 == a.length && (d.removeClass("played"), b.playTrack(a))
		}, changePoster: function (a) {
			var b = this;
			b.layers.find(".mejs-playlist").css("background-image", 'url("' + a + '")'), b.setPoster(a), b.layers.find(".mejs-poster").show()
		}, playTrack: function (a) {
			var b = this;
			b.pause(), b.setSrc(a.data("url")), b.load(), b.changePoster(a.data("poster")), b.play(), a.addClass("current").siblings().removeClass("current")
		}, playTrackURL: function (a) {
			var b = this, c = b.layers.find(".mejs-playlist > ul > li"), d = c.filter('[data-url="' + a + '"]');
			b.playTrack(d)
		}, togglePlaylistDisplay: function (b, c, d, e) {
			var f = this;
			e ? b.options.playlist = "show" === e ? !0 : !1 : b.options.playlist = !b.options.playlist, a(d).trigger("mep-playlisttoggle", [b.options.playlist]), b.options.playlist ? (c.children(".mejs-playlist").fadeIn(), f.playlistToggle.removeClass("mejs-show-playlist").addClass("mejs-hide-playlist")) : (c.children(".mejs-playlist").fadeOut(), f.playlistToggle.removeClass("mejs-hide-playlist").addClass("mejs-show-playlist"))
		}, oldSetPlayerSize: MediaElementPlayer.prototype.setPlayerSize, setPlayerSize: function (a, b) {
			var c = this.isVideo;
			this.isVideo = !0, this.oldSetPlayerSize(a, b), this.isVideo = c
		}
	})
}(mejs.$);