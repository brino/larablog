/**
 * Created by bmix on 4/15/16.
 */

window.$ = window.jQuery = require('jquery');
var bootstrapjs = window.bootstrapjs = require('bootstrap-sass');
var d3 = window.d3 = require('d3');
var c3 = window.c3 = require('c3');
var CodeMirror = window.CodeMirror = require('codemirror');
require('bootstrap-multiselect/dist/js/bootstrap-multiselect');
require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');
require('codemirror/mode/php/php');
require('codemirror/addon/mode/overlay');
require('codemirror-spell-checker/dist/spell-checker.min');


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
        var editor = CodeMirror.fromTextArea(value,{mode: 'spell-checker', backdrop: 'htmlmixed'})
    });

    $('textarea.editor-script').each(function(index,value){
        var editor = CodeMirror.fromTextArea(value,{mode: 'javascript'})
    });

    $('code.php').each(function(index,element){

        var editor = CodeMirror(function(elt) {
            element.parentNode.replaceChild(elt, element);
        }, {mode: 'text/x-php',value: $(element).text(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});

    });

    $('code.javascript').each(function(index,element){

        var editor = CodeMirror(function(elt) {
            element.parentNode.replaceChild(elt, element);
        }, {mode: 'javascript',value: $(element).text(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});

    });

    $('code.html').each(function(index,element){

        var editor = CodeMirror(function(elt) {
            element.parentNode.replaceChild(elt, element);
        }, {mode: 'htmlmixed',value: $(element).html(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});

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