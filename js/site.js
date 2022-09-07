/**
     * ACCORDIONS
     * https://code-boxx.com/simple-vanilla-javascript-accordion/
     */
 function accordize (target, one) {
    // console.log('accordize');

    // Get targe container
    target = document.getElementById(target);
    target.classList.add("aWrap");
    
    // Attach click to open drawer
    if (typeof one != "boolean") { one = false; }
    let head = target.getElementsByClassName("aHead");

    // Only one accordion cav open at a time
    if (one) {
        for (let h of head) {
        h.addEventListener("click", function(){
            for (let e of head) { 
            if (e != this) { e.classList.remove("open");  }
            else { this.classList.toggle("open"); }
            }
        });
        }
    }
    
    // All accordions can open/close
    else {
        for (let h of head) {
        h.addEventListener("click", function(){
            this.classList.toggle("open");
        });
        }
    }
}

function brandsCarousel(){
    // console.log('band carousel');

    jQuery('.brands-carousel').slick({
        mobileFirst: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '0 50px 0 0',
        appendArrows: '.brands-carousel-nav',
        nextArrow: '<button type="button" class="slick-next" aria><span class="sr-only">Next</span></button>',
        prevArrow: '<button type="button" class="slick-prev"><span class="sr-only">Previous</span></button>',
        
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                  slidesToShow: 4,
                }
              },
            {
              breakpoint: 1160,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
              }
            },
          ]
    });
}

function missionCarousel(){
  jQuery('.mission-carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      appendArrows: '.mission-carousel-nav',
      nextArrow: '<button type="button" class="slick-next" aria><span class="sr-only">Next</span></button>',
      prevArrow: '<button type="button" class="slick-prev"><span class="sr-only">Previous</span></button>'
  });   
}

function productsCarousel(){

  jQuery('.products-carousel').slick({
      mobileFirst: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '0 50px 0 0',
      appendArrows: '.products-carousel-nav',
      nextArrow: '<button type="button" class="slick-next" aria><span class="sr-only">Next</span></button>',
      prevArrow: '<button type="button" class="slick-prev"><span class="sr-only">Previous</span></button>',
      
      responsive: [
          {
              breakpoint: 1600,
              settings: {
                slidesToShow: 4,
              }
            },
          {
            breakpoint: 1160,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
            }
          },
        ]
  });
}

window.addEventListener("DOMContentLoaded", function(){
    let accordions = document.getElementsByClassName("accordion-group");
    for (var i = 0, len = accordions.length; i < len; i++) {
        accordize(accordions[i].getAttribute("id"), false);
    }

    brandsCarousel();
    missionCarousel();
    productsCarousel();
});