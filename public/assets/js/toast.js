window.onload = (event) => {
    let email = document.getElementById('emailToast')
    let toast = new bootstrap.Toast(email)
    toast.show()
}