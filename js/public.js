window.onscroll = function () {
    Limg();
    var windST = $(window).scrollTop();
    if (windST > 30) {
        if (
            window.isWAP768 ||
            (window.isWAP768 && $(".rbt-box.d-pcShow").length == 0)
        ) {
            $(".rbt-hide-icon").trigger("click");
        }
    }
};
Limg()
function Limg() {
    var viewHeight = document.documentElement.clientHeight;
    var t = document.documentElement.scrollTop || document.body.scrollTop;
    var limg = document.querySelectorAll("img[lsrc]");
    // Array.prototype.forEach.call()
    Array.prototype.forEach.call(limg, function (item, index) {
        var rect;
        if (item.getAttribute("lsrc") === "") return;
        //getBoundingClientRect返回元素的大小及其相对于视口的位置
        rect = item.getBoundingClientRect();
        if (rect.bottom >= 0 && rect.top < viewHeight) {
            (function () {
                var img = new Image();
                img.src = item.getAttribute("lsrc");
                item.src = img.src;
                item.removeAttribute("lsrc");
            })();
        }
    });
}

function getbanner() {
    var url = location.href.slice(
        location.href.lastIndexOf("/") + 1,
        location.href.indexOf("html") - 1
    );
    ajax_hq({
        url: "kv/site?site=" + url,
        type: "GET",
        success: function (data) {
            for (var i = 0; i < data.data.length; i++) {
                var $item = $(".banner");
                if (data.data[i].type == 1) {
                    mbanner = data.data[i].banner;
                    $item.attr("msrc", mbanner);
                } else {
                    pcbanner = data.data[i].banner;
                    $item.attr("pcsrc", pcbanner);
                }
                window.dispatchEvent(new Event('resize'))
            }
        },
    });
}
// var BASE_URL = "http://hongqiolapi.cloud-top.com.cn/";
// var BASE_URL = "http://api.web.cloud-top.com.cn/";
// window.BASE_URL = document.baseURI + "/api/";
window.BASE_URL = "https://cors-anywhere.herokuapp.com/https://www.hongqi-auto.com/en/api/";
// window.BASE_URL = "/api/";
// var BASE_URL = "http://k8s-hongqi-website.cloud-top.com.cn/";
window.fileBase = "http://www.hongqi-auto.com/storage/";
window.WINDOW_WIDTH = null;
window.WINDOW_HEIGHT = null;
window.ISWAP = false; // 是否是手机端 750
window.isWAP768 = false; // 是否是手机端  768
// window.top= [];
// window.offsetTop = [];
window.offsetTopArr = []; // 用于存放动画包裹顶部距顶距离
window.offsetBottomArr = []; // 用于存放动画包裹底部距顶距离
window.REG_EMAIL = new RegExp(
    "^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"
);

window.loadingStorage = sessionStorage.getItem("loading");

window.ajax_hq = function (params) {
    $.ajax({
        async: true,
        type: params.type,
        // url: "http://k8s-hongqi-website.cloud-top.com.cn/" + params.url,
        url: BASE_URL + params.url,
        data: params.data,
        // dataType: "jsonp",
        success: function (data) {
            if (params.success) {
                params.success(data);
            }
        },
        beforeSend: function (xhr) {
            var training = ["/pages/training_materials/training_materials.html"];
            var online = ["/pages/online_training/online_training.html"];
            var download = ["/pages/download-center/download-center.html"];
            var params_url = window.location.pathname;
            // console.log("地址", params_url);
            if (
                (localStorage.getItem("token") && params_url == training) ||
                params_url == online ||
                params_url == download
            ) {
                // console.log(xhr.setRequestHeader);
                xhr.setRequestHeader("Authorization", localStorage.getItem("token"));
            }
            if (params.beforeSend) {
                params.beforeSend();
            }
        },
        complete: function () {
            if (params.complete) {
                params.complete();
            }
        },
    });
};
window.ajax_formData_clock = false;
window.ajax_formData = function (params) {
    if (ajax_formData_clock) {
        return;
    }
    ajax_formData_clock = true;
    $.ajax({
        async: false,
        type: params.type,
        url: BASE_URL + params.url,
        data: params.data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (params.success) {
                params.success(data);
            }
        },
        beforeSend: function () {
            if (params.beforeSend) {
                params.beforeSend();
            }
        },
        complete: function () {
            ajax_formData_clock = false;
            if (params.complete) {
                params.complete();
            }
        },
    });
};
// 获取图片位置距顶
var picOffsetLock = false;
window.picOffset = function () {
    offsetTopArr = [];
    offsetBottomArr = [];
    $(".d-ani").each(function (i, ele) {
        var offsetBottom =
            parseInt($(".d-ani").eq(i).offset().top) + $(".d-ani").eq(i).height();
        var offsetTop = parseInt($(".d-ani").eq(i).offset().top);
        $(".d-ani")
            .eq(i)
            .attr({
                offsetBottom: offsetBottom,
                offsetTop: offsetTop
            });
        offsetTopArr.push(offsetTop);
        offsetBottomArr.push(offsetBottom);
    });
    if (!picOffsetLock) {
        picOffsetLock = true;
        setTimeout(function () {
            picOffsetLock = false;
            window.winScroll &&
            typeof window.winScroll === "function" &&
            window.winScroll();
        }, 1000);
    }
};
window.swiper_generator = function (arr) {
    console.log(arr,"8888")
    for (var i = 0; i < arr.length; i++) {
        (function (i) {
            //  swiper
            var autoplay = 0;
            if (arr[i].indexOf("autoplay") > 0) {
                arr[i] = arr[i].slice(0, arr[i].indexOf("autoplay"));
                // autoplay = {
                //     delay: 3000,
                //     stopOnLastSlide: false,
                //     disableOnInteraction: false,
                // };
                autoplay = 3000;
            }
            if(arr[i]=="banner"){
                window['banner'] = []
                window['banner'][0] =  new Swiper("." + arr[i] + " .swiper-container.d-pcShow", {
                    loop: true,
                    autoplay: autoplay,
                    autoplayDisableOnInteraction: false,
                    autoHeight: true, //高度随内容变化
                    preventClicks: true,
                    pagination: "." + arr[i] + " .d-pcShow .swiper-pagination",
                    prevButton: "." + arr[i] + " .d-pcShow .swiper-button-prev",
                    nextButton: "." + arr[i] + " .d-pcShow .swiper-button-next",
                    observer: true, //修改swiper自己或子元素时，自动初始化swiper
                    observeParents: true, //修改swiper的父元素时，自动初始化swiper
                    paginationClickable: true,
                });
                window['banner'][1] = new Swiper("." + arr[i] + " .swiper-container.d-wapShow", {
                    loop: true,
                    autoplay: autoplay,
                    autoplayDisableOnInteraction: false,
                    autoHeight: true, //高度随内容变化
                    preventClicks: true,
                    pagination: "." + arr[i] + " .d-wapShow .swiper-pagination",
                    prevButton: "." + arr[i] + " .d-wapShow .swiper-button-prev",
                    nextButton: "." + arr[i] + " .d-wapShow .swiper-button-next",
                    observer: true, //修改swiper自己或子元素时，自动初始化swiper
                    observeParents: true, //修改swiper的父元素时，自动初始化swiper
                    paginationClickable: true,
                });

                console.log(window['banner'])
            }else{
                window[arr[i]] = new Swiper("." + arr[i] + " .swiper-container", {
                    loop: true,
                    autoplay: autoplay,
                    autoplayDisableOnInteraction: false,
                    autoHeight: true, //高度随内容变化
                    preventClicks: true,
                    pagination: "." + arr[i] + " .swiper-pagination",
                    prevButton: "." + arr[i] + " .swiper-button-prev",
                    nextButton: "." + arr[i] + " .swiper-button-next",
                    observer: true, //修改swiper自己或子元素时，自动初始化swiper
                    observeParents: true, //修改swiper的父元素时，自动初始化swiper
                    paginationClickable: true,
                });
            }

        })(i);
    }
};
window.initFun = function () {
    //以防导航不显示
    // $("#cti-header").fadeIn(800);
    $("#cti-header")
        .css({
            opacity: 1,
        })
        .show();
    var callback = window.initFunCallback;
    callback && typeof callback === "function" && callback();
    $("html,body").animate({
        scrollTop: 0
    }, 0);
    $("body").removeClass("overflow");
    $(".default-menu .menu .logo").animate({
        opacity: 1
    }, 500);
    if (
        location.href.indexOf(".html") < 0 ||
        location.href.indexOf("index.html") > 0 ||
        typeof HOMEPAGE != "undefined"
    ) {
        $(".loading-mask").fadeOut(0);
        $(".right-car,.left-car").fadeIn("slow");
        // $(".txt-wrap").fadeIn(2000);
        $("#loading-wrap").fadeOut(2000, function () {
            // $("#loading-wrap,.loading-mask").remove();
            $("body").removeClass("overflow-hidden-wrap");
            // if ( window.ISWAP) {
            // 手机端 并且是首页 显示车动画
            // 不单单是手机端
            $(".banner").addClass("act");
            // }
        });
    } else {
        $("#loading-wrap,.loading-mask")
            .delay(0)
            .fadeOut(500, function () {
                $("#loading-wrap,.loading-mask").remove();
                $("body").removeClass("overflow-hidden-wrap");
            });
    }

    // if (typeof initRbt != "undefined") {
    //   // console.log("机器人");
    //   // 机器人
    //   setTimeout(function() {
    //     // console.log(loadingStorage);
    //     var hongqi_tag = false;
    //     // 显示机器人
    //     $("#rbt-wrap").empty();
    //     var rbt = initRbt(document.getElementById("rbt-wrap"));
    //     // 缩放机器人
    //     rbt.rbtGrp.setAttribute("style", "transform: scale(" + 0.6 + ");");
    //     // 播放欢迎弹窗
    //     if (loadingStorage != "true") {
    //       setTimeout(function() {
    //         rbt.playPop();

    //       }, 1500);
    //       hongqi_tag = localStorage.getItem("hongqi_tag");
    //     } else {
    //       hongqi_tag = false;
    //     }
    //     // console.log(hongqi_tag);
    //     rbt.start(hongqi_tag); // 播放出场动画  false否 true 是
    //     if (!hongqi_tag) {
    //       // rbt.playPop();
    //       // sessionStorage.setItem("hongqi_tag", "true");
    //       localStorage.setItem("hongqi_tag", "true");
    //     } else {
    //       // if (window.isWAP768) {
    //       //     $(".rbt-hide-icon").trigger("click");
    //       // }
    //     }
    //     // $(".rbt-hide-icon").addClass("act");
    //     var customer_service_wrap = document.getElementById(
    //       "customer-service-wrap"
    //     );
    //     //  var p028d = lDiv(customer_service_wrap, 0, 0, 350, 490);
    //     //  var p028 = lImg(imgPath + "p028.jpg", p028d, 0, 0, 350, 490);
    //     //  TweenMax.to(p028d, 0, { autoAlpha: 0, scale: 0.5 });
    //     //  $("#rbt-wrap").click(function() {
    //     //      // rbt.addEventListener("click", function() {
    //     //      TweenMax.to(p028d, 0.5, { autoAlpha: 1, scale: 1, ease: Back.easeOut });
    //     //      $("#customer-service-wrap").fadeIn();
    //     //      setTimeout(function() {
    //     //          $("body").one("click", function() {
    //     //              $("#customer-service-wrap").fadeOut();
    //     //              TweenMax.to(p028d, 0.2, { autoAlpha: 0, scale: 0.5 });
    //     //          });
    //     //      }, 100);
    //     //  });
    //     //  p028d.addEventListener("click", function(e) {
    //     //      e.stopPropagation();
    //     //      // TweenMax.to(p028d, 0.2, { autoAlpha: 0, scale: 0.5 });
    //     //  });
    //   }, 2000);
    // }
    getbanner();
};
// 统一初始页面
function initPage() {
    // setTimeout(function() {
    initFun();
    // }, 0)
    // if (
    //     location.href.indexOf(".html") < 0 ||
    //     location.href.indexOf("index.html") > 0||HOMEPAGE
    // ) {} else {

    // }
}

