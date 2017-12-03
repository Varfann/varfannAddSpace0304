$(function(){
    $("select").each(function(){
        renderSelect($(this));
    });

    $(document).on('click', function(e){
        var t = $(e.target);

        if(t.closest('.select_outer').length == 0){
            $('.select_list')
                .parent().removeClass('open').find('.arr').addClass('arr_down').removeClass('arr_up');
        }
    });
});

function renderSelect(select)
{
    if(select.data('rendered') || select.data('norender')){
        return;
    }

    select.hide();

    select.find('option').each(function(){
        var option = $(this);

        if(option.attr('value') == undefined){
            option.attr('value', option.text());
        }
    });

    select.wrap('<span class="select_outer" />');

    var outer = select.closest('.select_outer');

    outer.append('<span class="select_inner" />');

    var inner = outer.find('.select_inner');

    inner.append('<span class="arr arr_down"><span /></span>');

    var selected = select.find('option:selected');

    inner.append('<span class="select_selected" value="'+ selected.attr('value') +'">'+ selected.text() +'</span>');

    inner.append('<div class="select_list" />');

    var list = inner.find('.select_list');

    select.find('option').each(function(){
        var option = $(this);
        list.append('<span class="select_option '+ (option.is(':selected') ? 'select_option_selected' : '') +' '+ (option.is(':disabled') ? 'select_option_disabled' : '') +'" value="'+ option.attr('value') +'">'+ option.text() +'</span>');
    }).data('rendered', true);

    inner.on('click', function(e){
        t = $(e.target);
        if(t.hasClass('select_option_disabled')){
            return;
        }

        $('.select_list').not(list).parent().removeClass('open');
        list.parent().toggleClass('open');
        inner.find('.arr').toggleClass('arr_down').toggleClass('arr_up');
    });

    list.find('.select_option').on('click', function(){
        var option = $(this);

        if(option.hasClass('select_option_disabled')){
            return;
        }

        list.find('.select_option_selected').removeClass('select_option_selected');
        option.addClass('select_option_selected');

        inner.find('.select_selected').attr('value', option.attr('value')).text(option.text());

        select.val(option.attr('value'));
        select.trigger('change');
    });
}