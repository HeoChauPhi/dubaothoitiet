(function (window, document, $) {

  //Show/hide code
  $(".show-code").click(function() {
    $(this).next(".component--source").toggleClass("element-invisible");
  });
  $(".hide-code").click(function() {
    $(this).parent(".component--source").addClass("element-invisible");
    $('html, body').animate({
      scrollTop: $(this).parents(".component--item").offset().top
    }, 500);
  });

  //List components
  $(".show-subitem").click(function(){
    $(this).next().toggleClass("element-invisible");
    $(this).toggleClass("active");
  });
  $(".show-list").click(function(){
    $(".component--list").addClass("active");
    $(".show-list").hide();
    $(".hide-list").addClass("active").show();
  });
  $(".hide-list").click(function(){
    $(".component--list").removeClass("active");
    $(".hide-list").removeClass("active").hide();
    $(".show-list").show();
  });

  // Choose device
  $(".js-choose-device").click(function(e){
    e.preventDefault();
    var device = $(this).attr('href').replace("#", ""),
        iframe = $('.device-mode');
    iframe.removeClass("device-mobile device-tablet device-desktop" );
    $('.js-choose-device').removeClass('active');
    $(this).addClass('active');
    if(device != 'full') {
      iframe.addClass("device-"+device);
    }
  });

  // Scroll animate.
  var frameScrollAnimate = function () {
  };

  $(".sub").children('a').click(function(e) {
    e.preventDefault();
    if($(this).hasClass('jump-to-page')) {
      var $hrPage = $(this).attr('href'),
      $iframeP = $('#styleguide');
      $iframeP.attr('src',$hrPage);

    }
    else {
      var curentIframe = $('#styleguide').attr('src');
      if (curentIframe != 'sg.html') {
        $('#styleguide').attr('src','sg.html');
        $(this).trigger( "click" );
      }
      else {
        var idActive = $(this).attr('href'),
          scrollTop,
          iframeF = $('.device-mode').contents();
        var heightHeader = iframeF.find('.header').height();
          scrollTop = $(idActive, iframeF).offset().top - heightHeader;
          iframeF.scrollTop(scrollTop);
        $(".sub").children('a').removeClass('active');
        $(this).addClass('active');
      }
    }
  });

  SyntaxHighlighter.all()

}(this, this.document, this.jQuery));
