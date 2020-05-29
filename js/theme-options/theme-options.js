// THEME OPTIONS.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is JS file that contains skin, layout Style and bg used in this template*/
// -------------------------------------------------------------------------------------------------------------------------------
// Template Name: GYM Guide 
// Author: Mustachethemes
// Name File: theme-options.js
// Version 1.2 - Created on 19 Jun 2014
// Website: http://www.mustachethemes.com 
// Copyright: (C) 2015
// -------------------------------------------------------------------------------------------------------------------------------
  $(document).ready(function($) {

    /* Selec your skin and layout Style */

    function interface(){

    // Skin value
    var skin = "orange"; // orange (default), red ,yellow, orange, green

    // Boxed value
    var layout = "layout-wide"; // wide(default), layout-boxed, layout-boxed-margin ,layout-wide

    //Only in boxed version 
    var bg = "none";  // none (default), bg1, bg2, bg3, bg4, bg5, bg6, bg7, bg8, bg9, bg10, bg11 

    // Theme Panel - disable panel options
    var themepanel = "1"; // 1 (default - enable), 0 ( disable)

    $(".skin").attr("href", "css/skins/"+ skin + "/" + skin + ".css");
    $("#layout").addClass(layout);  
    $("body").addClass(bg);   
    $("#theme-options").css('opacity' , themepanel);
    return false;
  }

    interface();


    //=================================== Theme Options ====================================//

    $('.wide').click(function() {
        $('.boxed').removeClass('active');
        $('.boxed-margin').removeClass('active');
        $(this).addClass('active');
        $('.patterns').css('display' , 'none');
        $('#layout').removeClass('layout-boxed').removeClass('layout-boxed-margin').addClass('layout-wide');
    });
    $('.boxed').click(function() {
        $('.wide').removeClass('active');
        $('.boxed-margin').removeClass('active');
        $(this).addClass('active');
        $('.patterns').css('display' , 'block');
        $('#layout').removeClass('layout-boxed-margin').removeClass('layout-wide').addClass('layout-boxed');
    });
    $('.boxed-margin').click(function() {
        $('.boxed').removeClass('active');
        $('.wide').removeClass('active');
        $(this).addClass('active');
        $('.patterns').css('display' , 'block');
        $('#layout').removeClass('layout-wide').removeClass('layout-boxed').addClass('layout-boxed-margin');
    });


    //=================================== Skins Changer ====================================//

   $(function(){

    'use strict';

    // Color changer
    $(".red").click(function(){
        $(".skin").attr("href", "css/skins/red/red.css");
        return false;
    });
    $(".yellow").click(function(){
        $(".skin").attr("href", "css/skins/yellow/yellow.css");
        return false;
    });  
    $(".green").click(function(){
        $(".skin").attr("href", "css/skins/green/green.css");
        return false;
    });
    $(".orange").click(function(){
        $(".skin").attr("href", "css/skins/orange/orange.css");
        return false;
    });  
 });

    //=================================== Background Options ====================================//
    
    $('#theme-options ul.backgrounds li').click(function(){
    var     $bgSrc = $(this).css('background-image');
        if ($(this).attr('class') == 'bgnone')
            $bgSrc = "none";

        $('body').css('background-image',$bgSrc);
        $.cookie('background', $bgSrc);
        $.cookie('backgroundclass', $(this).attr('class').replace(' active',''));
        $(this).addClass('active').siblings().removeClass('active');
    });

    //=================================== Panel Options ====================================//

    $('.openclose').click(function(){
        if ($('#theme-options').css('left') == "-220px")
        {
            $left = "0px";
            $.cookie('displayoptions', "0");
        } else {
            $left = "-220px";
            $.cookie('displayoptions', "1");
        }
        $('#theme-options').animate({
            left: $left
        },{
            duration: 500           
        });

    });

    $(function(){
        $('#theme-options').fadeIn();
        $bgSrc = $.cookie('background');
        $('body').css('background-image',$bgSrc);

        if ($.cookie('displayoptions') == "1")
        {
            $('#theme-options').css('left','-220px');
        } else if ($.cookie('displayoptions') == "0") {
            $('#theme-options').css('left','0');
        } else {
            $('#theme-options').delay(800).animate({
                left: "-220px"
            },{
                duration: 500               
            });
            $.cookie('displayoptions', "1");
        }
        $('#theme-options ul.backgrounds').find('li.' + $.cookie('backgroundclass')).addClass('active');

    });

});