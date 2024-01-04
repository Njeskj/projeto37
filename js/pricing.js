document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-primary');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const planName = this.closest('.card').querySelector('h4').innerText;
            console.log(`Usuário escolheu o plano: ${planName}`);
        });
    });
});
