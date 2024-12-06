// map
var mapFlag = null;
var dataArr = [
  {
    name: "AZERBAIJAN",
    x: 282,
    y: 189,
    title: ["HONGQI - AZERBAIJAN"],
    pic: ["images/loading/d7.jpg"],
    info: [
      "ADDR:Babek Prospekti,21/99, Baku AZ1031, Azerbaijan <br/>TEL:（+994）502104423",
    ],
    btn: true,
    params: "country=31&city=",
  },

  {
    name: "CAMBODIA",
    x: 462,
    y: 356,
    title: ["HONGQI - CAMBODIA"],
    pic: ["images/loading/d6.jpg"],
    info: [
      "ADDR:174k street 105 sangkat tual sangkat khan russet keo phom penh，the Kingdom of Cambodia <br/>TEL:(+855) 0183023967/0183023867",
    ],
    btn: true,
    params: "country=116&city=",
  },
  {
    name: "CHINA",
    x: 490,
    y: 313,
    title: ["HONGQI - CHINA"],
    pic: ["images/loading/d9.jpg"],
    info: [
      "ADDR:澳門青洲工業園南街125號勵澳綜合大樓地下 <br/>TEL:(+853) 28721616",
    ],
    btn: true,
    params: "country=156&city=",
  },
  {
    name: "FRENCH POLYNESIA",
    x: 650,
    y: 350,
    title: ["HONGQI - FRENCH POLYNESIA"],
    pic: ["images/loading/d8.jpg"],
    info: [
      "ADDR:Avenue Georges Clemenceau Mamao BP 4471  98713 Papeete Tahiti French Polynesia <br/>TEL:（+689）40500504",
    ],
    btn: true,
    params: "country=258&city=",
  },
  {
    name: "ISRAEL",
    x: 282,
    y: 189,
    title: ["HONGQI - ISRAEL"],
    pic: ["images/loading/d11.jpg"],
    info: [
      "ADDR:6 Hamagshimim st. Kiriat Matalon,Israel <br/>TEL:（+972）549770202",
    ],
    btn: true,
    params: "country=376&city=",
  },
  {
    name: "Iceland",
    x: 162,
    y: 100,
    title: ["HONGQI - BL ehf."],
    pic: ["images/loading/iceland.jpg"],
    info: [
      "Sævarhöfði 2, 110 Reykjavík, Iceland <br/>TEL:525-8000 ",
    ],
    btn: true,
    params: "country=352&city=",
  },
  {
    name: "Japan",
    x: 597,
    y: 230,
    title: ["HONGQI - Japan"],
    pic: ["images/loading/d12.jpg"],
    info: [
      "1-28-11 Ohama-cho,Amagasaki,Hyogo,661-0022,Japan<br/>TEL:+81-6-6429-8883",
    ],
    btn: true,
    params: "country=392&city=",
  },
  {
    name: "JORDAN",
    x: 200,
    y: 252,
    title: ["HONGQI - JORDAN"],
    pic: ["images/loading/d4.jpg"],
    info: ["ADDR:139 mecca street, Amman Jordan <br/>TEL:(+962) 778000099"],
    btn: true,
    params: "country=400&city=",
  },
  // 隐藏科威特20230705
  // {
  //   name: "KUWAIT",
  //   x: 269,
  //   y: 262,
  //   title: ["AlKhalid Auto Compnany"],
  //   pic: ["images/loading/d16.jpg"],
  //   info: [
  //     "AlRai, Ali Mubarak AlDob street (behind Avenues Mall) <br/>TEL: 1855 155",
  //   ],
  //   btn: true,
  //   params: "country=414&city=",
  // },
  {
    name: "MYANMAR",
    x: 436,
    y: 326,
    title: ["HONGQI - Yangon", "HONGQI - Yangon"],
    pic: ["images/loading/d5.jpg", "images/loading/d5.jpg"],
    info: [
      "ADDR:Block,No.（105,106,107,108,109）Padamyar Street,Thar Du Kan Industrial Zone(4) , Shwe Pyi Thar,Yangon Region, Myanmar",
      "(A/7), Mindhama Road No, Mindhama Housing Mayangone Township, Yangon, Myanmar <br/>TEL:(+95) 9977844888",
    ],
    btn: true,
    params: "country=104&city=",
  },

  {
    name: "Norway",
    x: 157,
    y: 85,
    title: ["HONGQI - Norway"],
    pic: ["images/loading/Now.jpg"],
    info: [
      "ADDR:Østre Aker vei 62, NO-0581 Oslo, Norway  <br/>TEL:(+47)97555253<br/>https://hongqi.no/",
    ],
    btn: true,
    params: "country=578&city=",
  },


  // 菲律宾
  {
    name: "Philippines",
    x: 528,
    y: 328,
    title: ["HONGQI - PHILIPPINES"],
    pic: ["images/loading/d17.jpg"],
    info: [
      "ADDR: GF Asian Century Center, 4th Avenue cor.27th Street, Bonifacio Global City  <br/>TEL:+639178367160<br/>",
    ],
    btn: true,
    params: "country=608&city=",
  },




  {
    name: "QATAR",
    x: 270,
    y: 273,
    title: ["HONGQI - QATAR"],
    pic: ["images/loading/d3.jpg"],
    info: ["ADDR:Doha-Qatar, PO Box 491 Doha, Qatar  <br/>TEL:(+974) 44489943"],
    btn: ["true"],
    params: "country=634&city=",
  },
  {
    name: "Saudi Arabia",
    x: 280,
    y: 326,
    title: [
      "HONGQI-Jeddah",
      "HONGQI-Riyadh",
      "HONGQI-Al Khobar",
      "Al-Madinah Al-Munawarah",
    ],
    // pic: "images/loading/d10.jpg",
    pic: [
      "images/loading/d10.jpg",
      "images/loading/d13.jpg",
      "images/loading/d14.jpg",
      "images/loading/d15.jpg",
    ],
    // info: "ADDR:Al-Madinah Al-Munawarah RD,  Jeddah <br/>TEL:800-244-2244",
    info: [
      "Al-Madinah Al-Munawarah Rd, Aziziyah, Jeddah 23334<br/>TEL:(+966)8002442020",
      "4660 Prince Muhammad Bin Abdulaziz Rd, As Sulimaniyah, Riyadh 12243<br/>TEL:(+966)8002442020",
      "2nd St, Al-Thuqbah, Al Khobar 34623<br/>TEL:(+966)8002442020",
      "2884 King Abdullah Rd, Jabal Auhud, Al-Madinah Al-Munawarah<br/>TEL:(+966)8002442020",
    ],
    // btn: true,
    btn: ["true", "flase"],
    params: "country=682&city=",
  },
  {
    name: "UAE",
    x: 279,
    y: 273,
    title: ["HONGQI - UAE"],
    pic: ["images/loading/d1.jpg"],
    info: [
      "202 Sheikh Zayed Bin Sultan St - Al Danah - Zone 1 - Abu Dubai, UAE <br/>TEL:800 244 2020",
    ],
    btn: true,
    params: "country=784&city=",
  },



  {
    name: "Vietnam",
    x: 462,
    y: 300,
    title: ["HONGQI - Vietnam"],
    pic: ["images/loading/embassy14.jpg"],
    info: [
      "ADDR:No.68 Pham Van Dong street, Anh Dung ward, Duong Kinh district, Hai Phong city, Vietnam, <br/>TEL:(+84) 837668668",
    ],
    btn: true,
    params: "country=704&city=",
  },

  // {
  //     name: "SENEGAL",
  //     x: 40,
  //     y: 350,
  //     title: "HONGQI - SENEGAL",
  //     pic: "images/loading/p011.jpg",
  //     info: "ADDR:  Lot N15 Route de l’AEROPORT, MALOM CENTER BUILDING, DAKAR YOFF. NINEA: 006151055, RC: SN DKR 2016 A 25981.，Republic of Senegal<br/>TEL: ",
  //     btn: true,
  //     params: 'country=686&city='
  // },

  // { name: "London", x: 1222, y: 422, title: "HONGQI - DUBAI", pic: "img/p011.jpg", info: "ADDR: <br/>TEL:     " },
  // { name: "London", x: 1222, y: 22, title: "HONGQI - DUBAI", pic: "img/p011.jpg", info: "ADDR: <br/>TEL:     " },
  {
    name: "Costa Rica",
    x: 1011,
    y: 252,
    title: "HONGQI - Costa Rica",
    pic: "images/loading/embassy1.jpg",
    info: "ADDR:De la casa de D. Oscar Arias 100 metros al sur y 50 metros al oeste, Rohrmoser, Pavas San Jose, Costa Rica",
  },
  {
    name: "Peru",
    x: 1149,
    y: 436,
    title: "HONGQI - Peru",
    pic: "images/loading/embassy2.jpg",
    info: "ADDR:Jr.José Granda 150, San Isidro,Lima 27, República del Perú",
  },
  {
    name: "France",
    x: 94,
    y: 173,
    title: "HONGQI - France",
    pic: "images/loading/embassy3.jpg",
    info: "ADDR:20, Rue Monsieur – 75007 Paris – France ",
  },
  {
    name: "Germany",
    x: 133,
    y: 153,
    title: "HONGQI - Germany",
    pic: "images/loading/embassy4.jpg",
    info: "ADDR:MARKISCHES UFER 54，10179 BERLIN",
  },
  {
    name: "Belgium",
    x: 111,
    y: 151,
    title: "HONGQI - Belgium",
    pic: "images/loading/embassy5.jpg",
    info: "ADDR:Boulevard de la Woluwe 100　 1200 Bruxelles Belgique",
  },
  {
    name: "Tunisia",
    x: 123,
    y: 222,
    title: "HONGQI - Tunisia",
    pic: "images/loading/embassy6.jpg",
    info: "ADDR:22, RUE DU DOCTEUR-BURNET, MUTUELLEVILLE, TUNIS",
  },
  {
    name: "Guinea",
    x: 41,
    y: 350,
    title: "HONGQI - Guinea",
    pic: "images/loading/embassy7.jpg",
    info: "ADDR:DONKA, CITE MINISTERIELLE, CONAKRY",
  },
  {
    name: "Equatorial Guinea",
    x: 123,
    y: 413,
    title: "HONGQI - Equatorial Guinea",
    pic: "images/loading/embassy8.jpg",
    info: "ADDR:CARRETERA AEROPUERTO, MALABO, EQUATORIAL GUINEA",
  },
  {
    name: "Algeria",
    x: 101,
    y: 225,
    title: "HONGQI - Algeria",
    pic: "images/loading/embassy9.jpg",
    info: "ADDR:34 BOULEVARD DES MARTYRS, ALGER",
  },
  {
    name: "Republic Of Korea ",
    x: 544,
    y: 235,
    title: "HONGQI - Republic Of Korea ",
    pic: "images/loading/embassy10.jpg",
    info: "ADDR:568-1, South cave, Jeju City, Jeju special autonomous Road, South Korea",
  },
  {
    name: "Vietnam",
    x: 459,
    y: 342,
    title: "HONGQI - Vietnam",
    pic: "images/loading/embassy11.jpg",
    info: "ADDR:175 Hai Ba Trung Road, District 3, Ho Chi Minh City",
  },

  // {
  //   name: "the Philippines",
  //   x: 528,
  //   y: 328,
  //   title: "HONGQI - the Philippines",
  //   pic: "images/loading/embassy12.jpg",
  //   info: "ADDR:4896 Pasay Road,Dasmarinas Village,Makati,Metro Manila,Republic of the Philippines",
  // },
  // {
  //     name: "Kazakhstan",
  //    x: 298,
  //    y: 190,
  //     title: "HONGQI - Kazakhstan",
  //     pic: "images/loading/embassy13.jpg",
  //     info: "ADDR:37 kabanbaybatur street, left bank, Astana, Kazakhstan, 010000",
  // },
  {
    name: "Kazakhstan",
    x: 298,
    y: 190,
    title: "HONGQI - Kazakhstan",
    pic: "images/loading/embassy14.jpg",
    info: "ADDR:12 baytasov street, Almaty, Kazakhstan",
  },
  // {
  //     name: "Iran",
  //     x: 265,
  //     y: 223,
  //     title: "HONGQI - Iran",
  //     pic: "images/loading/embassy15.jpg",
  //     info: "ADDR:No.73rd, Movahed Danesh Ave. Aghdasiyeh, Tehran",
  // },
  // {
  //   name: "Japan",
  //   x: 597,
  //   y: 230,
  //   title: "HONGQI - Japan",
  //   pic: "images/loading/embassy16.jpg",
  //   info: "ADDR:3-4-33 Yuanma cloth, Tokyo, Japan",
  //   btn: true,
  //   params: "country=392&city=",
  // },
];
// 处理图片盒子高度
var imgHeightFun = function () {
  var winW = jQuery(window).width();
  // var idealcol2Img = 868 / 442,
  //     idealcol3Img = 569 / 443,
  //     newscol3Img = 569 / 340;
  var idealcol2Img = 1920 / 442,
    idealcol3Img = 1920 / 443,
    newscol3Img = 1920 / 340,
    mapImg = 1920 / 1126,
    carMImg = 1920 / 108,
    bannerImg = 1920 / 1080,
    cartypeImg = 1920 / 500;
  var smallcarWrap = 1186 / 153;
  if (winW <= 750) {
    idealcol2Img = 750 / 414;
    idealcol3Img = 750 / 414;
    newscol3Img = 750 / 412.28;
    mapImg = 750 / 439.84;
    carMImg = 750 / 58.04; //车型小兔
    bannerImg = 750 / 1624;
    // cartypeImg = 750 / 637; // 车型大图
    cartypeImg = 750 / 550; // 车型大图 为了矮些,让它变形
    var smallcarWrap = 375 / 72.64;
    jQuery(".car-group").height(winW / (750 / 312));
  } else {
    var imgS = 1186 / 153;
    var carWrap = jQuery(".cartype-car-group");
    carWrap.height(jQuery(window).width() / imgS);
  }
  // 新闻板块
  var news_img = jQuery(".news-information .img-ani-wrap");
  news_img.height(winW / newscol3Img);
  var col2_img = jQuery(".hongqi-ideal .col2.img-ani-wrap");
  col2_img.height(winW / idealcol2Img);
  // 理念板块
  var col3_img = jQuery(".hongqi-ideal .col3.img-ani-wrap");
  col3_img.height(winW / idealcol3Img);
  // 地图板块
  var map_img = jQuery(".map-wrap .map-bg");
  map_img.height(winW / mapImg);
  // 小车包裹
  var smallcar_Wrap = jQuery(".cartype-car-group");
  smallcar_Wrap.height(jQuery(window).width() / smallcarWrap);
  // 小车图
  var carM_Img = jQuery(".cartype-car-group .cartype-car .img");
  carM_Img.height(winW / carMImg / 0.6865);
  // banner
  jQuery(".banner .swiper-container,.banner .swiper-container .d-img").height(
    winW / bannerImg
  );
  // 车型背景
  var cartype_img = jQuery(".changing-over .cartype-bg");
  cartype_img.height(winW / cartypeImg);
};
// video();
//
// function video() {
//   videourl = fileBase + "/videos/home.mp4";
// }
// 获取数据
function getDataFun() {
  // 获取新闻接口

  // 显示品牌新闻
  ajax_hq({
    type: "get",
    // url: "article/1/6?type=0",
    url: "article/1/6?type=1",
    success: function (data) {
      if (data.code == 200) {
        var res = data.data.items;
        var $box = jQuery(".news-information .column-content");
        var $item = $box.find(".column-item");
        if (res.length > 0) {
          for (var i = 0; i < res.length; i++) {
            (function (i) {
              var item = res[i];
              $item
                .eq(i)
                .find("a")
                .attr(
                  "href",
                  "./pages/events/" + item.type + "/" + item.id + ".html"
                )
                .attr("title", item.type);
              $item.eq(i).find("img").attr("lsrc", item.cover);
              $item.eq(i).find(".news-title").text(item.title);
              $item
                .eq(i)
                .find(".time")
                .html(formatTime(new Date(Number(item.createTime))));
            })(i);
          }
          if ($item.length > res.length) {
            $item
              .eq(res.length - 1)
              .nextAll()
              .remove();
          }
        } else {
          $item.remove();
        }
      }
    },
  });
  ajax_hq({
    type: "get",
    url: "article/1/3?type=3",
    success: function (data) {
      if (data.code == 200) {
        var res = data.data.items;
        var $box = jQuery(".hongqi-topics .column-content");
        var $item = $box.find(".column-item");
        if (res.length > 0) {
          for (var i = 0; i < res.length; i++) {
            (function (i) {
              var item = res[i];
              $item
                .eq(i)
                .find(".a-link")
                .attr(
                  "href",
                  "./pages/leaving-msg/leaving-msg.html?id=" + item.id
                )
                .attr("title", item.type);
              $item.eq(i).find("img.details-img").attr("lsrc", item.cover);
              // $item.eq(i).find(".title").text(item.title);
              $item.eq(i).find(".info").text(item.description);
              $item.eq(i).find(".source>.details_title").text(item.author);
              $item
                .eq(i)
                .find(".date")
                .html(
                  getTime_normal(item.createTime) +
                  "&nbsp;&nbsp;·&nbsp;&nbsp;" +
                  item.origin
                );
              $item.eq(i).find(".comment span").eq(1).text(item.replyNum);
              $item.eq(i).find(".like span").eq(0).attr("id", item.id);
              $item.eq(i).find(".like span").eq(1).text(item.thumbNum);
            })(i);
          }
          if ($item.length > res.length) {
            $item
              .eq(res.length - 1)
              .nextAll()
              .remove();
          }
        } else {
          $item.remove();
        }
      }
    },
  });
}
// 加载首页地图所需图片
function loadImageFun() {
  var imgArr = [
    "d1.jpg",
    "d2.jpg",
    "d3.jpg",
    "d4.jpg",
    "d5.jpg",
    "d6.jpg",
    "d7.jpg",
    "d8.jpg",
    "d9.jpg",
    "d10.jpg",
    "d11.jpg",
    "d16.jpg",
    "embassy1.jpg",
    "embassy2.jpg",
    "embassy3.jpg",
    "embassy4.jpg",
    "embassy5.jpg",
    "embassy6.jpg",
    "embassy7.jpg",
    "embassy8.jpg",
    "embassy9.jpg",
    "embassy10.jpg",
    "embassy11.jpg",
    "embassy12.jpg",
    "embassy13.jpg",
    "embassy14.jpg",
    "embassy15.jpg",
    "embassy16.jpg",
  ];
  for (var i = 0; i <= imgArr.length - 1; i++) {
    loadImage("./images/loading/" + imgArr[i]);
  }
}
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
var resizeTimer = null;