// 禁止滑动
var mo = function (e) {
    e.preventDefault();
};
window.page_stop = function () {
    document.body.style.overflow = "hidden";
    document.addEventListener("touchmove", mo, {
        passive: false
    }); //禁止页面滑动
};

/***取消滑动限制***/
window.page_move = function () {
    document.body.style.overflow = ""; //出现滚动条
    document.removeEventListener("touchmove", mo, {
        passive: false
    });
};

function loadImage(url, callback) {
    var img = new Image(); //鍒涘缓涓€涓狪mage瀵硅薄锛屽疄鐜板浘鐗囩殑棰勪笅杞�    銆�
    img.src = url;
    if (img.complete) {
        // 濡傛灉鍥剧墖宸茬粡瀛樺湪浜庢祻瑙堝櫒缂撳瓨锛岀洿鎺ヨ皟鐢ㄥ洖璋冨嚱鏁�
        callback && callback(img);
        return; // 鐩存帴杩斿洖锛屼笉鐢ㄥ啀澶勭悊onload浜嬩欢
    }
    img.onload = function () {
        //鍥剧墖涓嬭浇瀹屾瘯鏃跺紓姝ヨ皟鐢╟allback鍑芥暟
        callback && callback(img);
    };
    img.onerror = function () {
        callback && callback(img);
    };
}

