function validAdd(form2) {
    if (!(parseInt(document.form2.deviceIdAlarm.value) % 1 === 0)){
        alert("Enter a valid number in field Device ID.")
        document.form2.deviceIdAlarm.focus()
        return false
    }
    if (!(parseInt(document.form2.maxValueAlarm.value) % 1 === 0)){
        alert("Enter a valid number in field Maximum Value.")
        document.form2.maxValueAlarm.focus()
        return false
    }
}
function validEdit(form3) {
    if (!(parseInt(document.form3.deviceIdAlarm.value) % 1 === 0)){
        alert("Enter a valid number in field Device ID.")
        document.form3.deviceIdAlarm.focus()
        return false
    }
    if (!(parseInt(document.form3.maxValueAlarm.value) % 1 === 0)){
        alert("Enter a valid number in field Maximum Value.")
        document.form3.maxValueAlarm.focus()
        return false
    }
}
function validDel(form4) {
    if (!(parseInt(document.form4.deviceIdAlarm.value) % 1 === 0)){
        alert("Enter a valid number in field Device ID.")
        document.form4.deviceIdAlarm.focus()
        return false
    }
}
