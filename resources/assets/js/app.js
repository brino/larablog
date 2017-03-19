require('./bootstrap');

Vue.component('example', require('./components/Example.vue'));
Vue.component('autocomplete', require('./components/Autocomplete.vue'));
Vue.component('upload', require('./components/FileUploadInput.vue'));
Vue.component('html-editor', require('./components/HtmlEditor.vue'));
Vue.component('js-editor', require('./components/JavascriptEditor.vue'));
// Vue.component('file-upload',require('./components/FileUpload.vue'));

var d3 = window.d3 = require('d3');
var c3 = window.c3 = require('c3');

const headerNav = new Vue({
    el: 'header.nav',
    data: {
        isActive: false
    },
    methods: {
        toggle () {
            return this.isActive = !this.isActive;
        }
    }
});

const app = new Vue({
    el: '#app'
});



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