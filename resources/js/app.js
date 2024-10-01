import jQuery from 'jquery';
window.$ = jQuery;
import './bootstrap';
import 'bootstrap';

export function getJaarbasisBerekening(id) {
    $.ajax({
        type: 'GET',
        url: 'jaarbasissen/'+parseInt(id),
        dataType: 'html',
        success: function (data) {
            console.log('success');
            $("#popup").replaceWith(data);
            $("#openJaarbasisDetail").trigger('click');   
            return false;
        },
        error:function(){ 
            console.log('error'); 
        }
    });
}

$( document ).ready(function() {
    $("#jaarbasis-table tr").click(function(){
        $(this).addClass('selected').siblings().removeClass('selected');
        var id = $(this).attr("data-id");
        console.log(id);
        $.when( getJaarbasisBerekening(id)  ).done(function() {
            return false;
        });
    });
});