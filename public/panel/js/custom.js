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

function addBinding(el, id, container)
{
    var control = $(el);
    var url = control.attr('href');

    ajax(url, function(response){
        container.html(response.view)
    }, null, {
        id: id
    });

    return false;
}

function dropBinding(el, container)
{

    var control = $(el);
    var url = control.attr('href');

    ajax(url, function(response){
        container.html(response.view)
    });

    return false;
}