$(function () {
    var bodyLock = true;

    function loading_page_fun(num) {
        // if (num == 100) { return }
        if (typeof loading != "undefined") {
            loading.setP(num);
        }
        if (bodyLock) {
            $("body").show();
            bodyLock = false;
        }
        if (num == 100) {
            $("html,body").animate({
                scrollTop: 0
            }, 0);
            setTimeout(function () {
                Limg();
                // 开始获取导航数据/*  */
                getNavData();
            }, 100);
        }
    }

    if (
        (typeof initLoading != "undefined" && location.href.indexOf(".html") < 0) ||
        location.href.indexOf("index.html") > 0 ||
        typeof HOMEPAGE != "undefined"
    ) {


        console.log(loadingStorage);
        loading_page_fun(100)

        // var w;
        // if (loadingStorage == "true") {
        $("#cti-header").delay(2000).fadeIn(800);
        $(".container").show();
        var swiperArr = ["bannerautoplay"];
        swiper_generator(swiperArr);
        console.log("swiperArr v-0.02",swiperArr)


        setTimeout(function () {
            if (window["banner"] && window["banner"].length > 0) {
                window.ISWAP ?
                    window["banner"][1].update() :
                    window["banner"][0].update();
            }
        }, 100);
        getDataFun();
        // setTimeout(function() {
        //   getNavData();
        // }, 1000);
        // setTimeout(function () {
        $(".loading-mask").fadeOut(1000);
        $(".txt-wrap").fadeIn(2000);
        // }, 2000);
        setTimeout(function () {
            $(".cartype-name li").eq(0).trigger("click");
        }, 200);
        initPage();
        // jiqiren();
        return;
        // }


        // var w;
        if (loadingStorage == "true") {
            $("#cti-header").delay(2000).fadeIn(800);
            $(".container").show();
            var swiperArr = ["bannerautoplay"];
            swiper_generator(swiperArr);
            setTimeout(function () {
                if (window["banner"] && window["banner"].length > 0) {
                    window.ISWAP ?
                        window["banner"][1].update() :
                        window["banner"][0].update();
                }
            }, 100);
            getDataFun();
            setTimeout(function () {
                getNavData();
            }, 1000);
            // setTimeout(function () {
            $(".loading-mask").fadeOut(1000);
            $(".txt-wrap").fadeIn(2000);
            // }, 2000);
            setTimeout(function () {
                $(".cartype-name li").eq(0).trigger("click");
            }, 200);
            initPage();
            return;
        }

        function startWorker() {
            for (var i = 0; i <= 100; i++) {
                (function (i) {
                    setTimeout(function () {
                        loading_page_fun(i);
                    }, (i + 1) * 10);
                })(i);
            }
        }

        function stopWorker() {
            w.terminate();
        }
        $("#loading-wrap").animate({
            opacity: 1
        }, 1000);
        $("#loading-wrap").fadeIn(1000, function () {
            if (
                location.href.indexOf(".html") < 0 ||
                location.href.indexOf("index.html") > 0 ||
                typeof HOMEPAGE != "undefined"
            ) {
                loading.loadbar.style.display = "block";
                startWorker();
            } else {
                // 单独控制加载条
                // loading.loadbar.style.display="none"
                loading_page_fun(100);
            }
        });
        var loading_index_box = document.getElementById("loading-wrap");
        var loading = initLoading(document.getElementById("loading-wrap"));
        // 单独控制加载条
        loading.loadbar.style.display = "none";

        //设置半分比方法0~100
        // loading.setP(0);
        loading.addEventListener("onAniEvt1", function () {
            // 切换背景,显示logo
            // $(".loading-bg2").fadeIn(800);
            $("#cti-header").delay(2000).fadeIn(800);
            if (
                location.href.indexOf(".html") < 0 ||
                location.href.indexOf("index.html") > 0 ||
                typeof HOMEPAGE != "undefined"
            ) {
                // loading.playCarAni();
                $(".container").show();
                var swiperArr = ["banner"];
                swiper_generator(swiperArr);
                setTimeout(function () {
                    if (window["banner"] && window["banner"].length > 0) {
                        window.ISWAP ?
                            window["banner"][1].update() :
                            window["banner"][0].update();
                    }
                }, 100);
                setTimeout(function () {
                    $(".loading-mask").fadeOut(1000);
                    $(".txt-wrap").fadeIn(2000);
                    if (!window.isWAP768) {
                        initPage();
                    }
                }, 0);
                if (window.isWAP768) {
                    // 要初始化页面啦
                    initPage();
                }
                // console.log("要初始化页面啦");
                // jiqiren()
            } else {
                // 要初始化页面啦
                // return;
                initPage();
            }
        });
        // logo汇聚完成事件：onAniEvt2
        loading.addEventListener("onAniEvt2", function () {
            //   if (
            //     location.href.indexOf(".html") < 0 ||
            //     location.href.indexOf("index.html") > 0 ||
            //     typeof HOMEPAGE != "undefined"
            //   ) {
            //     if (!window.ISWAP) {
            //       $(".loading-bg2").fadeIn(800, function () {
            //         loading.playCarAni();
            //       });
            //     }
            //   }
        });
        // 汽车动画完成事件:onAniEvt3
        loading.addEventListener("onAniEvt3", function () {
            // 只有首页会使用
            // 要初始化页面啦
            initPage();
        });
    } else {
        loading_page_fun(100);
        // 要初始化页面啦
        initPage();
        // jiqiren();
    }
});
window.jiqiren = jiqiren;
function jiqiren() {
    setTimeout(function () {
        $("#rbt-wrap").empty();
        var rbt = initRbt(document.getElementById("rbt-wrap"));
        // 缩放机器人
        rbt.rbtGrp.setAttribute("style", "transform: scale(" + 0.6 + ");");
        // 播放欢迎弹窗
        // rbt.playPop();
        var hongqi_tag;
        if (loadingStorage != "true") {
            // rbt.playPop();
            sessionStorage.setItem("loading", "true");
            hongqi_tag = localStorage.getItem("hongqi_tag");
        } else {
            hongqi_tag = false;
        }

        rbt.start(hongqi_tag); // 播放出场动画  false否 true 是
    }, 2000);
}

