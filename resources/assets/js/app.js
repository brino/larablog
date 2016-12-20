/**
 * Created by bmix on 4/15/16.
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Vue.component('example', require('./components/Example.vue'));
    
var d3 = window.d3 = require('d3');
var c3 = window.c3 = require('c3');
var CodeMirror = window.CodeMirror = require('codemirror');

require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');
require('codemirror/mode/php/php');
require('codemirror/addon/mode/overlay');
require('codemirror/addon/edit/matchbrackets');
require('codemirror-spell-checker/dist/spell-checker.min');

// const headerNav = new Vue({
//     el: 'header.nav',
//     data: {
//         isActive: false
//     },
//     methods: {
//         toggle () {
//             return this.isActive = !this.isActive;
//         }
//     }
// });

// $( document ).ready(function() {
//     $(function () {
//         $('[data-toggle="tooltip"]').tooltip();
//     })
//
//     $('#do-search').click(function(el){
//         $('#form-search').submit();
//     });
//
//     $('#search').click(function(el){
//         $(this).select();
//     });
//
//     $('select#tags').multiselect();
//    
//     // $('#search').click(function(el){
//     //     $('#form-div').removeClass('form-inline');
//     // });
//     //
//     // $('#search').focusout(function(el){
//     //     $('#form-div').addClass('form-inline');
//     // });
//
//     $('textarea.editor-html').each(function(index,value){
//         var editor = CodeMirror.fromTextArea(value,{mode: 'spell-checker', backdrop: 'htmlmixed'})
//     });
//
//     $('textarea.editor-script').each(function(index,value){
//         var editor = CodeMirror.fromTextArea(value,{mode: 'javascript'})
//     });
//
//     $('code.php').each(function(index,element){
//
//         var editor = CodeMirror(function(elt) {
//             element.parentNode.replaceChild(elt, element);
//         }, {mode: 'text/x-php',value: $(element).text(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});
//
//     });
//
//     $('code.javascript').each(function(index,element){
//
//         var editor = CodeMirror(function(elt) {
//             element.parentNode.replaceChild(elt, element);
//         }, {mode: 'javascript',value: $(element).text(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});
//
//     });
//
//     $('code.html').each(function(index,element){
//
//         var editor = CodeMirror(function(elt) {
//             element.parentNode.replaceChild(elt, element);
//         }, {mode: 'htmlmixed',value: $(element).html(),'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});
//
//     });
//    
//     // $('a.category').click(function(el){
//     //
//     //     event.preventDefault();
//     //
//     //     //console.log($(this).attr('href').substr(1,1));
//     //
//     //     $('#category-input').val($(this).attr('href').substr(1,1));
//     //
//     //     //console.log($('#category-input').val());
//     //
//     //     $('#form-search').submit();
//     //
//     // })
//
// });