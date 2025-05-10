const darkMode = () => {
    document.querySelector("body").setAttribute("data-bs-theme", "dark");
    document.querySelector("#dl-icon").setAttribute("class", "bi bi-sun-fill");
}

const lightMode = () => {
    document.querySelector("body").setAttribute("data-bs-theme", "light");
    document.querySelector("#dl-icon").setAttribute("class", "bi bi-moon-fill");
}

const changeTheme = () => {
    document.querySelector("body").getAttribute("data-bs-theme") === "light" ? darkMode() : lightMode()
}


const prueba = () => {
    alert("hola");
}