jQuery(function () {

  // 城市切换
  //上一个
  jQuery(".arrow-left").click(function () {
    jQuery(".country-wrap li.act").prev().trigger("click");
  });
  //下一个
  jQuery(".arrow-right").click(function () {
    jQuery(".country-wrap li.act").next().trigger("click");
  });
  var aniCallBack =
    "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
  var countryTimer = null;
  // 点击城市列表
  jQuery(".country-wrap li").click(function () {
    if (!countryTimer) {
      jQuery(this).addClass("act").siblings().removeClass("act");
      countryTimer = setTimeout(function () {
        countryTimer = null;
      }, 1000);
    } else {
      return;
    }
    var _i = jQuery(this).index();

    // if (jQuery(this).hasClass("act")) {
    //     return;
    // }

    var liWidth = jQuery(".country-wrap li.act").outerWidth();
    jQuery(".country-wrap ul")
      .stop()
      .animate(
        {
          scrollLeft: jQuery(this).index() * liWidth - liWidth * 0.83,
        },
        500
      );
    // jQuery('.map-wrap .map-img-item').eq(_i).addClass('act').siblings().removeClass('act');
    var countryName = jQuery(this).text();
    jQuery(".point-wrap .txt-wrap").text("HONGQI - " + countryName);
    // 切换地图
    jQuery(".map-img-item.act")
      .stop()
      .addClass("fadeOutLeft")
      .one(aniCallBack, function () {
        jQuery(this).stop().removeClass("fadeOutLeft act");
      });
    jQuery(".map-img-item")
      .eq(_i)
      .stop()
      .addClass("fadeInRight")
      .one(aniCallBack, function () {
        jQuery(this).stop().removeClass("fadeInRight");
      })
      .addClass("act")
      .show()
      .siblings()
      .removeClass("fadeInRight");
  });

  // jQuery('.country-wrap li').eq(0).trigger('click');

  /**
   * 切换车系
   * 显示相应车系
   *
   *
   * 进而操作:
   * 对应车款
   * 对应车款车图的按钮组
   * 对应车款的介绍
   */
  jQuery(".cartype-name li").click(function (event, idx) {
    var _i = jQuery(this).index();
    // console.log(_i, carIdx);
    var carIdx = idx || 0;
    // 清理上一个选项卡的状态
    jQuery(".describe-group .describe").removeClass(
      "fadeInLeft fadeInRight fadeOutLeft fadeOutRight act"
    );
    jQuery(".car-group .car-item").removeClass(
      "fadeInLeft fadeInRight fadeOutLeft fadeOutRight act"
    );

    // 车系小图父级
    var carWrap = jQuery(".cartype-car-group");
    // 车系小图列表
    var car = carWrap.find(".cartype-car");
    var curCar = car.eq(_i);
    curCar.addClass("act").siblings().removeClass("act");
    // 点击第一个车款
    curCar.find("li").eq(carIdx).trigger("click");

    // 操作车型介绍
    var cur_describe_group = jQuery(".describe-group .describe-item").eq(_i);
    cur_describe_group.trigger("click");
    cur_describe_group.find(".describe").eq(carIdx).trigger("click");

    // 操作车色按钮
    var cur_car_color_btn_group = jQuery(".color-btn-group .color-btn-item").eq(_i);
    cur_car_color_btn_group.trigger("click");
    cur_car_color_btn_group.find(".color-btn").eq(0).trigger("click");
    cur_car_color_btn_group
      .find(".color-btn")
      .eq(0)
      .find("li")
      .eq(0)
      .trigger("click");
    // 操作车图
    var cur_car_pic_group = jQuery(".car-group .car-item-wrap").eq(_i);
    cur_car_pic_group.trigger("click");
    cur_car_pic_group.find(".car-item").eq(carIdx).trigger("click");
  });
  jQuery(".describe>a").click(function () {
    var data = jQuery(this).attr("href");
    // console.log(data);
    if (data == "javascript:;") {
      alert("Coming soon!");
    }
  });
  // jQuery('.cartype-name li').eq(0).trigger('click');
  var timer = null;
  /**
   * 切换车款
   * 显示对应车款
   *
   * 进而操作:
   * 对应车款车图的按钮组
   * 对应车款的介绍
   */
  jQuery(".cartype-car li").click(function () {
    if (!timer) {
      timer = setTimeout(function () {
        timer = null;
      }, 1000);
      // 添加车型class
      jQuery(this).addClass("act").siblings().removeClass("act");
      // 点击索引
      var _i = jQuery(this).index();
      // 切换左侧文案
      var cur_describe_wrap = jQuery(".describe-group").find(".describe-item.act");
      cur_describe_wrap.find(".describe.act").addClass("fadeOutRight");

      cur_describe_wrap
        .find(".describe")
        .eq(_i)
        .addClass("fadeInLeft")
        .addClass("act");

      setTimeout(function () {
        var cur = cur_describe_wrap.find(".describe").eq(_i);
        cur
          .removeClass("fadeInLeft fadeOutRight")
          .siblings()
          .removeClass("fadeInLeft fadeInRight fadeOutLeft fadeOutRight act");
      }, 800);

      // 切换右侧车
      var cur_car_wrap = jQuery(".car-group").find(".car-item-wrap.act");
      cur_car_wrap.find(".car-item.act").addClass("fadeOutLeft");

      cur_car_wrap
        .find(".car-item")
        .eq(_i)
        .addClass("fadeInRight")
        .addClass("act");

      setTimeout(function () {
        var cur = cur_car_wrap.find(".car-item").eq(_i);
        cur
          .removeClass("fadeInLeft fadeOutRight")
          .siblings()
          .removeClass("fadeInLeft fadeInRight fadeOutLeft fadeOutRight act");
        cur.find("img").eq(0).addClass("act").siblings().removeClass("act");
      }, 800);

      // 重置颜色 - 车型换色
      jQuery(".color-btn-group")
        .find(".color-btn-item.act")
        .find(".color-btn")
        .eq(_i)
        .trigger("click")
        .find("li")
        .eq(0)
        .trigger("click");
    }
  });
  // 左右箭头切换车款
  jQuery('.changing-over [data-role="section-arrow"]').on("click", function () {
    if (timer) return;
    var dir = jQuery(this).hasClass("prev") ? "prev" : "next";
    // console.log(dir, "dir");
    // 当前车系
    var $series = jQuery(".cartype-name .act");
    var seriesIdx = $series.index();
    // 当前车型
    var $cartype = jQuery(".cartype-car-group .cartype-car.act .act");
    var cartypeIdx = $cartype.index();
    switch (dir) {
      case "prev":
        // 如果当前车型为第一个;
        if (cartypeIdx == 0) {
          // 判断车系是否在第一个
          if (seriesIdx != 0) {
            var ctp = jQuery(".cartype-car-group .cartype-car.act").prev();
            var idx = ctp.children().length - 1;
            $series.prev().trigger("click", idx);
          }
        }
        // 当前车型在中间
        if (cartypeIdx > 0 && cartypeIdx <= $cartype.siblings().length) {
          // debugger
          $cartype.prev().trigger("click");
        }
        break;
      case "next":
        // 如果当前车型为最后一个
        if (cartypeIdx == $cartype.siblings().length) {
          if (seriesIdx == $series.siblings().length) return;
          $series.next().trigger("click", 0);
        }

        // 当前车型在中间
        if (cartypeIdx >= 0 && cartypeIdx < $cartype.siblings().length) {
          $cartype.next().trigger("click");
        }
        break;
    }
  });
  // jQuery(".aleart").click(function () {
  //   console.log(1);
  //   alert("Coming soon!");
  //   return;
  // });
  // 切换车色
  jQuery(".color-btn li").click(function () {
    var _i = jQuery(this).index();
    jQuery(".changing-over")
      .find(".car-item-wrap.act")
      .find(".car-item.act img")
      .eq(_i)
      .stop()
      .addClass("act")
      .siblings()
      .removeClass("act");
    // jQuery('.act.fadeOutRight.fadeInLeft').removeClass('fadeOutRight').hide()
    // jQuery('.act.fadeInRight.fadeOutLeft').removeClass('fadeOutLeft').hide()
    jQuery(".describe-group")
      .find(".act.fadeOutRight.fadeInLeft")
      .removeClass("act fadeOutRight fadeInLeft");
    jQuery(".car-group")
      .find(".act.fadeInRight.fadeOutLeft")
      .removeClass("act fadeInRight fadeOutLeft");
  });

  // 点赞
  jQuery(".icondianzan").click(function (e) {
    e.stopPropagation();

    jQuery(this).addClass("icondianzan1").removeClass("icondianzan");
    var likeNum = jQuery(this).next("span");

    ajax_hq({
      type: "post",
      url: "article/thumb/" + e.currentTarget.id,
      success: function (data) {
        if (data.code == 200) {
          likeNum.text(Number(likeNum.text()) + 1);
        }
      },
    });
  });

  // 提示
  jQuery("a").on("click", function () {
    var href = jQuery(this).attr("href");
    var expect = jQuery(this).attr("data-expect");
    if (href == "javascript:") {
      if (expect == "expect") {
        alert("Coming soon!");
      }
    }
  });
  // 切换车色 手机端
  if (window.ISWAP) {
    // jQuery('.car-group').on('swipeleft', function(e) {
    //     alert();
    //     // jQuery('.color-btn-item.act').find('.color-btn.act').find('li.act').next().trigger('click');
    //     jQuery('.color-btn-item.act .color-btn.act li.act').next().trigger('click');
    // })
    // jQuery('.car-group').on('swiperight', function(e) {
    //     jQuery('.color-btn-item.act .color-btn.act li.act').prev().trigger('click');
    // })

    var hammerCarGroup = new Hammer(document.getElementById("car-group"));
    hammerCarGroup.on("swipeleft", function () {
      jQuery(".color-btn-item.act .color-btn.act li.act").next().trigger("click");
    });
    hammerCarGroup.on("swiperight", function () {
      jQuery(".color-btn-item.act .color-btn.act li.act").prev().trigger("click");
    });
  }
});

