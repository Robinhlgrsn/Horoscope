const btnSave = document.getElementById("saveBtn")
const btnUpdate = document.getElementById("updateBtn")
const btnDelete = document.getElementById("deleteBtn")
btnSave.addEventListener("click", saveHoroscope)
btnUpdate.addEventListener("click", updateHoroscope)
btnDelete.addEventListener("click", deleteHoroscope)


function saveHoroscope(){
    console.log("save")
}

function updateHoroscope(){
    console.log("update")
}

function deleteHoroscope(){
    console.log("Delete")
}

function loadHoroscope(){}