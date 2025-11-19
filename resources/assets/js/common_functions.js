
let Gamma = {

    init: function(){

        this.navBarToogler();

        this.tabsInit();

        this.searchInit();

        this.stickySidebar();

        this.singlePost.init();

        this.commonEvents();

        //this.loadScrollPost.init();

        /*this.sidebarToolgle();

        this.commonEvents();

        this.share.init();

        this.creditCalculator.init();

        this.mfoFilter.init();

        this.bankFilter.init();

        this.creditCashFilter.init();

        this.creditCardsFilter.init();

        this.ajaxPagination.init();



        this.comments.init();*/
    },


    block: function($element){
        $element.prepend('<div class="block-loader"><div class="block-loader-content"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div></div>');
    },

    unblock: function($element){
        $element.find('.block-loader').remove();
    },

    commonEvents: function(){
        let self = this;
        //Numeric fields
        $('body').on('input propertychange', '.numeric', function(event) {
            var str = $.trim($(this).val());
            if(!$.isNumeric(str)){
                $(this).val(str.substring(0, str.length - 1));
            }
            else{
                $(this).val(str);
            }
        });

        //Страница банка показать больше текста
        $('.more-text').on('click', function (event) {
            if(!$(this).hasClass('show')){
                $textContainer = $(this).prev('.description').find('.info');
                $(this).prev('.description').animate({
                    height: $textContainer.height()
                }, 500);

                $(this).addClass('show').text('Скрыть');
            }
            else{
                $(this).prev('.description').animate({
                    height: '95px'
                }, 500);

                $(this).removeClass('show').text('Читать полностью ');
            }
        });



    },

    singlePost: {
        nothingLoad: false,

        data: {
            except: {},//id постов + url + seo которые не загружать
            last_post: 0,//id последнего поста в списке
        },

        init: function () {
            if (!$('.single-post').length)
                return;

            this.data.except = $.parseJSON(loadedPosts);

            this.scrollInit();
        },

        scrollInit: function(){
            let self = this;
            var $window = $(window);
            var $heightHeader = 63;
            $window.scroll(function(event) {

                var $scrollTop = $window.scrollTop();
                $scrollTopAddition = $scrollTop + $heightHeader;

                var documentProgress = $scrollTopAddition / ($(document).height() - $window.height());

                //Load post================================================================
                if( documentProgress > 0.8 && !$('body').hasClass('loading') && !self.nothingLoad){
                    self.loadPosts();
                }
                //=========================================================================

                $('.single-post').each(function (index, el) {

                    //StickySidebar==============================================
                    var $sidebarWrap = $(el).find('.sidebar-wrap');
                    var $sidebarWrapTop = $sidebarWrap.offset().top;
                    var $sidebarWrapDown = $sidebarWrapTop + $sidebarWrap.height();

                    var $sidebarInner = $(el).find(".sidebar-panel");
                    var $sidebarInnerHeight = $sidebarInner.height();

                    if($scrollTopAddition > $sidebarWrapTop){
                        $sidebarInner.removeClass("abs").addClass("fixed").css({
                            "top": $heightHeader+"px"
                        });
                    }

                    if($scrollTopAddition < $sidebarWrapTop){

                        $sidebarInner.removeClass("fixed").css({
                            "top": 0+"px"
                        });
                    }

                    if(($scrollTopAddition + $sidebarInnerHeight) > $sidebarWrapDown){
                        $sidebarInner.removeClass("fixed").addClass('abs').css({
                            "top": ($sidebarWrapDown - ($sidebarInnerHeight + $sidebarWrapTop))+"px"
                        });
                    }
                    //===================================================================

                    //Progress============================================================
                    var elTop = $(el).offset().top;
                    var elHeight = $(el).height();
                    var elBottom = elHeight + elTop;
                    var blockProgress = 0;

                    if (elTop < $scrollTopAddition && elBottom > $scrollTopAddition){

                        blockProgress = ($scrollTopAddition - elTop)   / elHeight;
                        //console.log(blockProgress);
                        $(".progress-bar").css({
                            "width": (100 * blockProgress | 0) + "%"
                        });
                        $('progress')[0].value = blockProgress;

                    }

                    //Change URL and Meta================================================================
                    var postId = $(el).data('id');
                    var pointChange = $scrollTopAddition + $window.height()/2;
                    var fullHeight = $scrollTopAddition + $window.height();

                    if(elTop > $scrollTopAddition && elTop < pointChange){
                        self.changeUrl(postId);
                    }

                    if(elBottom > pointChange && elBottom < fullHeight){
                        self.changeUrl(postId);
                    }
                    //=========================================================================





                });
            });
        },

        loadPosts: function(){
            let self = this;
            $('body').addClass('loading');
            this.data.last_post = $('#post-list .single-post').last().data('id');
            axios.post('/ajax/load-more-posts', this.data)
                .then(function (response) {
                    if(response.data.content === ''){
                        self.nothingLoad = true;
                        return;
                    }
                    $('#post-list').append(response.data.content);
                    self.data.except = response.data.except;

                    $('body').removeClass('loading');

                })
                .catch(function (error) {

                    console.log(error);
                    $('body').removeClass('loading');
                });
        },
        changeUrl: function(postId){
            // Если url уже изменен выходим
            if (this.data.except[postId]['url'] === location.href)
                return;

            //Change page seo
            $('title').text(this.data.except[postId]['seo_title']);

            if(!$('meta[name = description]').length)
                $('head').append('<meta name="description" content="">');

            if(!$('meta[property="og:description"]').length)
                $('head').append('<meta property="og:description" content="">');


            //SEO
            $('meta[name = description]').attr('content', this.data.except[postId]['seo_description']);
            $('meta[name = keywords]').attr('content', this.data.except[postId]['seo_keywords']);
            $('link[rel = canonical]').attr('href', this.data.except[postId]['seo_canonical']);
            $('meta[name = robots]').attr('content', this.data.except[postId]['seo_robots']);

            //OpenGraph
            $('meta[property="og:title"]').attr('content', this.data.except[postId]['og_title']);
            $('meta[property="og:description"]').attr('content', this.data.except[postId]['og_description']);
            $('meta[property="og:url"]').attr('content', this.data.except[postId]['og_url']);


            //Change post url
            $.router.go(this.data.except[postId]['url'], 'post_id_'+postId);

            //Add to Google analitics
            //console.log(window.ga);
            /*if (window.ga) {

                ga('create', 'UA-143376033-1', 'nominal.com.ua');
                //ga('set', 'page', location.pathname);
                ga('send', 'pageview', location.pathname);
            }*/
        },

    },

    stickySidebar: function(){
        if (!$('#sidebar-one').length)
            return;

       /* var sidebar = new StickySidebar('.sidebar', {
            topSpacing: 65,
            bottomSpacing: 0,
            stickyClass: 'is-affixed',
            containerSelector: '.main-content',
            innerWrapperSelector: '.sidebar__inner'
        });*/
        var $heightHeader = 61;
        var $window = $(window);
        $window.scroll(function (event) {

            var $scrollTop = $window.scrollTop();
            var $scrollTopAddition = $scrollTop + $heightHeader;



            //StickySidebar==============================================
            var $sidebarWrap = $('#sidebar-one');
            var $sidebarWrapTop = $sidebarWrap.offset().top;
            var $sidebarWrapDown = $sidebarWrapTop + $sidebarWrap.height();

            var $sidebarInner = $sidebarWrap.find(".sidebar__inner");
            var $sidebarInnerHeight = $sidebarInner.height();

            if($scrollTopAddition > $sidebarWrapTop){
                $sidebarInner.removeClass("abs").addClass("fixed").css({
                    "top": $heightHeader+"px"
                });
            }

            if($scrollTopAddition < $sidebarWrapTop){

                $sidebarInner.removeClass("fixed").css({
                    "top": 0+"px"
                });
            }

            if(($scrollTopAddition + $sidebarInnerHeight) > $sidebarWrapDown){
                $sidebarInner.removeClass("fixed").addClass('abs').css({
                    "top": ($sidebarWrapDown - ($sidebarInnerHeight + $sidebarWrapTop))+"px"
                });
            }
            //===================================================================
        })
    },

    searchInit: function(){
        $('.search-main').on('click', function (event) {
            $('.search-input').slideDown();
        });

        $('.search-close-btn').on('click', function (event) {
            $('.search-input').slideUp();
        });
    },

    tabsInit: function(){
        $('.tab').on('click', function (event){
            event.preventDefault();
            var parent = $(this).closest('.parent');
            parent.find('.tab').parent().removeClass('active');
            $(this).parent().addClass('active');

            var target = $(this).data('target');

            parent.find('.tab_content').removeClass('active');
            $(target).addClass('active');
        });
    },

    navBarToogler(){
        if($(window).width() < 1200 ){
            $('.dropdown-toggle').click(function(e) {
                $(this).next('.dropdown-menu').slideToggle();
            });
        }
        else{
            $('.nav-item.dropdown').hover(function(e) {

                $(this).find('.dropdown-menu').stop().fadeIn();
            }, function(e) {
                $(this).find('.dropdown-menu').stop().fadeOut();
            });
        }


        $('.navbar-toggler').click(function(e) {
            $($(this).data('target')).slideToggle();
        });
    },

};

