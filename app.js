
 const btn_password = document.querySelector('.btn_password');
 const btn_card = document.querySelector('.btn_card');
 const btn_identify = document.querySelector('.btn_identify');
 const btn_new = document.querySelector('.add_new1');
 const btn_cancel = document.querySelector('.btn_cancel');
 const btn_add = document.querySelector('.btn_add');
 const selectedOption = document.querySelector('#select').value;

 const blockPasswords = document.querySelectorAll('.block-passwords');
 const blockCards = document.querySelectorAll('.block-cards');
 const blockPersonal = document.querySelectorAll('.block-personal_data');

 const showPasswords = () => {
     blockPasswords.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockCards.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPersonal.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }

 const showCards = () => {
     blockCards.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockPasswords.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPersonal.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }

 const showPersonal = () => {
     blockPersonal.forEach(function (element) {
         element.classList.toggle('display_ye');
     })
     blockCards.forEach(function (element) {
         element.classList.remove('display_ye');
     })
     blockPasswords.forEach(function (element) {
         element.classList.remove('display_ye');
     })
 }

 const addNewRecord = () => {
    document.querySelector('#myForm').style.display = "block";
    document.querySelector('.container').style.opacity = ".3";
 }

 const closeNewRecord = () => {
     document.querySelector('#myForm').style.display = "none";
     document.querySelector('.container').style.opacity = "1";
 }

 selectedOption.onchange = selected;
function selected(e){
     console.log(e.target.value.length)
 }


 btn_add.addEventListener('onchange', selected);
 btn_cancel.addEventListener('click', closeNewRecord);
 btn_new.addEventListener('click', addNewRecord);
 btn_password.addEventListener('click', showPasswords);
 btn_card.addEventListener('click', showCards);
 btn_identify.addEventListener('click', showPersonal);




function copy(id) {
    //  copy paste

    if (!$('article.active').hasClass('editing')) {

        var copyBtn = document.querySelector('.' + id);

        if (copyBtn) {

            var copyText = document.querySelector('.' + id);
            var range = document.createRange();
            range.selectNode(copyText);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);

            try {

                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';

            } catch (err) {}

            window.getSelection().removeAllRanges();

        } //copyBtn

    }

}


$('.save_pdf').click(function () {

    $('article').each(function () {
        $(this).attr('id', '');
    });

    $(this).parent().parent().attr('id', 'shtype');
    window.print();

});

$(function () {

    var mark = function () {

        var keyword = $("#search").val();
        var options = {};
        $("main").unmark().mark(keyword, options);

        $("main").parent().removeClass('noresult');

        $('main, .tag').each(function () {

            if ($(this).children('mark').length <= 0) {

                $(this).parent().removeClass('noresult');
                $(this).parent().addClass('noresult');
                console.log($(this).children('mark').length);

            }

            if ($("#search").val() == 0)
                $("main").unmark().parent().removeClass("noresult");

        });

    };

    $("#search").on("input", mark);

});


