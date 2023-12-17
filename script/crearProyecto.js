const fs = require('fs');
const path = require('path');

function crearEstructuraCarpetas() {
    const estructura = {
        'proyecto': {
            'app': ['config', 'controllers', 'core'],
            'public': [],
            'test': [],
            'views': []
        }
    };

    for (const carpetaPrincipal in estructura) {
        const carpetaPath = path.join(process.cwd(), carpetaPrincipal);

        if (!fs.existsSync(carpetaPath)) {
            fs.mkdirSync(carpetaPath);
            console.log(`Creada la carpeta: ${carpetaPrincipal}`);
        }

        for (const subcarpeta in estructura[carpetaPrincipal]) {
            const subcarpetaPath = path.join(carpetaPath, subcarpeta);

            if (!fs.existsSync(subcarpetaPath)) {
                fs.mkdirSync(subcarpetaPath);
                console.log(`Creada la subcarpeta: ${subcarpeta} en ${carpetaPrincipal}`);
            }

            for (const subcarpetaInterna of estructura[carpetaPrincipal][subcarpeta]) {
                const subcarpetaInternaPath = path.join(subcarpetaPath, subcarpetaInterna);

                if (!fs.existsSync(subcarpetaInternaPath)) {
                    fs.mkdirSync(subcarpetaInternaPath);
                    console.log(`Creada la subcarpeta: ${subcarpetaInterna} en ${subcarpeta}`);
                }
            }
        }
    }
}

crearEstructuraCarpetas();