$(document).ready(function() {
    Gamma.init();
});

$(document).ready(function(){
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
    }

    if (getCookie('Nominal') == undefined){
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        //Parse URL
        var _GET = (function () {
            var _get = {};
            var re = /[?&]([^=&]+)(=?)([^&]*)/g;
            while (m = re.exec(location.search))
                _get[decodeURIComponent(m[1])] = (m[2] == '=' ? decodeURIComponent(m[3]) : !0);
            return _get
        })();
        var urlData = _GET;

        var cookieValue = getCookie('Nominal');
        var keyValue = getCookie('Nominal-GLG');

        if (urlData.sub1 == undefined){
            setCookie('Nominal', 'Organic', 1/5);

        } else if (cookieValue != 'undefined') {
            setCookie('Nominal', urlData.sub1, 1/5);
        };

        if (urlData.utm_term == undefined){
            setCookie('Nominal-GLG', 'NoKeyword', 1/5);
        } else if (keyValue != 'undefined') {
            setCookie('Nominal-GLG', urlData.utm_term, 1/5);
        };
    }
    $('.redirect').each(function () {
        $(this).attr('data-href', $(this).attr('data-href') + '&sub1=' + getCookie('Nominal') + '&sub2=' + getCookie('Nominal-GLG'));
    });

    $('.redirect').click(function () {
        var url = $(this).data('href');
        if (url !== undefined) {

            var win = window.open(url, "_blank");
            setTimeout(function (){
                if(win.closed)
                    window.location.replace(url);
                else
                    win.focus();
            }, 100);

            return !1
        }
    });
})
