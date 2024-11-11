function validateCurrentStep(isValidChecks = true, excludeClasses = []) {
    // Seleccionar la sección activa del formulario
    const currentSection = document.querySelector('.form-section.active');
    if (!currentSection) return false;

    // Convertir excludeClasses en un array si no lo es
    if (!Array.isArray(excludeClasses)) {
        excludeClasses = [excludeClasses];
    }

    // Función para verificar si un elemento tiene alguna clase excluida
    const hasExcludedClass = (element) => {
        return excludeClasses.some(excludeClass => element.classList.contains(excludeClass));
    };

    // Inicialmente, el valor de `isValid` depende de `isValidChecks`
    let isValid = isValidChecks;

    // Validar inputs de tipo texto, email, password, etc.
    const inputs = currentSection.querySelectorAll('input[type="text"], input[type="email"], input[type="number"], input[type="password"], input[type="date"]');
    inputs.forEach(input => {
        // Omitir los inputs que tienen alguna de las clases excluidas
        if (hasExcludedClass(input)) {
            return;
        }

        if (input.value.trim() === '') {
            input.classList.add('input-error');
            isValid = false;
        } else {
            input.classList.remove('input-error');
        }
    });

    // Validar selects
    const selects = currentSection.querySelectorAll('select');
    selects.forEach(select => {
        // Omitir los selects que tienen alguna de las clases excluidas
        if (hasExcludedClass(select)) {
            return;
        }

        if (select.value.trim() === '' || select.value === null) {
            select.classList.add('input-error');
            isValid = false;
        } else {
            select.classList.remove('input-error');
        }
    });

    // Validar textareas
    const textareas = currentSection.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        // Omitir los textareas que tienen alguna de las clases excluidas
        if (hasExcludedClass(textarea)) {
            return;
        }

        if (textarea.value.trim() === '') {
            textarea.classList.add('input-error');
            isValid = false;
        } else {
            textarea.classList.remove('input-error');
        }
    });

    // Validar radio buttons (asegurar que al menos uno del grupo esté seleccionado)
    const radioGroups = {};
    const radios = currentSection.querySelectorAll('input[type="radio"]');
    radios.forEach(radio => {
        // Omitir los radios que tienen alguna de las clases excluidas
        if (hasExcludedClass(radio)) {
            return;
        }

        if (!radioGroups[radio.name]) {
            radioGroups[radio.name] = false;
        }
        if (radio.checked) {
            radioGroups[radio.name] = true;
        }
    });
    for (let groupName in radioGroups) {
        if (!radioGroups[groupName]) {
            const group = currentSection.querySelectorAll(`input[name="${groupName}"]`);
            group.forEach(radio => {
                // Omitir los radios que tienen alguna de las clases excluidas
                if (hasExcludedClass(radio)) {
                    return;
                }

                radio.parentElement.classList.add('input-error');
            });
            isValid = false;
        } else {
            const group = currentSection.querySelectorAll(`input[name="${groupName}"]`);
            group.forEach(radio => {
                // Omitir los radios que tienen alguna de las clases excluidas
                if (hasExcludedClass(radio)) {
                    return;
                }

                radio.parentElement.classList.remove('input-error');
            });
        }
    }

    // Validar checkboxes (asegurar que al menos uno del grupo esté seleccionado)
    const checkboxGroups = {};
    const checkboxes = currentSection.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        // Omitir los checkboxes que tienen alguna de las clases excluidas
        if (hasExcludedClass(checkbox)) {
            return;
        }

        if (!checkboxGroups[checkbox.name]) {
            checkboxGroups[checkbox.name] = false;
        }
        if (checkbox.checked) {
            checkboxGroups[checkbox.name] = true;
        }
    });
    for (let groupName in checkboxGroups) {
        if (!checkboxGroups[groupName]) {
            const group = currentSection.querySelectorAll(`input[name="${groupName}"]`);
            group.forEach(checkbox => {
                // Omitir los checkboxes que tienen alguna de las clases excluidas
                if (hasExcludedClass(checkbox)) {
                    return;
                }

                checkbox.parentElement.classList.add('input-error');
            });
            isValid = false;
        } else {
            const group = currentSection.querySelectorAll(`input[name="${groupName}"]`);
            group.forEach(checkbox => {
                // Omitir los checkboxes que tienen alguna de las clases excluidas
                if (hasExcludedClass(checkbox)) {
                    return;
                }

                checkbox.parentElement.classList.remove('input-error');
            });
        }
    }

    return isValid;
}

function validateConditionalCheckboxes(yesRadioId, checkboxesName) {
    const yesSelected = document.getElementById(yesRadioId + "Si")?.checked;
    const noSelected = document.getElementById(yesRadioId + "No")?.checked;
    const inputs = Array.from(document.querySelectorAll(`input[name="${checkboxesName}"]`));
    let isValid = true;

    if (yesSelected) {
        let atLeastOneChecked = false;

        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                // Validar si al menos uno de los checkboxes o radios está marcado
                if (input.checked) {
                    atLeastOneChecked = true;
                }
            } else {
                // Validar si los inputs normales (text, date, number, email, password) tienen valor
                if (input.type === 'text' || input.type === 'date' || input.type === 'number' || input.type === 'email' || input.type === 'password') {
                    if (input.value.trim() === '') {
                        input.classList.add('input-error');
                        isValid = false;
                    } else {
                        input.classList.remove('input-error');
                    }
                }
            }
        });

        // Si es un checkbox o radio y ninguno está seleccionado, marcar como error
        if (!atLeastOneChecked && inputs.some(input => input.type === 'checkbox' || input.type === 'radio')) {
            inputs.forEach(input => {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.parentElement.classList.add('input-error');
                }
            });
            isValid = false;
        } else {
            inputs.forEach(input => {
                if (input.type === 'checkbox' || input.type === 'radio') {
                    input.parentElement.classList.remove('input-error');
                }
            });
        }

    } else if (noSelected) {
        // Si se selecciona "No", limpiar los errores y considerar la validación como correcta
        inputs.forEach(input => {
            input.parentElement.classList.remove('input-error');
            input.classList.remove('input-error');
        });
        isValid = true;
    } else {
        isValid = false;
    }

    return isValid;
}