/*ad 移动方法 为了波兰*/
function move_obj(obj, move_w, move_h, x, y, l, t, m) {
  if (obj == undefined) {
    alert("方法调用错误,请传入正确参数!");
    return;
  }

  move_w = move_w == undefined || move_w == "" ? jQuery(window).width() : move_w; //水平移动范围,默认浏览器可视区域宽度
  move_h = move_h == undefined || move_h == "" ? jQuery(window).height() : move_h; //垂直移动范围,默认浏览器可视区域高度
  x = x == undefined || x == "" ? 3 : x; //一次水平移动距离,默认3px
  y = y == undefined || y == "" ? 3 : y; //一次垂直移动距离,默认3px
  l = l == undefined || l == "" ? 0 : l; //相对于body的起始水平位置,默认0
  t = t == undefined || t == "" ? 0 : t; //相对于body的起始垂直位置,默认0
  m = m == undefined || m == "" ? 80 : m; //计时周期,单位毫秒,默认80ms
  function moving() {
    x = l >= move_w - jQuery(obj).width() || l < 0 ? -x : x;
    y = t >= move_h - jQuery(obj).height() || t < 0 ? -y : y;
    l += x;
    t += y;
    jQuery(obj).animate({ left: l, top: t }, m);
  }
  var timer_move = setInterval(function () {
    moving();
  }, m);
  //悬停停止运动
  jQuery(obj).mouseover(function () {
    jQuery(this).children(".close_port").show();
    clearInterval(timer_move);
  });
  //移开鼠标后继续运动
  jQuery(obj).mouseout(function () {
    jQuery(this).children(".close_port").hide();
    timer_move = setInterval(function () {
      moving();
    }, m);
  });
  //关闭浮窗,关闭后只能通过刷新页面才能显示,也可以自定义关闭功能
  /*
    var close="<div class=\"close_port\">×</div>";
    jQuery(obj).append(close);
    */
  jQuery(".close_port").css({
    position: "absolute",
    display: "none",
    width: "20px",
    height: "20px",
    top: 0,
    right: 0,
    color: "red",
    border: "1px solid red",
    background: "#ccc",
    textAlign: "center",
    lineHeight: "20px",
    cursor: "pointer",
  });
  jQuery(obj).on("click", ".close_port", function () {
    //如果有嵌套子级漂浮窗,同时清除子级定时器,清理缓存
    jQuery(obj).find(".close_port").trigger("mouseover");
    clearInterval(timer_move);
    jQuery(this).parent().remove();
  });
}

