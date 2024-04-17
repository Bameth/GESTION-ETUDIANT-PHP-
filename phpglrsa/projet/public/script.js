function validateForm() {
    var modules = document.getElementsByName('modules[]');
    var moduleChecked = false;

    for (var i = 0; i < modules.length; i++) {
        if (modules[i].checked) {
            moduleChecked = true;
            break;
        }
    }

    if (!moduleChecked) {
        alert('Veuillez sélectionner au moins un module.');
        return false;
    }

    return true;
}