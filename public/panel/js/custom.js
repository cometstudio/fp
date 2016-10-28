var timeout;

$(document).ready(function(){

});

function exportAsExcel(el)
{
    var form = $('.filter form');
    var control = $(el);
    var target = control.attr('href');

    ajaxSubmit(form, null, null, {}, target);

    return false;
}

function manageProcess(el, containerEl)
{
    var container = $(containerEl);
    var controlsContainer = container.find('.controls');
    var control = $(el);
    var url = control.attr('href');

    ajax(url, function(response){

        controlsContainer.html(response.chunk);

    });

    return false;
}

function releaseProcess(id, checkTaskURL)
{
    ajax(checkTaskURL, function(response){
        if(response.running) {
            timeout = window.setTimeout('releaseProcess('+id+', "'+checkTaskURL+'")', 3000);
        }else{
            var controls = $('#task'+response.id+' .controls');
            controls.find('.on').hide();
            controls.find('.off').show();
        }
    }, null, {}, 'POST', true);

}