    $(document).ready(function() {
            var blog_=true;
            var blog_w=260;
            var blog_margin=25;
            // if( $(".masking_w").find('li').length <= 4 ){
            //     blog_=false;
            // }
            // if($(window).width()<1024){
            //     blog_w=270;
            //     if($(window).width()<500){
            //         blog_w=275;
            //         blog_margin=25;
            //     }
            // }

            var window_w=$(window).width();
                      var pic_show_slider=$('.bx_pic').bxSlider({
                          mode:'fade',
                          pager:false,
                          controls:true,
                          speed:500,
                          touchEnabled:true,
                          easing:'easeOutQuart',
                          captions: true,
                          hideControlOnEnd:true,
                          // margin:0,

                          onSliderLoad:function(currentIndex){
                             // $(".pic_show .all").html('0'+$(".pic_show_slider").find('li').length );

                          },
                          onSlideBefore:function($slideElement, oldIndex, newIndex){
                              // $(".pic_show .now").html('0'+(newIndex+1));
                              // $(".pic_show .bx-wrapper li").removeClass("active");
                              // $slideElement.addClass("active");
                              $(".pic_show .thumb_pic li").eq(newIndex).click();
                          },
                          onSlideAfter:function($slideElement, oldIndex, newIndex){
                              //  if($('.pic_show_slider').length>0){
                              //   $(".pic_show .pic_show_slider .worder").addClass("fadeInUp animated");
                              // }
                          }

                      });

                      var menu_thumb=0;
                      var slideWidth_thumb=0;
                      if(window_w<500){
                        menu_thumb=2;
                        slideWidth_thumb=window_w*0.9;
                      }else{
                        menu_thumb=4;
                        slideWidth_thumb=160;
                      }
                      var thumb_c=true;
                      if( $(".thumb-pager").find('li').length <= 4 ){
                            thumb_c=false;
                      }
                      if( $(".thumb-pager").find('li').length != 1 ){
                        var thumb_pager=$('.thumb-pager').bxSlider({
                            pager:false,
                            speed:600,
                            easing: 'cubic-bezier(0.23, 1, 0.32, 1)',
                            pager:false,
                            controls:thumb_c,
                            infiniteLoop:false,
                            minSlides:menu_thumb,
                            maxSlides: menu_thumb,
                            slideWidth: slideWidth_thumb,
                            slideMargin:12,
                            easing:'easeOutQuart',
                            captions: true,
                            hideControlOnEnd:true,
                            onSliderLoad:function(currentIndex){
                                $(".thumb-pager li").eq(0).addClass("active")
                            },
                            onSlideBefore:function($slideElement, oldIndex, newIndex){

                            },
                            onSlideAfter:function($slideElement, oldIndex, newIndex){
                                //  if($('.pic_show_slider').length>0){
                                //   $(".pic_show .pic_show_slider .worder").addClass("fadeInUp animated");
                                // }
                            }

                        });



                        $("#product_img .thumb li").click(function(){
                          $(".thumb-pager li").removeClass("active");
                          var getid=$("#product_img .thumb li").index($(this));
                          pic_show_slider.goToSlide(getid);
                          console.log(getid);
                          $(this).addClass("active");

                        });

                      }else{
                        $("#product_img .thumb").hide();
                      }


                        $(".jump_pic").fancybox({
                            padding:[0,0,0,0]
                        });



    });