// 重写alert()
function alert(text) {
    var tpl =
        '<div class="g-mask pointer-events-none d-middle-wrap">' +
        '<span class="g-tip-wrap">' +
        text +
        "</span>" +
        "</div>";
    $(tpl).appendTo($("body"));
    setTimeout(function () {
        $(".g-mask").remove();
        // $(".g-mask").one("click", function(e) {
        //     e.stopPropagation();
        //     $(".g-mask").remove();
        // });
    }, 4000);
}
// 更改图
var changImgSrc = function () {
    var WinWidth = window.WINDOW_WIDTH;
    var srcType = !window.ISWAP ? "pcsrc" : "msrc";
    $("body")
        .find("img")
        .each(function (i, e) {
            if ($(e).parents(".cti-background")) {
                $(e)
                    .parents(".cti-background")
                    .css("background-image", "url(" + $(e).attr(srcType) + ")");
            }
            var imgSrc = $(e).attr(srcType);
            if (imgSrc) {
                $(e).attr("src", imgSrc);
            }
        });
};
// 重置图片高度
var resetPicHeiLock = false;
var resetImgHeight = function () {
    var WinWidth = window.WINDOW_WIDTH;
    var type = !window.ISWAP ? "pimgh" : "mimgh";
    var initWidth = !window.ISWAP ? 1920 : 750;
    $("body")
        .find(".reset-img-height")
        .each(function (i, e) {
            var imgH = Number($(e).attr(type));
            if (imgH) {
                $(e).height(WinWidth / (initWidth / imgH));
            }
        });
    if (!resetPicHeiLock) {
        resetPicHeiLock = true;
        setTimeout(function () {
            picOffset();
            resetPicHeiLock = false;
        }, 1000);
    }
};
// 获取锚点
function checkUrl() {
    var i = window.location.hash.replace(/#/g, "");
    return $.trim(i);
}
// // 设置cookie
function getCookie(name) {
    var arr,
        reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if ((arr = document.cookie.match(reg))) {
        return unescape(arr[2]);
    } else {
        return null;
    }
}
// //cookie复选框
// $(".category-item .arrow").click(function () {
//   var _this = $(this).children().attr("class");
//   if (_this == "arrow_down") {
//     $(this).children().removeClass("arrow_down").addClass("arrow_up");
//     $(this).siblings(".consent-list").removeClass("hide");
//   } else {
//     $(this).children().removeClass("arrow_up").addClass("arrow_down");
//     $(this).siblings(".consent-list").addClass("hide");
//   }
// });
// $(".parent_not").click(function () {
//   var _chirldren = $(this)
//     .parents(".category-item")
//     .children(".consent-list")
//     .children()
//     .children()
//     .children("div")
//     .attr("class");
//   if (_chirldren == "sign_not") {
//     $(this)
//       .parents(".category-item")
//       .children(".consent-list")
//       .children()
//       .children()
//       .children("div")
//       .addClass("background");
//     $(this).addClass("background");
//   } else {
//     $(this)
//       .parents(".category-item")
//       .children(".consent-list")
//       .children()
//       .children()
//       .children("div")
//       .removeClass("background");
//     $(this).removeClass("background");
//   }
// });
// var sign_arr = [];
// $(".consent-item .sign_not").click(function (e) {
//   var _class = $(this).attr("class").indexOf("background");
//   var _index = $(this).attr("name");
//   sign_arr.push(_index);
//   if (sign_arr.length == 2) {
//     $(this)
//       .parents(".category-item")
//       .children()
//       .children(".parent_not")
//       .removeClass("sign_index")
//       .addClass("sign_background");
//     sign_arr.shift();
//     console.log(sign_arr);
//   } else if (sign_arr.length < 2) {
//     $(this)
//       .parents(".category-item")
//       .children()
//       .children(".parent_not")
//       .removeClass("sign_not")
//       .addClass("sign_index");
//   } else {
//     sign_arr.pop();
//     $(this)
//       .parents(".category-item")
//       .children()
//       .children(".parent_not")
//       .removeClass()
//       .addClass("sign_not");
//   }
//   if (_class == -1) {
//     $(this).addClass("background");
//   } else {
//     $(this).removeClass("background");
//   }
// });
// $(".consent-item>button").click(function () {
//   var text = $(this).siblings("span").html();
//   console.log(text);
//   $(".d-flag").fadeIn(400);
// });
// $(".d-close").click(function () {
//   $(".d-flag").fadeOut(300);
// });
// //cookie复选框end

// // 同意隐私政策
// $(".privacy_agree").click(function () {
//   localStorage.setItem("privacy", "1");
//     // 同意全部cookie设置
//     localStorage.setItem("cookies",JSON.stringify({
//         "bing":true,
//         "google":true,
//         "huanxin":true,
//     }));
//     window.setCookie()
//   $(".agree").hide();
// });
// $(".save_up").click(function () {
//   // 配置项


//   window.setCookie()
//   $(".agree").hide();
// });
// $(".privacy_agree").click(function () {
//   // 配置项
//   localStorage.setItem("cookies",JSON.stringify({
//     "bing":true,
//     "google":true,
//     "huanxin":true,
// }));
//   window.setCookie()
//   $(".agree").hide();
// });

// //   设置cookie
// $(".set_up").click(function () {
//   $(".set_up_mask").show();
// });
// $(".set_up_btn").click(function () {
//   $(".set_up_mask").hide();
// });
// $(".set_up_close").click(function () {
//   $(".set_up_mask").hide();
// });
// $(".arrow_detail").click(function () {
//   $(".set_up_mask").hide();
// });
// if (!localStorage.getItem("token")) {
//   $(".training-menu").hide();
//   $(".login-wrap").show();
// } else {
//   $(".training-menu").show();
//   $(".login-wrap").hide();
// }
$(function () {
    $(window)
        .resize(function () {
            window.WINDOW_WIDTH = $(window).width();
            window.WINDOW_HEIGHT = $(window).height();
            window.ISWAP = window.WINDOW_WIDTH < 750;
            window.isWAP768 = window.WINDOW_WIDTH <= 768;
            // 更改图片
            changImgSrc();
            // 重置图片高度
            resetImgHeight();
            // 无banner单独处理
            $(".cti-event-detail,.cti-leaving-msg").css({
                "padding-top": $("#cti-header").height(),
            });
            $(".menu-secondlevel-item-wrap").hover(
                function () { },
                function () {
                    if (!window.isWAP768) {
                        if ($(".menu-secondlevel-item-wrap").hasClass("act")) {
                            $("body").trigger("click");
                        }
                    }
                }
            );
            if (!window.isWAP768) {
                var imgSize = $(window).width() / 1920;
                $("#loading-wrap").css({
                    transform: "scale(" + imgSize + ")",
                    "transform-origin": " 0 0",
                    height: $(window).height() + 1080 * imgSize,
                });
            } else {
                var imgSize = $(window).height() / 1080;
                $("#loading-wrap").css({
                    transform: "scale(" + imgSize + ") translateX(-50%)",
                    "transform-origin": " 0 0",
                });
            }
        })
        .resize();
});
// 二级导航事件
function secondlevelEvents() {
    $(".secondlevel-item-title")
        .unbind("click")
        .click(function () {
            $("#cti-header .menu-icon").trigger("click");
        });
}
// 隐藏导航
function hideNav() {
    if (window.isWAP768) {
        $("#cti-header").stop().removeClass("show");
        $("body").removeClass("overflow-hidden-wrap");
        $(".menu-secondlevel-item-wrap").removeClass("act");
        $("#cti-header .menu-wrap").stop().fadeOut();
    }
}
// 弹出视频或者图片
window.global_popup = function (type, src, poster) {
    if (type == "data") {
        typeName = $(src).attr("data-type");
        srcPath = $(src).attr("data-src");
        posterPath = $(src).attr("data-poster");
    } else {
        typeName = type;
        srcPath = src;
    }
    var arr = srcPath.split("/");
    arr.shift();
    arr.shift();
    arr.shift();
    arr.shift();
    arr.push();
    var res_path = arr.join("/");
    if (res_path == "") {
        alert("Coming soon!");
        return;
    }
    var html =
        typeName == "video" ?
            '<video src="' +
            (srcPath || "https://www.hongqi-auto.com/storage/videos/cartype.mp4") +
            '" controls="controls" autoplay poster="' +
            poster +
            '"></video>' :
            '<img src="' + srcPath + '" />';

    var tpl =
        '<div class="g-mask g-popup">' +
        '<div class="iconfont iconclose1"></div>' +
        '<div class="ele-wrap">' +
        html +
        "</div>" +
        "</div>";
    $(tpl).appendTo($("body"));
    // setTimeout(function() {
    if (typeName != "video") {
        loadImage(srcPath, function (e) {
            $(".g-popup").find("img").addClass("act");
        });
    }
    $(".g-popup").addClass("act");
    // }, 50)
};
// 时间格式 -.
var formatTime = function (date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var second = date.getSeconds();
    // return [year, month, day].map(formatNumber).join('/') + ' ' + [hour, minute, second].map(formatNumber).join(':')
    return (
        [year, month].map(formatNumber).join("-") + "." + [day].map(formatNumber)
    );
};
var formatNumber = function (n) {
    n = n.toString();
    return n[1] ? n : "0" + n;
};

// 获取标准时间
function getTime_normal(time) {
    Date.prototype.format = function (mask) {
        var d = this;

        var zeroize = function (value, length) {
            if (!length) length = 2;

            value = String(value);

            for (var i = 0, zeros = ""; i < length - value.length; i++) {
                zeros += "0";
            }

            return zeros + value;
        };
        return mask.replace(
            /"[^"]*"|'[^']*'|\b(?:d{1,4}|m{1,4}|M{1,4}|yy(?:yy)?|([hHMstT])\1?|[lLZ])\b/g,
            function ($0) {
                switch ($0) {
                    case "d":
                        return d.getDate();

                    case "dd":
                        return zeroize(d.getDate());

                    case "ddd":
                        return ["Sun", "Mon", "Tue", "Wed", "Thr", "Fri", "Sat"][
                            d.getDay()
                            ];

                    case "dddd":
                        return [
                            "Sunday",
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday",
                        ][d.getDay()];

                    case "M":
                        return d.getMonth() + 1;

                    case "MM":
                        return zeroize(d.getMonth() + 1);

                    case "MMM":
                        return [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec",
                        ][d.getMonth()];

                    case "MMMM":
                        return [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ][d.getMonth()];

                    case "yy":
                        return String(d.getFullYear()).substr(2);

                    case "yyyy":
                        return d.getFullYear();

                    case "h":
                        return d.getHours() % 12 || 12;

                    case "hh":
                        return zeroize(d.getHours() % 12 || 12);

                    case "H":
                        return d.getHours();

                    case "HH":
                        return zeroize(d.getHours());

                    case "m":
                        return d.getMinutes();

                    case "mm":
                        return zeroize(d.getMinutes());

                    case "s":
                        return d.getSeconds();

                    case "ss":
                        return zeroize(d.getSeconds());

                    case "l":
                        return zeroize(d.getMilliseconds(), 3);

                    case "L":
                        var m = d.getMilliseconds();

                        if (m > 99) m = Math.round(m / 10);

                        return zeroize(m);

                    case "tt":
                        return d.getHours() < 12 ? "am" : "pm";

                    case "TT":
                        return d.getHours() < 12 ? "AM" : "PM";

                    case "Z":
                        return d.toUTCString().match(/[A-Z]+$/);

                    default:
                        return $0.substr(1, $0.length - 2);
                }
            }
        );
    };
    var timeNew = new Date(Number(time));
    var a = timeNew.format("hh:mm TT·MMM dd,yyyy");
    return a;
}
// 获取导航数据
function getNavData() {
    var item = $("#cti-header .menu").find("a");
    item.each(function (i, e) {
        var index = $(e).data("index");
        if (index == 0) {
            ajax_hq({
                type: "get",
                url: "nav/index/0",
                // data: formdata,
                success: function (res) {
                    if (res.code != 200) {
                        return;
                    }
                    var html = "";
                    var car_wrap_html = "";
                    for (var i = 0; i < res.data.length; i++) {
                        html += "<li>" + res.data[i].data.name + "</li>";
                        // 第二层
                        var children = res.data[i].children;
                        for (var j = 0; j < children.length; j++) {
                            if (j == 0) {
                                car_wrap_html += '<div class="swiper-slide flex-wrap-box">';
                            }
                            if (children[j].data.name == "H9") {
                                car_wrap_html +=
                                    '<a href="javascript:void(0)" class="menu-vehicle-item" text="hongqi">' +
                                    '<div class="menu-vehicle-intro">' +
                                    '<div class="menu-vehicle-title">' +
                                    children[j].data.name +
                                    "</div>" +
                                    "</div>" +
                                    '<img src="' +
                                    children[j].data.banner +
                                    '" alt="" class="menu-vehicle-img"  onclick="goH9()"/>' +
                                    "</a>";
                            } else {
                                car_wrap_html +=
                                    '<a href="' +
                                    children[j].data.url +
                                    '" class="menu-vehicle-item" text="hongqi">' +
                                    '<div class="menu-vehicle-intro">' +
                                    '<div class="menu-vehicle-title">' +
                                    children[j].data.name +
                                    "</div>" +
                                    "</div>" +
                                    '<img src="' +
                                    children[j].data.banner +
                                    '" alt="" class="menu-vehicle-img" />' +
                                    "</a>";
                            }

                            if (j == children.length - 1) {
                                car_wrap_html += "</div>";
                            }
                        }
                    }
                    $(".menu-vehicles-item-wrap .swiper-wrapper").append(car_wrap_html); // 三级
                    $(".menu-vehicles-tab").html(html); // 二级
                },
            });
        }
        if (index == 1) {
            ajax_hq({
                type: "get",
                url: "nav/index/1",
                // data: formdata,
                success: function (res) {
                    if (res.code != 200) {
                        return;
                    }
                    var html =
                        '<div class="secondlevel-item-title secondlevel-special">networks</div><ul class="menu-text-item ff-ul">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<li><a style="background-image:url(' +
                            res.data[i].data.banner +
                            ')" href="' +
                            res.data[i].data.url +
                            ' " text="hongqi"><span>' +
                            res.data[i].data.name +
                            "</span></a></li>";
                    }

                    html +=
                        '</ul><div class="networks-nav-img networks-nav-swiper"><div class="swiper-container newswiper" id="newswiper"><div class="swiper-wrapper">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<div class="swiper-slide">' +
                            '<a href="' +
                            res.data[i].data.url +
                            '" class="menu-item-a" text="hongqi">' +
                            '<img  src="' +
                            res.data[i].data.banner +
                            '" alt="">' +
                            "</a>" +
                            "</div>";
                    }
                    html += "</div></div></div>";
                    //  $(".ff-ul").html(html);
                    $(".menu-network-wrap").html(html);

                    // networks 二级导航
                    swiper_generator(["networks-nav-swiper"]);
                    //  $(".menu-network-wrap ul").delegate("li", "mouseover", function() {
                    $(".menu-network-wrap").delegate("li", "mouseover", function () {
                        var _i = $(this).index() + 1;
                        window["networks-nav-swiper"].slideTo(_i, 0);
                        // // 隐藏导航
                        // hideNav();
                    });
                    // 二级导航事件
                    secondlevelEvents();
                },
            });
        }
        if (index == 2) {
            ajax_hq({
                type: "get",
                url: "nav/index/2",
                // data: formdata,
                success: function (res) {
                    if (res.code != 200) {
                        return;
                    }
                    //  var html = "";
                    var html =
                        '<div class="secondlevel-item-title secondlevel-special">events</div><ul class="menu-text-item ff-li">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<li><a style="background-image:url(' +
                            res.data[i].data.banner +
                            ')" href="' +
                            res.data[i].data.url +
                            '" text="hongqi"><span>' +
                            res.data[i].data.name +
                            "</span></a></li>";
                    }

                    html +=
                        '</ul><div class="networks-nav-img events-nav-swiper"> ' +
                        '<div class="swiper-container newswiper" id="newswiper">' +
                        '<div class="swiper-wrapper">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<div class="swiper-slide"> ' +
                            '<a href="' +
                            res.data[i].data.url +
                            '" class="menu-item-a" text="hongqi">' +
                            '<img src="' +
                            res.data[i].data.banner +
                            '" alt="">' +
                            "</a>" +
                            "</div>";
                    }
                    html += "</div></div></div>";
                    //  $(".ff-li").html(html);
                    $(".menu-event-wrap").html(html);
                    // networks 二级导航
                    swiper_generator(["events-nav-swiper"]);
                    //  $(".menu-event-wrap ul").delegate("li", "mouseover", function() {
                    $(".menu-event-wrap").delegate("li", "mouseover", function () {
                        var _i = $(this).index() + 1;
                        window["events-nav-swiper"].slideTo(_i, 0);
                        // // 隐藏导航
                        // hideNav();
                    });
                    // 二级导航事件
                    secondlevelEvents();
                },
            });
        }
        if (index == 3) {
            ajax_hq({
                type: "get",
                url: "nav/index/3",
                // data: formdata,
                success: function (res) {
                    if (res.code != 200) {
                        return;
                    }
                    var html =
                        '<div class="secondlevel-item-title secondlevel-special">about hongqi</div><ul class="menu-text-item idea-html">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<li ><a style="background-image:url(' +
                            res.data[i].data.banner +
                            ')" href="' +
                            res.data[i].data.url +
                            '"><span>' +
                            res.data[i].data.name +
                            "</span></a></li>";
                    }
                    html +=
                        '</ul><div class="networks-nav-img ideal-nav-swiper"><div class="swiper-container newswiper" id="newswiper"><div class="swiper-wrapper">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<div class="swiper-slide">' +
                            '<a href="' +
                            res.data[i].data.url +
                            '" class="menu-item-a">' +
                            '<img  src="' +
                            res.data[i].data.banner +
                            '" alt="">' +
                            "</a>" +
                            "</div>";
                    }
                    html += "</div></div></div>";
                    $(".menu-ideal-wrap").html(html);
                    // networks 二级导航
                    swiper_generator(["ideal-nav-swiper"]);
                    //  $(".menu-ideal-wrap ul").delegate("li", "mouseover", function() {
                    $(".menu-ideal-wrap").delegate("li", "mouseover", function () {
                        var _i = $(this).index() + 1;
                        window["ideal-nav-swiper"].slideTo(_i, 0);
                        // 隐藏导航
                        // hideNav();
                    });
                    // 二级导航事件
                    secondlevelEvents();
                },
            });
        }
        if (index == 4) {
            ajax_hq({
                type: "get",
                url: "nav/index/4",
                // data: formdata,
                success: function (res) {
                    if (res.code != 200) {
                        return;
                    }
                    var html =
                        '<div class="secondlevel-item-title secondlevel-special">TRAINING Center</div><ul class="menu-text-item training-html">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<li><a style="background-image:url(' +
                            res.data[i].data.banner +
                            ')" href="' +
                            res.data[i].data.url +
                            '"><span>' +
                            res.data[i].data.name +
                            "</span></a></li>";
                    }
                    html +=
                        '</ul><div class="networks-nav-img training-nav-swiper"> <div class="swiper-container newswiper" id="newswiper"><div class="swiper-wrapper">';
                    for (var i = 0; i < res.data.length; i++) {
                        html +=
                            '<div class="swiper-slide"> ' +
                            '<a href="' +
                            res.data[i].data.url +
                            '" class="menu-item-a">' +
                            '<img  src="' +
                            res.data[i].data.banner +
                            '" alt="">' +
                            "</a>" +
                            "</div>";
                    }
                    html += "</div></div></div>";
                    $(".menu-training-wrap").html(html);
                    // networks 二级导航
                    swiper_generator(["training-nav-swiper"]);
                    //  $(".menu-training-wrap ul").delegate("li", "mouseover", function() {
                    $(".menu-training-wrap").delegate("li", "mouseover", function () {
                        var _i = $(this).index() + 1;
                        window["training-nav-swiper"].slideTo(_i, 0);
                        // 隐藏导航
                        // hideNav();
                    });
                    // 二级导航事件
                    secondlevelEvents();
                },
            });
        }
        // if (index == 5) {
        //   ajax_hq({
        //     type: "get",
        //     url: "nav/index/6",
        //     // data: formdata,
        //     success: function (res) {
        //       if (res.code != 200) {
        //         return;
        //       }
        //       var html =
        //         '<div class="secondlevel-item-title secondlevel-special">CONTACT US</div><ul class="menu-text-item training-html">';
        //       for (var i = 0; i < res.data.length; i++) {
        //         html +=
        //           '<li><a style="background-image:url(' +
        //           res.data[i].data.banner +
        //           ')" href="' +
        //           res.data[i].data.url +
        //           '"><span>' +
        //           res.data[i].data.name +
        //           "</span></a></li>";
        //       }
        //       html += '</ul></div>'
        //       // html +=
        //       //   '</ul><div class="networks-nav-img training-nav-swiper"> <div class="swiper-container newswiper" id="newswiper"><div class="swiper-wrapper">';
        //       // for (var i = 0; i < res.data.length; i++) {
        //       //   html +=
        //       //     '<div class="swiper-slide"> ' +
        //       //     '<a href="' +
        //       //     res.data[i].data.url +
        //       //     '" class="menu-item-a">' +
        //       //     '<img  src="' +
        //       //     res.data[i].data.banner +
        //       //     '" alt="">' +
        //       //     "</a>" +
        //       //     "</div>";
        //       // }
        //       // html += "</div></div></div>";
        //       $(".menu-contact-wrap").html(html);
        //       // networks 二级导航

        //       //  $(".menu-contact-wrap ul").delegate("li", "mouseover", function() {
        //       $(".menu-contact-wrap").delegate("li", "mouseover", function () {
        //         var _i = $(this).index() + 1;

        //         // 隐藏导航
        //         // hideNav();
        //       });
        //       // 二级导航事件
        //       secondlevelEvents();
        //     },
        //   });
        // }

    });
}

