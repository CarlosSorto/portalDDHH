$(document).ready(function(){
    var picker = new Pikaday({ field: $('#published_date')[0] });
    var since = new Pikaday({
        field: $('#since_date')[0],
        onSelect: function() {
            until.config({minDate: this.getDate()});
        }
    });

    var until = new Pikaday({
        field: $('#until_date')[0]
    });

  $('#owl-header').owlCarousel({
    items:1,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    lazyLoad:true,
    loop:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    smartSpeed:450,
    nav:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true
        },
        600:{
            items:1,
            nav:false,
            dots:true
        },
        1000:{
            items:1,
            nav:false,
            dots:true
        }
    }
  });
  $('#owl-formation').owlCarousel({
    items:3,
    loop:true,
    margin: 20,
    nav:true,
    dots:false,
    navText: [
       '<span class=\'icon-left-arrow\'></span>',
       '<span class=\'icon-right-arrow\'></span>'
    ],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true
        },
        600:{
            items:2,
            nav:false,
            dots:true
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
  });
  $('#owl-organization').owlCarousel({
    items:3,
    loop:true,
    margin: 20,
    nav:true,
    dots:false,
    navText: [
       '<span class=\'icon-left-arrow\'></span>',
       '<span class=\'icon-right-arrow\'></span>'
    ],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
  });
  $('#owl-galery').owlCarousel({
    items:1,
    animateOut:'fadeOut',
    animateIn:'fadeIn',
    lazyLoad:true,
    center:true,
    loop:true,
    autoplay:true,
    nav:true,
    autoHeight:true,
    dots:false,
    margin: 10,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    smartSpeed:450,
    thumbs:true,
    thumbsPrerendered: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true
        },
        600:{
            items:1,
            nav:false,
            dots:true
        },
        1000:{
            items:1,
            nav:true,
            dots:false
        }
    },
    navText: [
       '<span class=\'icon-left-arrow f2\'></span>',
       '<span class=\'icon-right-arrow f2\'></span>'
    ]
  });
});
document.getElementById('hamburger').addEventListener('click', event => {
    let sidebar = document.getElementById('sidebar');
    let hamburger = document.getElementById('hamburger');
    let sidebarWidth = sidebar.getBoundingClientRect().width;

    event.preventDefault();
    document.getElementById('sidebar').classList.toggle('transform-off');

    hamburger.style.transform = hamburger.style.transform
    ? ''
    : 'translate3d(-' + sidebarWidth + 'px, 0, 0)';
});

document.getElementById('cancel').addEventListener('click', event => {
    document.getElementById('hamburger').style.transform = ''
    document.getElementById('sidebar').classList.add('transform-off')
})

$('.select-chosen').chosen();
$("#form").validate({
    errorClass: 'red f6'
});
