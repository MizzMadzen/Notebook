// REGISTER/LOGIN FORMS LAYER
formLayers();

function formLayers() {
    // VARIABLES
    var registerButton = document.querySelector("#registerbutton"),
        registerBox = document.querySelector("#registerbox"),
        loginButton = document.querySelector("#loginbutton"),
        loginBox = document.querySelector("#loginbox"),
        closeButton1 = document.querySelector("#closebutton1"),
        closeButton2 = document.querySelector("#closebutton2");

    // CHECKING WHETHER THERE ARE A REGISTER OR LOGIN BUTTON
    if (registerButton || loginButton) {

        // THE BEHAVIOR
        registerButton.addEventListener("click", function () {
            registerBox.classList.toggle("loginboxToggled");
        });

        loginButton.addEventListener("click", function () {
            loginBox.classList.toggle("loginboxToggled");
        });

        closeButton1.addEventListener("click", function () {
            registerBox.classList.remove("loginboxToggled");
        });

        closeButton2.addEventListener("click", function () {
            loginBox.classList.remove("loginboxToggled");
        });

    }
} // End of formLayers


// CONFIRM DELETING NOTE
function confirmDelete() {
    return confirm("Are you sure you want to delete this?");
}


// SHOW/HIDE EDIT/DELETE ON MOUSEOVER
window.setTimeout(showNotebuttons, 1500);

function showNotebuttons() {

    //document.querySelector(".notebuttons").classList.add("showNotebuttons");

    // VARIABLES
    var note = document.querySelector(".note"),
        noteButtons = document.querySelector(".notebuttons");

    if (note) {

        // THE ANIMATIONS
        note.addEventListener("mouseover", function () {
            noteButtons.classList.add("showNotebuttons");
        });

        note.addEventListener("mouseout", function () {
            noteButtons.classList.remove("showNotebuttons");
        });
    }
}