function download(url, name) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob"; // 返回类型blob
    xhr.onload = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var blob = this.response;
            // 转换一个blob链接
            var u = window.URL.createObjectURL(new Blob([blob]));
            var a = document.createElement("a");
            a.download = name;
            a.href = u;
            a.style.display = "none";
            document.body.appendChild(a);
            a.click();
            a.remove();
        }
    };
    xhr.send();
}
$(function () {
    $("body.overflow").addClass("overflow-hidden-wrap");
    // tab切换点击 可以通用
    $(".act-switch li,.act-switch .act-switch-item").click(function () {
        if ($(this).hasClass("act")) {
            return;
        }
        $(this).addClass("act").siblings().removeClass("act");
    });
    //   select下拉点击事件;
    var tag = "off";
    $(".select-wrap dt").click(function (e) {
        var flag = null;
        if ($(this).parents(".select-wrap").hasClass("open")) {
            flag = true;
        }
        $(".select-wrap").removeClass("open");
        if (flag) {
            $(this).parents(".select-wrap").removeClass("open");
        } else {
            $(this).parents(".select-wrap").addClass("open");
        }
        // $(this).parents('.select-wrap').toggleClass('open')
        // if (tag == "off") {
        //     $(".select-wrap").removeClass("open");
        //     $(this).parents("dl").toggleClass("open");
        //     tag = "on";
        // } else {
        //     $(".select-wrap").removeClass("open");
        //     tag = "off";
        // }
        e.stopPropagation();
    });

    $(".select-wrap dt a").click(function (e) {
        e.stopPropagation();
    });
    $(".language-wrap").delegate(".item", "click", function () {
        alert("Coming soon!");
        return;
    });
    $(".select-wrap dd").delegate(".item", "click", function () {
        // $('.select-wrap dd .item').click(function() {
        var a = $(this).attr("href");
        if (a == "javascript:;") {
            return;
        } else {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");
        }
        $(this).parents("dl").toggleClass("open");
        tag = "off";
        var code = $(this).attr("data-code");
        $(this)
            .parents(".select-wrap")
            .find("dt")
            .html($(this).html())
            .attr("data-code", code);
    });

    // 菜单点击
    //  $(".menu-icon,.menu-wrap").click(function() {
    // 只有手机端会有
    $("#cti-header .menu-icon").click(function (e) {
        e.stopPropagation();
        //  $(".menu-wrap").stop().toggleClass("show");
        // $("#cti-header").stop().toggleClass("show");
        // $("#cti-header .menu-wrap").stop().fadeToggle();



        if ($("#cti-header").hasClass("show")) {

            if ($(".menu-secondlevel-item-wrap.act").length > 0) {
                $(".menu-secondlevel-item-wrap").removeClass("act");
                $(".secondlevel-item").removeClass("act")
                $(".menu").stop().fadeIn();

            } else {
                $("#cti-header").stop().removeClass("show");
                $("body").removeClass("overflow-hidden-wrap");
                $(".menu-secondlevel-item-wrap").removeClass("act");
                $(".secondlevel-item").removeClass("act")
                $("#cti-header .menu-wrap").stop().fadeOut();
            }
        } else {
            $(".menu").stop().fadeIn();
            $("#cti-header").stop().addClass("show");
            $("body").addClass("overflow-hidden-wrap");
            $("#cti-header .menu-wrap").stop().fadeIn();
        }
    });
    // 二级导航的减号 点击隐藏二级导航
    // $('.menu-secondlevel-item-wrap').delegate('.secondlevel-item-title', 'click', function() {

    // togglefade
    $(".show-switch").click(function () {
        $(this).toggleClass("act");
    });

    // 关闭视频图片弹层
    $("body").delegate(".iconclose1", "click", function () {
        $("body").find(".g-popup").removeClass("act").delay(1000).remove();
    });
    $(".menu-secondlevel-item-wrap").click(function (e) {
        e.stopPropagation();
    });
    $(".menu-secondlevel-item-wrap").hover(
        function () { },
        function () {
            if (!window.ISWAP) {
                if ($(".menu-secondlevel-item-wrap").hasClass("act")) {
                    $("body").trigger("click");
                }
            }
        }
    );

    // 底部按钮
    $("#cti-footer .button").click(function () {
        if (!$(".agree-wrap .agree-icon").hasClass("act")) {
            alert("Please accept the privacy policy!");
        } else if ($(".email-wrap .email").val().length < 5) {
            alert("Please fill in the correct email address, thank you!");
        } else {
            // 订阅接口
            var $box = $("#cti-footer");
            var params = {
                email: $box.find(".email").val(),
            };
            // if (!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(
            if (!REG_EMAIL.test(params.email)) {
                // if (!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/.test(
                //         params.email
                //     )) {
                alert("Please fill in the correct email address！");
                return;
            }
            var formdata = new FormData();
            formdata.append("email", params.email);
            ajax_formData({
                type: "post",
                url: "subscribe",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.code == 200) {
                        $box.find(".email").val("");
                        $("#cti-footer .agree-icon").trigger("click");
                        alert("Congratulations, successful subscription!");
                    } else if (data.msg) {
                        alert(data.msg);
                    }
                },
            });
        }
    });

    // 二級導航
    swiper_generator(["menu-vehicles-item-wrap"]);
    $(".menu-vehicles-tab").delegate("li", "click", function () {
        var _i = $(this).index();
        window["menu-vehicles-item-wrap"].slideTo(_i, 0);

        // if (_i == 2) {
        //   // alert("Coming soon!");
        // } else {
        //   // window["menu-vehicles-item-wrap"].slideTo(_i, 0);
        // }
    });

    // 關閉
    $(".menu-close").click(function (e) {
        e.stopPropagation();
        $(".menu-secondlevel-item-wrap").removeClass("act");
    });
    // 展開二級菜單  hover

    // $(".has-secondlevel").hover(function (e) {
    $(".menu .item").on("mouseenter click",  function (e) {
        e.stopPropagation();
        // var _i = Number($(this).attr("data-index"));
        var _i = $(this).attr("data-index");
        console.log(_i)
        if (_i != undefined) {
            var leftVal = ($(this).offset().left / window.WINDOW_WIDTH) * 100;
            $(".secondlevel-item")
                .eq(_i)
                .trigger("click")
                .find(".menu-text-item")
                // .css("margin-left", leftVal + "%");
                // .css("margin-left", "14.5%");
                .css("margin-left", "15.5%");
            if (_i == 0) {
                // 如果展开的是车型
                $(".menu-vehicles-tab").find("li").eq(0).trigger("click");
                if (window["menu-vehicles-item-wrap"]) {
                    window["menu-vehicles-item-wrap"].update();
                }
            }
            $(".menu-secondlevel-item-wrap").addClass("act");
            if (window.isWAP768) {
                $(".menu").stop().fadeOut();
            }
            setTimeout(function () {
                $("body").one("click", function () {
                    $(".menu-close").trigger("click");
                    $(".menu").stop().fadeIn();
                });
            }, 100);
        } else {
            $(".secondlevel-item")
                .eq(_i)
                .trigger("click")
                .find(".menu-text-item")
                .css("margin-left", "15.5%");
            $(".menu-secondlevel-item-wrap").removeClass("act");
        }
    })
    // $(".item").hover(

    //   function (e) {
    //   e.stopPropagation();
    //   // var _i = Number($(this).attr("data-index"));
    //   var _i = $(this).attr("data-index");
    //   console.log(_i)
    //   if (_i != undefined) {
    //     var leftVal = ($(this).offset().left / window.WINDOW_WIDTH) * 100;
    //     $(".secondlevel-item")
    //       .eq(_i)
    //       .trigger("click")
    //       .find(".menu-text-item")
    //       // .css("margin-left", leftVal + "%");
    //       // .css("margin-left", "14.5%");
    //       .css("margin-left", "15.5%");
    //     if (_i == 0) {
    //       // 如果展开的是车型
    //       $(".menu-vehicles-tab").find("li").eq(0).trigger("click");
    //       if (window["menu-vehicles-item-wrap"]) {
    //         window["menu-vehicles-item-wrap"].update();
    //       }
    //     }
    //     $(".menu-secondlevel-item-wrap").addClass("act");
    //     if (window.isWAP768) {
    //       $(".menu").stop().fadeOut();
    //     }
    //     setTimeout(function () {
    //       $("body").one("click", function () {
    //         $(".menu-close").trigger("click");
    //         $(".menu").stop().fadeIn();
    //       });
    //     }, 100);
    //   } else {
    //     $(".secondlevel-item")
    //       .eq(_i)
    //       .trigger("click")
    //       .find(".menu-text-item")
    //       .css("margin-left", "15.5%");
    //     $(".menu-secondlevel-item-wrap").removeClass("act");
    //   }
    // });

    // 二级菜单包裹
    $(".secondlevel-item").click(function (e) {
        e.stopPropagation();
    });
    // 点击登录
    $(".login-wrap").click(function () {
        var src = window.location.href;
        localStorage.setItem("Url", src);
        location.href = "/pages/login/login.html";
    });

    // $(".menu-text-item li").click(function() {
    // $(".secondlevel-item").delegate("li", "click", function() {
    $(".secondlevel-item").delegate("li", "click", function () {
        // 点击隐藏二级导航
        // $("body").trigger("click");
        if (!$(".menu-vehicles-wrap").hasClass("act") && window.isWAP768) {
            $("#cti-header").stop().removeClass("show");
            $("body").removeClass("overflow-hidden-wrap");
            $(".menu-secondlevel-item-wrap").removeClass("act");
            $("#cti-header .menu-wrap").stop().fadeOut();
        }

        // if ($(".menu-secondlevel-item-wrap.act").length > 0) {
        //     $(".menu-secondlevel-item-wrap").removeClass("act");
        //     $(".menu").stop().fadeIn();

        // } else {
        //     $("#cti-header").stop().removeClass("show");
        //     $("body").removeClass("overflow-hidden-wrap");
        //     $(".menu-secondlevel-item-wrap").removeClass("act");
        //     $("#cti-header .menu-wrap").stop().fadeOut();
        // }
        // $("#cti-header").stop().removeClass("show");
        // $("body").removeClass("overflow-hidden-wrap");
        // $(".menu-secondlevel-item-wrap").removeClass("act");
        // $("#cti-header .menu-wrap").stop().fadeOut();
    });
    var ua = navigator.userAgent;
    var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
        isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
        isAndroid = ua.match(/(Android)\s+([\d.]+)/),
        isMobile = isIphone || isAndroid;
    $(".secondlevel-item").delegate(".menu-text-item li", "click", function () {
        var nav_name = $(this).text();
        if (isMobile) {
            gtag("event", "<Mobile_nav_进入" + nav_name + "页面>", {
                event_category: "click",
                event_label: "Mobile_" + nav_name + "",
            });
        } else if (ipad) {
            gtag("event", "<ipad_nav_进入" + nav_name + "页面>", {
                event_category: "click",
                event_label: "ipad_" + nav_name + "",
            });
        } else {
            gtag("event", "<PC_nav_进入" + nav_name + "页面>", {
                event_category: "click",
                event_label: "PC_" + nav_name + "",
            });
        }
    });
    $(".act-switch").delegate("li", "click", function () {
        if ($(this).hasClass("act")) {
            return;
        }
        $(this).addClass("act").siblings().removeClass("act");
    });

    // 监听导航点击事件
    $(".act-switch-item").on("click", "li a", function () {
        var data = $(this).attr("href");
        if (data == "javascript:") {
            alert("Coming soon!");
        }
    });
    // 一级导航
    $(".menu").on("click", "a", function () {
        if ($(this).attr("data-index")) { } else {
            var data = $(this).attr("href");
            if (data == "javascript:") {
                alert("Coming soon!");
            }
        }
    });
    $(".menu-ideal-wrap").on("click", "li a", function () {
        var car_wrap = $(this).attr("href");
        if (car_wrap == "javascript:") {
            alert("Coming soon!");
        }
    });
    var ua = navigator.userAgent;
    var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
        isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
        isAndroid = ua.match(/(Android)\s+([\d.]+)/),
        isMobile = isIphone || isAndroid;
    $(".menu-vehicles-item-wrap").on("click", ".menu-vehicle-item", function () {
        var model_url = $(this).attr("href");
        if (model_url == "javascript:") {
            alert("Coming soon!");
        }
        var model_name = $(this).children().children(".menu-vehicle-title").text();
        if (isMobile) {
            gtag("event", "<Mobile_nav_进入" + model_name + "车型页面>", {
                event_category: "click",
                event_label: "Mobile_" + model_name + "",
            });
        } else if (ipad) {
            gtag("event", "<ipad_nav_进入" + model_name + "车型页面>", {
                event_category: "click",
                event_label: "ipad_" + model_name + "",
            });
        } else {
            gtag("event", "<pc_nav_进入" + model_name + "车型页面>", {
                event_category: "click",
                event_label: "pc_" + model_name + "",
            });
        }
    });
    $(".more-details").on("click", "a", function () {
        var data = $(this).attr("href");
        if (data == "javascript:") {
            alert("Coming soon!");
        }
    });
    $(".hongqi-ideal").on("click", ".column-item a", function () {
        var src = $(this).attr("href");
        if (src == "javascript:") {
            alert("Coming soon!");
        }
    });
    $(".privacy-btn").click(function () {
        $(".privacy_popup").show();
    });
    $(".privacy .close").click(function () {
        $(".privacy_popup").hide();
    });
    // 隐藏机器人
    $(".rbt-hide-icon").click(function () {
        // $('.rbt-box').fadeToggle();
        // $('.mini-rbt').toggleClass('act');
        $(".rbt-box").addClass("d-pcShow act");
        $(".mini-rbt").addClass("d-wapShow act");
    });
    $(".mini-rbt").click(function () {
        // $('.rbt-box').fadeToggle();
        // $('.mini-rbt').toggleClass('act');
        // $("#kefu").click();
        window.location.href = "https://www.hongqi-auto.com/3D/abbr/index.html";
    });
    // $(".agree_privacy_btn").click(function() {
    //     $(".privacy_popup").show();
    // });

    // gotop
    $(".go-top").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 1000);
    });
});

