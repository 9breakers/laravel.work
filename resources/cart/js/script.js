
setTimeout(function(){
    $('#card-ccv').focus().delay(1000).queue(function(){
        $(this).blur().dequeue();
    });
}, 500);
document.addEventListener('DOMContentLoaded', function () {
    var inputs = document.querySelectorAll('.input-cart-number');

    inputs.forEach(function (input, index) {
        input.addEventListener('input', function () {
            if (input.value.length === input.getAttribute('maxlength') * 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });
    });
});
