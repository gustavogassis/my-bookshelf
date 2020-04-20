(function preencheLivro() {
    var number = Math.floor(Math.random() * 2) + 1;

    if (number == 1) {
        document.getElementById('titulo').value = 'Capitães de Areia';
        document.getElementById('autor').value = 'Jorge Amado';
        document.getElementById('paginas').value = '300';
        document.getElementById('genero').value = '3';
        document.getElementById('nacional').checked = true;
        document.getElementById('editora').value = 'Globo';
        document.getElementById('descricao').value = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s';
    }
    else {
        document.getElementById('titulo').value = '1984';
        document.getElementById('autor').value = 'Jorge Orwell';
        document.getElementById('paginas').value = '250';
        document.getElementById('genero').value = '6';
        document.getElementById('nacional').checked = false;
        document.getElementById('editora').value = 'Ática';
        document.getElementById('descricao').value = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s';
    }
})();