// 监听页面滚动显示隐私弹窗
$(window).scroll(function () {
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (scrollTop > 200) {
        //  console.log("执行了");
        if (!localStorage.getItem("cookies") && location.href.indexOf('Privacy-statement.html') == -1) {
            $(".agree").delay().fadeIn();
        } else {
            $(".agree").hide();
        }
    }
});

var ua = navigator.userAgent;
var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
    isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
    isAndroid = ua.match(/(Android)\s+([\d.]+)/),
    isMobile = isIphone || isAndroid;

if (isMobile) {
    function toogle(th) {
        var ele = $(th).children(".move");
        if (ele.attr("data-state") == "on") {
            ele.animate({
                    left: "7vw",
                },
                300,
                function () {
                    ele.attr("data-state", "off");
                }
            );
            $(th).removeClass("on").addClass("off");
            $("#only").click();
        } else if (ele.attr("data-state") == "off") {
            ele.animate({
                    left: "4vw",
                },
                300,
                function () {
                    $(this).attr("data-state", "on");
                }
            );
            $(th).removeClass("off").addClass("on");
            $("#only").click();
        }
    }

    function btn(th) {
        var ele = $(th).children(".move");
        if (ele.attr("data-state") == "on") {
            ele.animate({
                    left: "0",
                },
                300,
                function () {
                    ele.attr("data-state", "red_off");
                }
            );
            $(th).removeClass("on").addClass("red_off");
        } else if (ele.attr("data-state") == "red_off") {
            ele.animate({
                    left: "4vw",
                },
                300,
                function () {
                    $(this).attr("data-state", "on");
                }
            );
            $(th).removeClass("red_off").addClass("on");
        }
    }
} else {
    function toogle(th) {
        var ele = $(th).children(".move");
        if (ele.attr("data-state") == "on") {
            ele.animate({
                    left: "1.2vw",
                },
                300,
                function () {
                    ele.attr("data-state", "off");
                }
            );
            $(th).removeClass("on").addClass("off");
            $("#only").click();
        } else if (ele.attr("data-state") == "off") {
            ele.animate({
                    left: "2.3vw",
                },
                300,
                function () {
                    $(this).attr("data-state", "on");
                }
            );
            $(th).removeClass("off").addClass("on");
            $("#only").click();
        }
    }

    function btn(th) {
        var ele = $(th).children(".move");
        if (ele.attr("data-state") == "on") {
            ele.animate({
                    left: "0",
                },
                300,
                function () {
                    ele.attr("data-state", "red_off");
                }
            );
            $(th).removeClass("on").addClass("red_off");
        } else if (ele.attr("data-state") == "red_off") {
            ele.animate({
                    left: "2.3vw",
                },
                300,
                function () {
                    $(this).attr("data-state", "on");
                }
            );
            $(th).removeClass("red_off").addClass("on");
        }
    }
}

