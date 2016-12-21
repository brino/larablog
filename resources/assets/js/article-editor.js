/**
 * Created by bmix on 12/21/16.
 */
var CodeMirror = window.CodeMirror = require('codemirror');

require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');
// require('codemirror/mode/php/php');
require('codemirror/addon/mode/overlay');
require('codemirror/addon/edit/matchbrackets');
require('codemirror-spell-checker/dist/spell-checker.min');

CodeMirror.fromTextArea(
    document.getElementById("article-body"),
    {mode: 'htmlmixed',lineNumbers: true,matchBrackets:true,viewportMargin:Infinity}
);

CodeMirror.fromTextArea(
    document.getElementById("article-summary"),
    {mode: 'htmlmixed',lineNumbers: true,matchBrackets:true,viewportMargin:Infinity}
);

CodeMirror.fromTextArea(
    document.getElementById("article-script"),
    {mode: 'javascript',lineNumbers: true,matchBrackets:true,viewportMargin:Infinity}
);

// document.getElementsByClassName('code.php').each(function(index,element){
//     CodeMirror(function(elt) {
//         element.parentNode.replaceChild(elt, element);
//     }, {mode: 'text/x-php',value: element.textContent,'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});
//
// });
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