function validar() {
    let nam2 = document.getElementById('nombre').value()
    let email = document.getElementById('email').value()
    let dire = document.getElementById('dire').value()
    let naci = document.getElementById('naci').value()
    let rip = document.getElementById('tip_doc').value()
    let numdoc = document.getElementById('num_doc').value()
    let rh1 = document.getElementById('rh1').value()
    let rh2 = document.getElementById('rh2').value()
    let sexo = document.getElementById('sexo').value()
    let cel = document.getElementById('cel').value()
    let contra = document.getElementById('contra').value()

    if (nam2 == '' || email == '' || dire == '' || naci == '' || rip == '' || numdoc == '' || rh1 == '' || rh2 == '' || sexo == '0' || cel == '' || contra == '') {
        alert('ingrese todos los datos por favor ')
        return false
    } else {
        return true
    }
}