(function bindAnalystic() {
    let items = $(".menu > .item");
    items.each((i, item) => {
        let navName = item["innerText"];
        item["onclick"] = function () {
            if (isMobile) {
                gtag("event", "<Mobile_nav_" + navName + ">", {
                    event_category: "click",
                    event_label: "<Mobile_nav_" + navName + ">",
                });
            } else if (ipad) {
                gtag("event", "<ipad_nav_" + navName + ">", {
                    event_category: "click",
                    event_label: "<ipad_nav_" + navName + ">",
                });
            } else {
                gtag("event", "<PC_nav_" + navName + ">", {
                    event_category: "click",
                    event_label: "<PC_nav_" + navName + ">",
                });
            }
        };
    });
})();


// 随机跳转H9车型也

function goH9() {
    // AB测试去除全部跳转新页面
    window.open(`${window.location.origin}/pages/cartype/cartype_h9_new.html`, '_self');

    return
    let showH9 = window.sessionStorage.getItem('showH9');
    if (showH9 == "true") {
        window.sessionStorage.setItem("showH9", false)
        window.open(`${window.location.origin}/pages/cartype/cartype_h9_new.html`, '_self');
    } else {
        window.sessionStorage.setItem("showH9", true)
        window.open(`${window.location.origin}/pages/cartype/cartype_h9.html`, '_self');
    }
    return
    let index = Math.round(Math.random())
    if (index == 0) {
        window.open(`${window.location.origin}/pages/cartype/cartype_h9_new.html`, '_self');
    } else {
        window.open(`${window.location.origin}/pages/cartype/cartype_h9.html`, '_self');
    }
}
function goEHs9() {
    // AB测试去除全部跳转新页面
    window.open(`${window.location.origin}/pages/cartype/cartype_E-hs9_new.html`, '_self');
    return
    let showEHS9 = window.sessionStorage.getItem('showEHS9');
    if (showEHS9 == "true") {
        window.sessionStorage.setItem("showEHS9", false)
        window.open(`${window.location.origin}/pages/cartype/cartype_E-hs9_new.html`, '_self');
    } else {
        window.sessionStorage.setItem("showEHS9", true)
        window.open(`${window.location.origin}/pages/cartype/cartype_E-hs9.html`, '_self');
    }
    return
    let index = Math.round(Math.random())
    if (index == 0) {
        window.open(`${window.location.origin}/pages/cartype/cartype_E-hs9_new.html`, '_self');
    } else {
        window.open(`${window.location.origin}/pages/cartype/cartype_E-hs9.html`, '_self');
    }
}

