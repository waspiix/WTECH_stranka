function up(id) {
  let span = document.getElementById("pocet_ks_" + id);
  span.textContent = parseInt(span.textContent) + 1;
}

function down(id) {
  let span = document.getElementById("pocet_ks_" + id);
  span.textContent = parseInt(span.textContent) - 1;
  if (span.textContent == 0) {
    close_span(id);
  }
}

function close_span(id) {
  var x = document.getElementById("item_" + id);
  x.style.display = "none";
}
