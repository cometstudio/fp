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

function addBinding(el, container)
{
    var control = $(el);
    var url = control.attr('href');
    var form = $('.edit form');

    ajaxSubmit(form, function(response){
        container.html(response.view)
    }, null, {}, url);

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