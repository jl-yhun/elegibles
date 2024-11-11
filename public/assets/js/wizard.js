let currentStep = 0;
const steps = document.querySelectorAll('.wizard-steps li');
const progressBar = document.querySelector('.progress');
const progressText = document.querySelector('.progress-text');
const formSections = document.querySelectorAll('.form-section');

document.getElementById('previousButton').style.display = 'none'; // Ocultar botón al inicio

function updateWizard() {
    steps.forEach((step, index) => {
        const stepCircle = step.querySelector('.step-circle');
        if (index < currentStep) {
            stepCircle.innerHTML = '&#10003;'; // Cambiar al símbolo de la palomita
            step.classList.add('completed');
        } else {
            stepCircle.innerHTML = index + 1; // Mostrar el número del paso
            step.classList.remove('completed');
        }

        if (index === currentStep) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });

    // Mostrar/ocultar el botón "Anterior" según la posición
    if (currentStep === 0) {
        document.getElementById('previousButton').style.display = 'none';
    } else {
        document.getElementById('previousButton').style.display = 'inline-block';
    }

    const progressPercentage = ((currentStep + 1) / steps.length) * 100;
    progressBar.style.width = progressPercentage + '%';
    progressText.textContent = `${currentStep + 1} de ${steps.length} formularios completados`;

    updateForm();
}

function updateForm() {
    formSections.forEach((section, index) => {
        if (index === currentStep) {
            section.classList.add('active');
        } else {
            section.classList.remove('active');
        }
    });
}



document.getElementById('nextButton').addEventListener('click', function(event) {
    let isValid = true;
    let isValidChecks = true;

    if (currentStep === 0) {
        isValid = validateCurrentStep(isValidChecks);
        //console.log(isValid)
    } else if (currentStep === 1) {
        isValidChecks = validateConditionalCheckboxes("identificacion", "dni", isValid);
        isValid = validateCurrentStep(isValidChecks, "identificacion");
    } else if (currentStep === 2) {
        isValidChecks = validateConditionalCheckboxes("fecha", ["outside_of_mexico_from", "outside_of_mexico_until"], isValid);
        console.log(isValidChecks)
        isValidChecks = validateConditionalCheckboxes("nacionalidad", "nationalities", isValid);
        console.log(isValidChecks)

        isValid = validateCurrentStep(isValidChecks, ["nacionalidad", "fecha"]);
    }else if(currentStep === 3){
        isValidChecks = validateConditionalCheckboxes("titulo", "average", isValid);
        isValidChecks = validateConditionalCheckboxes("cedula", "professionalID", isValid);
        isValid = validateCurrentStep(isValidChecks, ["titulo", "cedula"]);
    }else if(currentStep === 4){
        isValidChecks = validateConditionalCheckboxes("condenado", "criminal_record_details", isValid);
        isValidChecks = validateConditionalCheckboxes("inhabilitado", "has_been_disabled", isValid);
        isValidChecks = validateConditionalCheckboxes("lista", "name_in_blacklist_details", isValid);
        isValid = validateCurrentStep(isValidChecks, ["condenado", "inhabilitado", "lista"]);
    }

    const errors = document.querySelectorAll('.input-error');
    if (!isValid || errors.length > 0) {
        event.preventDefault(); // Prevenir que avance si hay campos vacíos o incorrectos
    } else {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateWizard();
        } else {
            // Al finalizar el wizard, ocultar el wizard y mostrar el resultado
            document.getElementById('wizard-left-content').style.display = 'none';
            document.getElementById('wizard-right-content').style.display = 'none';
            document.getElementById('result-container').style.display = 'block';
        }
    }
});


document.getElementById('previousButton').addEventListener('click', function() {
    if (currentStep > 0) {
        currentStep--;
        updateWizard();
    }
});

updateWizard();

document.getElementById('star-wizard').addEventListener('click', function() {
    document.getElementById('general-right').style.display = 'none';
    document.getElementById('wizard-right-content').style.display = 'block';
    document.getElementById('wizard-left-content').style.display = 'block';
});

function show(targetId) {
    document.getElementById(targetId).style.display = 'block';
}

