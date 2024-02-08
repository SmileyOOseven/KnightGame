#!!! datei umbenennen?

document.getElementById("submitButtonStart").addEventListener("click", checkKnightNumber);

var i = 0;
var txt =
    'An alle loyalen Untertanen und treuen Zuschauer im galaktischen Reich!\n' +
    '\n' +
    'Es ist eine Zeit des ungebrochenen Einflusses und der unangefochtenen Vorherrschaft der Ersten Ordnung in der gesamten Galaxie. Unter der furchtlosen Führung unserer im, höchsten Maße kompeteten Führung haben wir die dunklen Zeiten der Rebellion und des Chaos überwunden. Nun gilt es vorrauszuschauen. Die erste Ordnung ist bestrebt nicht nur den Frieden sondern auch die Freude am Leben wierder auf die Planeten zu entsenden. So laden wir Sie ein an unserem triumphalen Galaktischen Krieger-Turnier teilzunehmen oder als ergebene Zuschauer daran teilzunehmen.\n' +
    '\n' +
    'Wann: Das Turnier wird in den Tagen 10. April bis 20. April stattfinden. \n' +
    '\n' +
    'Ort: Die glänzende Arena des Sieges auf dem Planeten Jakku. \n' +
    '\n' +
    'Regeln: Die unumstößlichen Regeln und Vorschriften des Turniers werden vor Ort von unseren strengen Disziplinaroffizieren erläutert. Es muss zum Start des Turniers eine gerade Kämpferanzahl gewährt sein.\n' +
    '\n' +
    '\n' +
    'Belohnungen:\n' +
    '\n' +
    '-Der Titel "xKnight of the universe" und ewiger Ruhm\n' +
    '\n' +
    '-Eine monumentale Trophäe und großzügige materielle Anerkennung\n' +
    '\n' +
    '-Großartige Karriere chancen im Heer der ersten Ordnung\n' +
    '\n' +
    '\n' +
    'Das Turnier kann Live bei DAZN verfolgt werden.';


var speed = 10;
const introText = document.getElementById("storryTextfield1");

function typeWriter() {
    if (i < txt.length) {
        introText.innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
}


function checkKnightNumber() {

    console.log("test");
    let KnightNumber = document.getElementById("knightNumber").value;

    if (typeof (KnightNumber) === "number" && KnightNumber > 0 && (KnightNumber & (KnightNumber - 1)) == 0) {
        alert('ne du');
    }
}

function multiplyBy2() {
    var numberField = document.getElementById("knightNumber");
    var currentValue = parseFloat(numberField.value);
    if (currentValue < 99999) {
        var newValue = currentValue * 2;
        numberField.value = newValue;
    }
}

function divideBy2() {
    var numberField = document.getElementById("knightNumber");
    var currentValue = parseFloat(numberField.value);
    if (currentValue > 2) {
        var newValue = currentValue / 2;
        numberField.value = newValue;
    }
}