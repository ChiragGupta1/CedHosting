function validate(obj) {
    if(!obj.checkValidity()) {
        $(obj).css('border-color', 'red')
        if(obj['id'] == 'name') {
            $('#name-div').css('background-color', '#ffadad');
            $('#small-name').text('Please enter valid Product name. It should be alpha-numeric and must not contain special characters.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'month') {
            $('#month-div').css('background-color', '#ffadad');
            $('#small-month').text('Please Enter price per month.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'annual') {
            $('#annual-div').css('background-color', '#ffadad');
            $('#small-annual').text('Please Enter price per year.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'sku') {
            $('#sku-div').css('background-color', '#ffadad');
            $('#small-sku').text('Please Enter unique SKU ID.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'webspace') {
            $('#web-div').css('background-color', '#ffadad');
            $('#small-webspace').text('Please Enter number only.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'bandwidth') {
            $('#band-div').css('background-color', '#ffadad');
            $('#small-bandwidth').text('Please Enter number only.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'free-domain') {
            $('#domain-div').css('background-color', '#ffadad');
            $('#small-domain').text('Please Enter number only. Enter 0 for no domain.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'support') {
            $('#lang-div').css('background-color', '#ffadad');
            $('#small-support').text('Please Enter alpha-numerics only separated by (,) only.').css('color', 'red').prop('hidden', false);
        }
        if(obj['id'] == 'mailbox') {
            $('#mail-div').css('background-color', '#ffadad');
            $('#small-mailbox').text('Please Enter number only. Enter 0 for none.').css('color', 'red').prop('hidden', false);
        }
        obj.focus();
    } else {
        $(obj).css('border-color', '')
        if(obj['id'] == 'name') {
            $('#name-div').css('background-color', '#b3ffb4');
            $('#small-name').prop('hidden', true);
        }
        if(obj['id'] == 'month') {
            $('#month-div').css('background-color', '#b3ffb4');
            $('#small-month').prop('hidden', true);
        }
        if(obj['id'] == 'annual') {
            $('#annual-div').css('background-color', '#b3ffb4');
            $('#small-annual').prop('hidden', true);
        }
        if(obj['id'] == 'sku') {
            $('#sku-div').css('background-color', '#b3ffb4');
            $('#small-sku').prop('hidden', true);
        }
        if(obj['id'] == 'webspace') {
            $('#web-div').css('background-color', '#b3ffb4');
            $('#small-webspace').prop('hidden', true);
        }
        if(obj['id'] == 'bandwidth') {
            $('#band-div').css('background-color', '#b3ffb4');
            $('#small-bandwidth').prop('hidden', true);
        }
        if(obj['id'] == 'free-domain') {
            $('#domain-div').css('background-color', '#b3ffb4');
            $('#small-domain').prop('hidden', true);
        }
        if(obj['id'] == 'support') {
            $('#lang-div').css('background-color', '#b3ffb4');
            $('#small-support').prop('hidden', true);
        }
        if(obj['id'] == 'mailbox') {
            $('#mail-div').css('background-color', '#b3ffb4');
            $('#small-mailbox').prop('hidden', true);
        }
    }
}
function validate_cat_name () {
    var value = $('#cat-name').val();
    var check = /^([A-Za-z]+\s?)+([\d]+\.?)*[\d]+$|^([a-zA-Z]+\s?)+$/;
    if(value !='') {
        if(check.test(value)) {
            $('#catname-div').css('background-color', '#b3ffb4');
            $('#small-cat-name').prop('hidden', true);
        } else {
            $('#catname-div').css('background-color', '#ffadad');
            $('#small-cat-name').css('color', 'red').prop('hidden', false);
        }
    } else {
        $('#catname-div').css('background-color', '#ffadad');
        $('#small-cat-name').css('color', 'red').prop('hidden', false);
    }

}