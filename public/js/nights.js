const calculateTotal = function() {
    console.log("nights")
    const theForm = document.querySelector("form");
    const regDate = /(\d{2})\-(\d{2})\-(\d{4})/;
    const datArrival = new Date(theForm.arrivaldate.value.replace(regDate, '$3-$2-$1'));
    const datDepart = new Date(theForm.departuredate.value.replace(regDate, '$3-$2-$1'));
    theForm.night.value = '';
    theForm.total_amount.value = '';
    if (datDepart > datArrival) {
        const intMilisec = datDepart - datArrival;
        const intNights = Math.ceil(intMilisec / (1000 * 3600 * 24));

        console.log(intMilisec, intNights)
        theForm.night.value = intNights;
        const fltRoomPrice = parseFloat(document.getElementById("room_price").value) || 0;
        const intNumberOfRooms = parseInt(document.getElementById("number_of_room").value) || 0;
        theForm.total_amount.value = ((fltRoomPrice * intNumberOfRooms) * intNights).toFixed(2);
    }
}

window.addEventListener("DOMContentLoaded", function() {
    const theForm = document.querySelector("form");
    for (var i = 0; i < theForm.elements.length; i++) {
        var theElem = theForm.elements[i];
        if (theElem.type == "text") {
            theElem.addEventListener('input', calculateTotal);
            theElem.addEventListener('blur', calculateTotal);
        }
    }
    calculateTotal();
});