function goHs5() {
    // AB测试去除全部跳转新页面
    window.open(`${window.location.origin}/pages/cartype/cartype_hs5_new.html`, '_self');
    return
    let showHs5 = window.sessionStorage.getItem('showHs5');
    if (showHs5 == "true") {
        window.sessionStorage.setItem("showHs5", false)
        window.open(`${window.location.origin}/pages/cartype/cartype_hs5_new.html`, '_self');
    } else {
        window.sessionStorage.setItem("showHs5", true)
        window.open(`${window.location.origin}/pages/cartype/cartype_hs5.html`, '_self');
    }
}


// 获取所有a标签的跳转属性中含有H9路径的

setTimeout(() => {
    document.querySelectorAll('a').forEach(function (a) {
        try {
            if ((a.attributes["href"].nodeValue).indexOf("pages/cartype/cartype_h9.html") != -1) {
                // a.attr("href","javascript:void(0)")

                a.attributes["href"].nodeValue = "javascript:void(0)"
                a.onclick = function () {

                    goH9()
                    return false
                }

            }
        } catch (error) {

        }
        try {
            if ((a.attributes["href"].nodeValue).indexOf("pages/cartype/cartype_E-hs9.html") != -1) {
                // a.attr("href","javascript:void(0)")
                a.attributes["href"].nodeValue = "javascript:void(0)"
                a.onclick = function () {
                    goEHs9()
                    return false
                }
            }
        } catch (error) {
        }
        try {
            if ((a.attributes["href"].nodeValue).indexOf("pages/cartype/cartype_hs5.html") != -1) {
                a.attributes["href"].nodeValue = "javascript:void(0)"
                a.onclick = function () {
                    goHs5()
                    return false
                }
            }
        } catch (error) {

        }

    })
}, 1000)


setTimeout(()=>{
    // 公用 页面轮播
    console.log("12111")
    var page_banner = new Swiper(".page_banner.swiper-container", {
        loop: true,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        autoHeight: true, //高度随内容变化
        preventClicks: true,
        observer: true, //修改swiper自己或子元素时，自动初始化swiper
        observeParents: true, //修改swiper的父元素时，自动初始化swiper
        paginationClickable: true,
        onInit: function(swiper){
            console.log(swiper)
            const realSlideCount = swiper.slides.length - (swiper.loopedSlides * 2);
            if(realSlideCount==1){

                swiper.stopAutoplay();

            }
        }
    });
},0)