$(document).ready(function () {


    $("#search").focus();
    $("article main").click(function () {

        if (!$(this).parent().hasClass("editing")) {

            $(this).parent().toggleClass("active").siblings().removeClass("active");

            if ($(this).parent().hasClass("active")) {

                $("nav").removeClass("add_new").addClass("edit_save").addClass("edit_save_new");

            } else {

                $("nav").addClass("add_new").removeClass("edit_save").removeClass("edit_save_new");

            }

            if ($(this).parent().hasClass("editing")) {

                $("article.editing").removeClass("editing");

            }

        }

    });

    $("article summary").click(function (e) {
        e.stopPropagation();
    });

    $('.alias a:not(.out):not(.generate), .logo').on('click', function (ev) {

        ev.preventDefault();
        $('#search').val($(this).text()).focus();

        var keyword = $(this).text();
        var options = {};
        $("main").unmark();
        $('main').mark(keyword, options);

        $("main").parent().removeClass('noresult');

        $('main').each(function () {

            if ($(this).children('mark').length <= 0) {

                $(this).parent().removeClass('noresult');
                $(this).parent().addClass('noresult');
            }

            if ($("#search").val() == 0)
                $("main").unmark().parent().removeClass("noresult");

        });

    });

    $(".logo").click(function () {

        $(".bar").toggleClass("active");
        $(".pro,td").removeClass("active");
        $("main").unmark().parent().removeClass("active");

    });


    $(".new").click(function () {

        if ($('article.active').hasClass('domain')) {

            $('article.active').children('._domain').append('<section class="kontenti" tipi="domain"><a class="remove_section"></a>\
               <span contenteditable="true" parent="" class="domain" style="width:16%">mikseo.ch</span>\
               <span contenteditable="true" parent="" class="registrar" style="width:16%">hostpoint</span>\
               <span contenteditable="true" parent="" class="username" style="width:16%">user</span>\
               <span contenteditable="true" parent="" class="password" style="width:16%">pass</span>\
               <span contenteditable="true" parent="" class="date" style="width:16%">2015-03-14</span>\
               <span contenteditable="true" parent="" class="expiry" style="width:16%"></span>\
           </section>').clone(true);
        } else {

            $('article.active').removeClass("active");

            $("article.cloned").removeClass("active").clone(true).prependTo("aside").addClass("active").addClass("editing").removeClass('cloned').addClass('klonim').removeAttr("style");
            $("article.editing").children('main').attr("contenteditable", "true");
            $("article.editing section:not(.title) span").attr("contenteditable", "true");
            $("nav").removeClass("add_new edit_save").addClass("sub_sect");
        }


    });



    $(".submen li").click(function (e) {

        e.stopPropagation();

        $("section:not(.title) span").attr("contenteditable", "true");

        var deneme1 = [];
        var z = 0;

        $("article.active").children('summary').each(function () {

            deneme1[z] = $(this).attr("class");
            z++;

        });

        var deneme = $.inArray($('.copier summary').eq($(this).index()).attr("class"), deneme1);

        if (deneme == -1)
            $('.copier summary').eq($(this).index()).clone(true).appendTo("article.active");
        else {

            console.log("article.active ." + $(' summary').eq($(this).index()).attr("class") + ":first");
            $('.copier summary').eq($(this).index()).children(".kontenti").clone(true).appendTo("article.active ._" + $(this).attr("class") + ":first");

        }

    });



    //remove summary
    $('.remove_summary').click(function () {

        $(this).parent().remove();

    });

    //remove section
    $('.remove_section').click(function () {

        $(this).parent().remove();

    });



    //remove summary
    $('.remove_summaryDB').click(function () {

        if ($(this).parent().parent().hasClass('editing')) {

            var data = [];

            $(this).parent().children('.kontenti').each(function () {

                data.push($(this).attr('subcategory_id'));

            });
        }

    });





    //remove section
    $('.deleteProject').click(function () {

        if ($('.sin_opt').children('li').hasClass('removeli') == false) {

            $(this).parent().prepend("<li class='removeli'>Are u sure? <div class='remove'>yes</div> <div class='donot'>no</div></li>");

            $('.donot').click(function () {

                $('.removeli').remove();
            });



            $('.remove').click(function () {


                var project_id = $(this).parent().parent().parent().children('main').attr('id');

                //dont forget to change this class active to >>>>> EDITING **

                if ($('article.active').hasClass('klonim'))

                    $('article.active').remove();

                else if (project_id == null)

                    alert('Please click edit on project you want to delete!');

                else {

                }

            });



        }


    });




    $(".edit").click(function () {

        if ($('article.active').hasClass('domain'))
            $(".active section:not(.title) span").attr("contenteditable", "true");
        else
            $(".active section:not(.title) span, .active main").attr("contenteditable", "true");
        $("article.active").addClass("editing");
        $(".submen").addClass("active");
        $("nav").removeClass("edit_save").addClass("sub_sect");

    });



    $(".save").click(function () {
        $("section:not(.title) span, main").attr("contenteditable", "false");
        $("nav").removeAttr("class").addClass("edit_save");
        $('article.editing').removeClass('editing');
        $(".submen").removeClass("active");

    });

    //password generator
    jQuery(".generate").click(function () {

        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz!?=+*";
        var string_length = 10;
        var randomstring = '';

        for (var i = 0; i < string_length; i++) {

            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum, rnum + 1);

        }

        $(this).text(randomstring);

    });

});

