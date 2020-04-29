// Aplica o selectAll para todos qnt clickar na no checkbox cm id = 'select-all'
document.getElementById('select-all').addEventListener('click', function (e) {
  var flag = e.target.checked;
  var checkboxes =  document.getElementsByClassName("checkDelete");

  Array.from(checkboxes).forEach(element => element.checked = flag );

  putButtonDeleteAll();
});

var checkboxes = document.getElementsByClassName("checkDelete");

Array.from(checkboxes).forEach(element => {
  element.addEventListener('click', e => {
    putButtonDeleteAll();
  });

});


function putButtonDeleteAll() {
  var checkboxes = document.getElementsByClassName("checkDelete");
    var count = 0;

    // verifica qnts checkboxes estão checkados e guarda em count
    Array.from(checkboxes).forEach(element => {
      if (element.checked) {
          count++;
      }
    });

    var checkeds = Array.from(checkboxes).filter(function (item) {
      return item.checked;
    });

    var ids = checkeds.map(function (item) {
      return item.id;
    });

    document.getElementById("idLivros").value = ids.join(",");

    // verifica a qntd de checkboxes selecionados, se for diferente de 0 tira a classe hidden
    if (count === 0) {
      document.getElementById("delete-all").classList.add("hidden");
      document.getElementById("select-all").checked = false;
    } else {
      document.getElementById("delete-all").classList.remove("hidden");
    }
}