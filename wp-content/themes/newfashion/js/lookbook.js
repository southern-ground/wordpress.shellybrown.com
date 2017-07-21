/**
 * Created by fst on 4/24/17.
 */
(function ($) {
    $().ready(function () {

        var com = window.com || {};
        com.shellybrown = com.shellybrown || {};

        var Lookbook = function (config) {
            this.config = config;
            this.maxWidth = 0;
            this.maxHeight = 0;
        };

        Lookbook.prototype = {
            buildPages: function () {

                this.$el = $(this.config.el);

                this.$el.empty();

                for (var i = 0; i < this.pages.length; i++) {
                    if (i === 0) {
                        this.pages[i].$el.append('<div class="instructions">Swipe left or right to navigate <em>or</em> use Up and Down arrows.</div>');
                    }
                    this.$el.append(this.pages[i].$el);
                }

                this.$el.onepage_scroll({
                    sectionContainer: "page",
                    loop: false,
                    easing: "ease",
                    pagination: false,
                    updateURL: false,
                    keyboard: true,
                    responsiveFallback: false,
                    direction: "horizontal"
                });


            },
            init: function () {

                var scope = this;
                this.imagesQueued = 0;
                $.ajax({
                    method: "GET",
                    url: scope.config.data || ""
                })
                    .done(function (msg) {
                        scope.dataLoaded(msg);
                    });


            },
            dataLoaded: function (data) {

                if (typeof data === "string") {
                    data = JSON.parse(data);
                }

                this.imagePath = data.image_path;
                this.pages = data.pages;

                this.formFactor = data.formFactor || "2:1";

                this.resize();

                var scope = this;

                $(window).resize(function () {
                    scope.resize();
                });

                this.loadImages();

                $('body, html').animate({
                    scrollTop: $(this.config.el).offset().top
                }, 2000);

            },
            imageLoaded: function (which, index) {

                this.maxHeight = Math.max(this.maxHeight, which.height);
                this.maxWidth = Math.max(this.maxWidth, which.width);

                this.pages[index].$el.html(which);
                this.imagesQueued--;
                var perc = (this.pages.length - this.imagesQueued) / this.pages.length;
                $('#PercentComplete').html((perc * 100) | 0);
                if (this.imagesQueued === 0) {
                    this.buildPages();
                }

            },
            loadImages: function () {

                var img;
                var _scope = this;
                this.pages.map(function (item, index) {
                    item.$el = $('<page class="page"></page>');
                    img = new Image();
                    _scope.imagesQueued++;
                    img.onload = function () {
                        _scope.imageLoaded(this, index);
                    };
                    img.src = _scope.imagePath + item.image;
                });

            },
            resize: function () {

                var wh = (this.formFactor.split(":") || [2, 1])
                        .map(function (n) {
                            return Number(n);
                        }),
                    newW = $(this.config.el).parent().parent().width(),
                    newH = newW * (wh[1] / wh[0]);

                $(this.config.el).parent().css({
                    width: newW,
                    height: newH
                });
            }
        };

        com.shellybrown.lookbook = new Lookbook(com.shellybrown.lookBookConfig);
        com.shellybrown.lookbook.init();

    });
})(jQuery);