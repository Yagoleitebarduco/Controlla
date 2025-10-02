document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.link-item');

    links.forEach(link => {
        link.addEventListener('click', function () {
            // Remove a classe 'active' de todos os links
            links.forEach(otherLink => {
                otherLink.classList.remove('active');
            });

            // Adiciona a classe 'active' ao link clicado
            this.classList.add('active');
        });
    });
});