// window.loadingFun();
window.initFunCallback = function () {
  // var swiperArr = ["bannerautoplay"];
  // var swiperArr = ["banner"];
  // if (!window["banner"]) {
  //     swiper_generator(swiperArr);
  // }
  jQuery(".country-wrap li").eq(0).trigger("click");
  jQuery(".cartype-name li").eq(0).trigger("click");
  jQuery(".color-btn-group li").eq(0).trigger("click");
  jQuery(".d-enter").removeClass("d-enter");

  // 窗口滚动
  jQuery(window).scroll(function () {
    window.winScroll();
  });

  // 获取数据
  getDataFun();
  // setTimeout(function () {
  //   // 实例化地图 铁赵的
  //   // window.wpmap = new WorldMap();
  //   initMapFun();
  // }, 0);
  // 重置地图
  window.initMapFun = initMapFun;
  function initMapFun() {
    var initW = isWAP768 ? 750 : 1920;
    if ((mapFlag == "pc" && !isWAP768) || (mapFlag == "m" && isWAP768)) {
      /*
                  原本是pc，并当前窗口大于等于768
                  或者
                  原本是手机端（m） 并当前窗口小于768
                  则不动
                  */
    } else {
      mapFlag = isWAP768 ? "m" : "pc";
      jQuery("#map-wrap").empty();
      console.log("mapFlag--------------");
      var map = initMap(document.getElementById("map-wrap"), dataArr, isWAP768);
      //点击CONSULTATION
      map.addEventListener("onCONSULTATION", function (e) {
        var p = dataArr[e.tI].params;
        if (p) {
          location.href = "./network/network.html?" + p;
        } else {
          location.href = "./network/network.html";
        }
      });
    }
    var imgScale = jQuery(window).width() / initW;
    jQuery("#map-wrap>div").css({
      transform: "scale(" + imgScale + ")",
      "transform-origin": " 0 0",
    });
  }
  // 加载地图图片
  loadImageFun();
  // setTimeout(() => {

  //   // 加载ad弹窗
  //   if (jQuery("#ad_box").length == 0) {
  //     var ad_box =
  //       '<a href="https://www.hongqialghanim.com/en" target="_blank"  id="ad_box" style="position: fixed;z-index:10";><img src="./images/index/ad_img.png" style="width:2.3vw;min-width:230px" alt="hongqi" /></a>';
  //     jQuery("body").append(ad_box);
  //     move_obj("#ad_box", "", "", 10, 10, 800, 500, 100);
  //   }
  // }, 1e3);
  jQuery(window)
    .resize(function () {
      // 重新设置图片距顶位置
      imgHeightFun();
      if (!resizeTimer) {
        resizeTimer = setTimeout(function () {
          window.picOffset();
          window.winScroll();

          if (window["banner"] && window["banner"].length > 0) {
            window.ISWAP
              ? window["banner"][1].update()
              : window["banner"][0].update();
          } else if (window["banner"]) {
            window["banner"].update();
          }
          initMapFun();
          resizeTimer = null;
        }, 50);
      } else {
        return;
      }
    })
    .resize();
  setTimeout(function () {
    if (window["banner"] && window["banner"].length > 0) {
      window.ISWAP
        ? window["banner"][1].update()
        : window["banner"][0].update();
    } else if (window["banner"]) {
      window["banner"].update();
    }
  }, 2500);
};
