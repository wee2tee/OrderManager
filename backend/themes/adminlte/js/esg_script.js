/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    $.fn.Remove = function(event){
        event.preventDefault();
        
        console.log(" .. perform remove id : " + $(this).attr('data-id'));
    };
});