const btnSave = document.getElementById("saveBtn")
const btnUpdate = document.getElementById("updateBtn")
const btnDelete = document.getElementById("deleteBtn")
let inputNumber = document.getElementById("inputHoroscope")
btnSave.addEventListener("click", saveHoroscope)
btnUpdate.addEventListener("click", updateHoroscope)
btnDelete.addEventListener("click", deleteHoroscope)

viewHoroscope()

async function saveHoroscope(){
    const nameToSave = getInput()
    let month = getMonth()
    let day = getDay()

    if(!nameToSave.length){
       return false
    } 

    const body = new FormData() //formdata paketerar information som ska skickas till servern   
    body.set("day", day)
    body.set("month", month)
    const collectedName = await makeRequest("./server/addHoroscope.php", "POST", body)
   /*  console.log(collectedName) */
    viewHoroscope()
}

async function updateHoroscope(){
    console.log("update")
    const collectedName = await makeRequest("./server/addHoroscope.php", "POST") 
    viewHoroscope()
}

async function deleteHoroscope(){
    console.log("Delete")
    const collectedName = await makeRequest("./server/deleteHoroscope.php", "DELETE")
    viewHoroscope() 
}

async function viewHoroscope(){
    const nameText = document.getElementById("nameCon")
    const collectedName = await makeRequest("./server/viewHoroscope.php", "GET")
    nameText.innerText = collectedName
 }

async function makeRequest(path, method, body){
    try{
        const response = await fetch(path,{
            method,
            body
        })
        console.log(response)
        return response.json()
    }catch(err){
        console.log(err)
    }
}

function getInput(){
    return inputNumber.value
}

function getDay(){
    let date = getInput()
   let day = date.split('-')
    return parseInt(day[2])
}
function getMonth(){
    let date = getInput()
   let month = date.split('-')
    return parseInt(month[1])
}


