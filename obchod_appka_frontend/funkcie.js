
document.addEventListener("DOMContentLoaded", function () {
    fetch("header.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header-container").innerHTML = data;
        })
        .catch(error => console.error("Chyba pri načítaní headeru:", error));
});


// DOCASTNA Funkcia na nastavenie kategórie podľa pohlavia
function setGenderCategory(category) {
    localStorage.setItem('selectedGenderCategory', category);
    if (category === 'zeny') {
        window.location.href = 'zeny.html';
    } else if (category === 'muzi') {
        window.location.href = 'muzi.html'; 
    } else if (category === 'deti') {
        window.location.href = 'deti.html';
    }
}



