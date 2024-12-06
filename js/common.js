jQuery(function ($){
$(function () {
  // if (!window.isWAP768) {
  //   setTimeout(function () {
  //     $headerBox = $("#cti-header");
  //     var $logoBoxH = $headerBox.find(".logo-wrap").innerHeight();
  //     //   var $logoBoxH = $headerBox.find(".menu-wrap").innerHeight();
  //     $headerBox.stop().animate(
  //       {
  //         top: "-" + $logoBoxH + "px",
  //         //   top: "-" + 80 + "px",
  //       },
  //       0
  //     );
  //   }, 0);
  // }
  // 为了北京车展
  setTimeout(()=>{
         // 特定字符
         const targetString = '1816393898025623580';
         // 新的 href 地址
         const newHref = 'https://www.hongqi-auto.com/3D/abbr/beijing_autoshow';
    
         // 获取所有 <a> 标签
         const links = document.querySelectorAll('a');
    
         // 遍历所有 <a> 标签
         links.forEach(link => {
             // 如果 href 属性中包含特定字符
             if (link.href.includes(targetString)) {
                 // 修改 href 属性
                 link.href = newHref;
             }
         });
         console.log("修改完成")
  },1000)


});
// 滚动哇
window.winScroll = function () {
  // window.offsetTopArr = []; // 用于存放动画包裹顶部距顶距离
  // window.offsetBottomArr = []; // 用于存放动画包裹底部距顶距离
  // 遍历所有.d-ani
  $section = $(".d-ani");
  // 获取滚动条位置
  var windST = $(window).scrollTop();
  var minIndex = 0;
  var maxIndex = 0;
  // 头盒子
  var $headerBox = $("#cti-header");

  // console.table({
  //     'scrollTop': windST,
  //     'scrollBottom': windST + window.WINDOW_HEIGHT
  // });
  // 循环所有动画盒子
  $section.each(function (i, ele) {
    if (
      (offsetTopArr[i] > windST + WINDOW_HEIGHT * 0.05 &&
        offsetTopArr[i] < windST + WINDOW_HEIGHT * 0.95) ||
      (offsetBottomArr[i] > windST + WINDOW_HEIGHT * 0.05 &&
        offsetBottomArr[i] < windST + WINDOW_HEIGHT * 0.95) ||
      (offsetTopArr[i] < windST + WINDOW_HEIGHT * 0.05 &&
        offsetBottomArr[i] > windST + WINDOW_HEIGHT * 0.95)
    ) {
      // 动画盒子底 < 可视窗口底 && 动画盒子底 > 可视窗口头
      // 动画盒子头 < 可视窗口底 && 动画盒子头 > 可视窗口头
      // 动画盒子头 < 可视窗口头 && 动画盒子底 > 可视窗口底
      // 添加显示动画 因为在可视范围内
      if ($section.eq(i).hasClass("d-enter")) {
        return;
      } else {
        $section.eq(i).addClass("d-enter");
      }
    } else {
      if ($section.eq(i).hasClass("d-enter")) {
        // $section.eq(i).removeClass("d-enter");
      }
    }
  });

  // $section.each(function(i, ele) {
  //     if (windST + window.WINDOW_HEIGHT < parseInt(offsetTop[i])) {
  //         if ($section.eq(i).hasClass("d-enter")) {
  //             $section.eq(i).removeClass("d-enter");
  //         }
  //     }
  //     if (
  //         windST + WINDOW_HEIGHT * 0.15 < parseInt(topH[i]) &&
  //         parseInt(offsetTop[i]) < windST + WINDOW_HEIGHT * 0.95
  //     ) {
  //         if ($section.eq(i).hasClass("d-enter")) {
  //             return;
  //         } else {
  //             $section.eq(i).addClass("d-enter");
  //         }
  //     }
  //     if (windST > parseInt(topH[i])) {
  //         minIndex = i;
  //         return;
  //     } else if (
  //         windST >
  //         parseInt(offsetTop[i]) - parseInt(WINDOW_HEIGHT / 1) + 100
  //     ) {
  //         count1 = i;
  //         maxIndex = i;
  //         if ($section.eq(i).hasClass("d-enter")) {
  //             return;
  //         } else {
  //             $section.eq(i).addClass("d-enter");
  //         }
  //         return;
  //     } else {
  //         $section
  //         // .eq(i - 1)
  //             .eq(i)
  //             .nextAll("d-ani")
  //             .removeClass("d-enter");
  //     }
  // });

  // if (minIndex >= 1) {
  //     $section
  //         .eq(minIndex)
  //         .removeClass("d-enter")
  //         .prevAll(".d-ani")
  //         .removeClass("d-enter");
  // }

  if (windST > window.WINDOW_HEIGHT / 30 && !$headerBox.hasClass("shrink")) {
    var $logoBoxH = $headerBox.find(".logo-wrap").innerHeight();
    $headerBox.addClass("shrink");
    if (window.isWAP768) {
      // $headerBox.stop().animate({
      //     top: "-" + ($logoBoxH + window.WINDOW_WIDTH * 0.06) + "px",
      // });
    } else {
      $headerBox.stop().animate({
        // top: "-" + ($logoBoxH + window.WINDOW_WIDTH * 0.043) + "px",
        // top: "-" + ($logoBoxH + window.WINDOW_WIDTH * 0.043) + "px",
        top: "-" + $logoBoxH + "px",
      });
      $(".menu_logo .logo").fadeOut(200);
      $(".menu_logo")
        .addClass("menu_active")
        .removeClass("menu_active_padding");
    }
    $(".language-wrap").find(".select-wrap").removeClass("open");
  } else if (
    windST <= window.WINDOW_HEIGHT / 30 &&
    $headerBox.hasClass("shrink")
  ) {
    $headerBox.removeClass("shrink");
    $headerBox.stop().animate({ top: "0" });
    $(".menu_logo .logo").fadeIn(1000);
    $(".menu_logo").addClass("menu_active_padding").removeClass("menu_active");
  } else {
  }

  // 二级导航
  if ($(".menu-secondlevel-item-wrap").hasClass("act")) {
    $("body").trigger("click");
  }
};



})


// });
