function nopNextAfter(event, model, length) {
    if(model.length >= length) {
        next = event.srcElement.parentElement.nextElementSibling.firstElementChild;
        next.focus();
        next.setSelectionRange(0, next.value.length);
    }
}