function hide(targetId) {
    document.getElementById(targetId).style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar los elementos necesarios
    const curpInput = document.getElementById('curp');
    const rfccInput = document.getElementById('rfc');
    const birth_dateInput = document.getElementById('birth_date');
    const ageInput = document.getElementById('age');
    const place_of_birthInput = document.getElementById('place_of_birth');
    const genreInput = document.getElementById('genre');
    const inputs = document.querySelectorAll('input[type="text"]');

    // Agregar evento 'input' a cada input de texto
    inputs.forEach(input => {
        input.addEventListener('input', function () {
            // Reemplazar caracteres especiales y convertir a mayúsculas
            this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').toUpperCase();
        });
    });

    // Función para calcular la age a partir de la fecha de nacimiento
    function calcuLarage(birth_date) {
        if (!isNaN(birth_date)) {
            const hoy = new Date();
            let age = hoy.getFullYear() - birth_date.getFullYear();
            const mes = hoy.getMonth() - birth_date.getMonth();
            if (mes < 0 || (mes === 0 && hoy.getDate() < birth_date.getDate())) {
                age--;
            }
            return age >= 0 ? age : '';
        }
        return '';
    }

    rfccInput.addEventListener('input', function() {
        const rfc = rfccInput.value.toUpperCase();
    });

    // Evento para obtener información a partir del CURP
    curpInput.addEventListener('input', function() {
        const curp = curpInput.value.toUpperCase();

        // Validar si el CURP tiene el tamaño correcto (18 caracteres)
        if (curp.length === 18) {
            // Extraer la fecha de nacimiento del CURP (posiciones 4 a 9)
            const anio = parseInt(curp.substring(4, 6));
            const mes = parseInt(curp.substring(6, 8)) - 1; // Mes está basado en 0
            const dia = parseInt(curp.substring(8, 10));

            // Determinar el siglo de la fecha de nacimiento (1900s o 2000s)
            const siglo = anio < 50 ? 2000 : 1900;

            // Crear la fecha de nacimiento
            const birth_date = new Date(siglo + anio, mes, dia);

            // Actualizar los campos del formulario
            birth_dateInput.value = birth_date.toISOString().split('T')[
                0]; // Fecha en formato yyyy-mm-dd
            ageInput.value = calcuLarage(birth_date);

            // Extraer el género del CURP (posición 10)
            const genreCode = curp.charAt(10);
            if (genreCode === 'H') {
                genreInput.value = 'Hombre';
            } else if (genreCode === 'M') {
                genreInput.value = 'Mujer';
            } else {
                genreInput.value = ''; // En caso de que el valor no sea 'H' o 'M'
            }

            // Extraer lugar de nacimiento del CURP (posición 11 y 12)
            const place_of_birthCode = curp.substring(11, 13);
            const lugarMap = {
                'AS': 'Aguascalientes',
                'BC': 'Baja California',
                'BS': 'Baja California Sur',
                'CC': 'Campeche',
                'CL': 'Coahuila',
                'CM': 'Colima',
                'CS': 'Chiapas',
                'CH': 'Chihuahua',
                'DF': 'Ciudad de México',
                'DG': 'Durango',
                'GT': 'Guanajuato',
                'GR': 'Guerrero',
                'HG': 'Hidalgo',
                'JC': 'Jalisco',
                'MC': 'Estado de México',
                'MN': 'Michoacán',
                'MS': 'Morelos',
                'NT': 'Nayarit',
                'NL': 'Nuevo León',
                'OC': 'Oaxaca',
                'PL': 'Puebla',
                'QT': 'Querétaro',
                'QR': 'Quintana Roo',
                'SP': 'San Luis Potosí',
                'SL': 'Sinaloa',
                'SR': 'Sonora',
                'TC': 'Tabasco',
                'TS': 'Tamaulipas',
                'TL': 'Tlaxcala',
                'VZ': 'Veracruz',
                'YN': 'Yucatán',
                'ZS': 'Zacatecas',
                'NE': 'Extranjero'
            };

            place_of_birthInput.value = lugarMap[place_of_birthCode] || '';
        }
    });
});
