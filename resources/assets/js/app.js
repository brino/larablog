/**
 * Created by bmix on 4/15/16.
 */

window.$ = window.jQuery = require('jquery');
var bootstrapjs = window.bootstrapjs = require('bootstrap-sass');
var d3 = window.d3 = require('d3');
var c3 = window.c3 = require('c3');
var CodeMirror = window.codemirror = require('codemirror');
require('bootstrap-multiselect/dist/js/bootstrap-multiselect');
require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');

$( document ).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })

    $('#do-search').click(function(el){
        $('#form-search').submit();
    });

    $('#search').click(function(el){
        $(this).select();
    });

    $('select#tags').multiselect();
    
    // $('#search').click(function(el){
    //     $('#form-div').removeClass('form-inline');
    // });
    //
    // $('#search').focusout(function(el){
    //     $('#form-div').addClass('form-inline');
    // });

    $('textarea.editor-html').each(function(index,value){
        var editor = CodeMirror.fromTextArea(value,{mode: 'htmlmixed'})
    });

    $('textarea.editor-script').each(function(index,value){
        var editor = CodeMirror.fromTextArea(value,{mode: 'javascript'})
    });
    
    // $('a.category').click(function(el){
    //
    //     event.preventDefault();
    //
    //     //console.log($(this).attr('href').substr(1,1));
    //
    //     $('#category-input').val($(this).attr('href').substr(1,1));
    //
    //     //console.log($('#category-input').val());
    //
    //     $('#form-search').submit();
    //
    // })

});