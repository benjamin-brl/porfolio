// const converter = new showdown.Converter();
// $('[data-markdown]').each(function () {
//     $(this).html(converter.makeHtml($(this).text()));
// });

const menu = $('#menu-bars');
const header = $('header');
const cursor1 = $('.cursor-1');
const cursor2 = $('.cursor-2');
const pourcent = $('#pourcent')
const scroller = $('#scroller')

menu.click(function () {
    menu.toggleClass('fa-times');
    header.toggleClass('active');
});

$(window).scroll(function () {
    menu.removeClass('fa-times');
    header.removeClass('active');
});

$(window).mousemove(function (e) {
    cursor1.css({ top: e.pageY + 'px', left: e.pageX + 'px' });
    cursor2.css({ top: e.pageY + 'px', left: e.pageX + 'px' });
});

$('a').mouseenter(function () {
    cursor1.addClass('active');
    cursor2.addClass('active');
}).mouseleave(function () {
    cursor1.removeClass('active');
    cursor2.removeClass('active');
});

$(window).scroll(() => {
    const pourcentage = Math.round(((window.scrollY + window.innerHeight) / (document.documentElement.scrollHeight)) * 100,0);
    scroller.val(pourcentage)
    pourcent.text(`${pourcentage}%`)
});