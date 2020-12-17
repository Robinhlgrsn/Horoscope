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

    if(true){
        btnDelete.style.display = "block";
    } 

    const body = new FormData() //formdata paketerar information som ska skickas till servern   
    body.set("day", day)
    body.set("month", month)
    
    const saveDate = await makeRequest("./server/addHoroscope.php", "POST", body)
    
    viewHoroscope()
}


async function updateHoroscope(){
    const nameToSave = getInput()
    let month = getMonth()
    let day = getDay()
    const body = new FormData() //formdata paketerar information som ska skickas till servern   

    body.set("day", day)
    body.set("month", month)
    const UpdateDate = await makeRequest("./server/updateHoroscope.php", "POST", body) 
    viewHoroscope()
}

async function deleteHoroscope(){
    console.log("Delete")
    const deleteResponse = await makeRequest("./server/deleteHoroscope.php", "DELETE")
    if(true){
        btnDelete.style.display = "none";
    } 
    viewHoroscope() 
}

async function viewHoroscope(){
    const nameText = document.getElementById("zodiacSaved")
    const nameZodiac = await makeRequest("./server/viewHoroscope.php", "GET")
    
    if(nameZodiac === false){
        nameText.innerText = "Enter date of birth"
    } else{
        nameText.innerText = nameZodiac
        btnDelete.style.display = "block";
    }
 }

async function makeRequest(path, method, body){
    try{
        const response = await fetch(path,{
            method,
            body
        })
        
        return response.json()
    }catch(err){
        console.log("err")
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
