$(document).ready(function(){
    $('#autor').autocomplete({
        serviceUrl: 'http://localhost/my-bookshelf-local/src/api/authors.php',
        onSelect: function (data) {
            console.log(data);
        }
    });
});