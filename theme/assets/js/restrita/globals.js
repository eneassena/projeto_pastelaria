const actions_automazed = (table, form_add) => {
    // $(`#table_pastel`).css('display', 'block');

    if ($(`#${table}`).css('display') === 'block') {
        $(`#${table}`).css('display', 'none');

        $(`#${form_add}`).css('display', 'block');

    } else if ($(`#${table}`).css('display') === 'none') {
        $(`#${table}`).css('display', 'block');

        $(`#${form_add}`).css('display', 'none');

    }
}
