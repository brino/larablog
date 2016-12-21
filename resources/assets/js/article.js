/**
 * Created by bmix on 12/21/16.
 */
var CodeMirror = window.CodeMirror = require('codemirror');
require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');
require('codemirror/mode/php/php');
require('codemirror/addon/mode/overlay');
require('codemirror/addon/edit/matchbrackets');
require('codemirror-spell-checker/dist/spell-checker.min');

// console.log(document.getElementsByClassName('php'));

Array.from(document.getElementsByClassName('php')).forEach(function(element){
    CodeMirror(function(elt) {
        element.parentNode.replaceChild(elt, element);
    }, {mode: 'text/x-php',value: element.textContent,'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});

});

Array.from(document.getElementsByClassName('javascript')).forEach(function(element){
    CodeMirror(function(elt) {
        element.parentNode.replaceChild(elt, element);
    }, {mode: 'javascript',value: element.textContent,'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});

});

Array.from(document.getElementsByClassName('html')).forEach(function(element){
    CodeMirror(function(elt) {
        element.parentNode.replaceChild(elt, element);
    }, {mode: 'htmlmixed',value: element.innerHTML,'readOnly': "nocursor",lineNumbers: true,matchBrackets:true,viewportMargin:Infinity,autofocus:true});
});